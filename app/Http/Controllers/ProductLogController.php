<?php

namespace App\Http\Controllers;

use Throwable;
use App\Enums\ProductLogType;
use Carbon\Carbon;
use App\Models\Log;
use App\Models\Tool;
use App\Models\User;
use App\Models\Partial;
use App\Models\Product;
use App\Models\Visible;
use App\Models\ProductLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductLogController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('productlog.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productlog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $user = auth()->user();
        $user = User::find(1);
        DB::beginTransaction();
        try {
            $request->validate([
                'what' => 'required',
                'product_id' => 'required',
            ]);
            $product = Product::whereId($request->product_id)->first();
            if ($request->what == ProductLogType::Maintenance) {

                //get last maintenance created_at
                $lastProductLog = $product->whereRelation('product_logs', 'product_id', $product->id)->whereRelation('product_logs', 'what', ProductLogType::Maintenance)->latest('created_at')->first();
                $maintenanceCount = $product->whereRelation('product_logs', 'product_id', $product->id)->whereRelation('product_logs', 'what', ProductLogType::Maintenance)->count();
                //if last maintenance created_at isn't null
                if ($maintenanceCount == 0) {
                    $product_warrantee_date = $product->serializeDate($product->warrantee_date);
                    $product_warrantee_date = Carbon::parse($product_warrantee_date);
                    $elevenMonthsLater = $product_warrantee_date->copy()->addMonths(11);
                    $thirteenMonthsLater = $product_warrantee_date->copy()->addMonths(13);
                    if (Carbon::now() >= $product_warrantee_date->subMonth() && Carbon::now() <= $product_warrantee_date->addMonths(2)) {
                        ProductLog::create([
                            'comment' => $request->comment,
                            'what' => $request->what,
                            'product_id' => $request->product_id,
                        ]);
                        $product->update(['warrantee_date' => $product_warrantee_date->addYear()]);
                        Log::create([
                            'user_id' => auth()->user()->id,
                            'what' => 'productlogs.store successfully |' . json_encode($request->all())
                        ]);
                        DB::commit();
                        return redirect()->back()->withInput()->with('success', __('Products updated successfully.'));
                    }
                }

                if ($maintenanceCount < 3 && $maintenanceCount > 0) {
                    $product_warrantee_date = $product->warrantee_date;
                    $product_warrantee_date = Carbon::parse($product_warrantee_date);
                    $creationDate = Carbon::parse($lastProductLog->created_at);
                    if (Carbon::now() >= $product_warrantee_date->subMonth() && Carbon::now() <= $product_warrantee_date->addMonths(2)) {
                        ProductLog::create([
                            'comment' => $request->comment,
                            'what' => $request->what,
                            'product_id' => $request->product_id,
                        ]);
                        $product->update(['warrantee_date' => $product_warrantee_date->addYear()]);
                        Log::create([
                            'user_id' => auth()->user()->id,
                            'what' => 'productlogs.store successfully |' . json_encode($request->all())
                        ]);
                        DB::commit();
                        return redirect()->back()->withInput()->with('success', __('Product updated successfully.'));
                    }
                }

                DB::rollback();
                Log::create([
                    'user_id' => auth()->user()->id,
                    'what' => 'productlogs.store failed |' . json_encode($request->all())
                ]);
                return redirect()->back()->withInput()->with(['error' => __("Can't create maintenance in 11 month from last maintenance or after 13 month or cant extend warrantee more than 3 year")]);
            }

            if ($request->what != ProductLogType::Maintenance) {
                ProductLog::create([
                    'comment' => $request->comment,
                    'what' => $request->what,
                    'product_id' => $request->product_id,
                ]);
                Log::create([
                    'user_id' => 1,
                    'what' => 'productlogs.store successfully |' . json_encode($request->all())
                ]);
                DB::commit();
                return redirect()->back()->withInput()->with('success', __('Product updated successfully.'));
            }
        } catch (Throwable $throwable) {
            DB::rollback();
            Log::create([
                'user_id' => auth()->user()->id,
                'what' => 'product store failed' . json_encode($request->all()) . " | " . $throwable->getMessage()
            ]);
            $product = Product::whereId($request->product_id)->first();

            //return user and visibility data also

            $userVisibility = Visible::whereRelation('product', 'user_id', $user->id)->whereRelation('product', 'product_id', $product->id)->whereRelation('product', 'isVisible', true)->first();
            $userVisibility = $userVisibility !== null && $userVisibility->isVisible;
            $partials = Partial::where('product_id', $product->id)->latest()->limit(6)->get();
            $users = User::get();
            $tools = Tool::get();
            $error = $throwable->getMessage();
            return redirect()->route('products.edit', ['product' => $product])->with(['error' => $error, 'users' => $users, 'tools' => $tools, 'product' => $product, 'partials' => $partials, 'userVisibility' => $userVisibility]);
        }
        return null;
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductLog $productLog): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductLog $productLog): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductLog $productLog): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductLog $productLog): void
    {
        //
    }
}
