<?php

namespace App\Filament\Resources\BidResource\Pages;

use App\Filament\Resources\BidResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBids extends ManageRecords
{
    protected static string $resource = BidResource::class;

    protected function getHeaderActions(): array
    {
        return [
           // Actions\CreateAction::make(),
        ];
    }
}
