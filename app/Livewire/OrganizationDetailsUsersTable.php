<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Organization;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class OrganizationDetailsUsersTable extends PowerGridComponent
{
    use WithExport;
    public $organization;
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        $organization = Organization::find($this->organization)->id;
        return Product::whereHas('users.organization', function ($query) use ($organization) {
            $query->where('id', $organization);
        });
        ;
    }

    public function relationSearch(): array
    {
        return ['product' => ['id', '']];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('serial_number')
            ->addColumn('city')
            ->addColumn('tool_name')
            ->addColumn('warrantee_date_formatted', fn(Product $model) => Carbon::parse($model->warrantee_date)->format('Y-m-d'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Serial Number', 'serial_number')
                ->sortable()
                ->searchable(),
            Column::make('City', 'city')
                ->sortable()
                ->searchable(),
            Column::make('Tool name', 'tool_name', 'tools.name')
                ->sortable()
                ->searchable(),
            Column::make('Warrantee date', 'warrantee_date_formatted', 'warrantee_date')
                ->sortable(),
            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('serial_number')->operators(['contains']),
            Filter::inputText('city')->operators(['contains']),
            Filter::datepicker('purchase_date'),
            Filter::datepicker('installation_date'),
            Filter::inputText('tool_name')->operators(['contains']),
            Filter::datepicker('warrantee_date'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(\App\Models\Product $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: ' . $row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
