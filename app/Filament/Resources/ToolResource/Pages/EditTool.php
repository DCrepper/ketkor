<?php

namespace App\Filament\Resources\ToolResource\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\Resources\ToolResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTool extends EditRecord
{
    protected static string $resource = ToolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
