<?php

namespace App\Filament\Resources\AdvertismentResource\Pages;

use App\Filament\Resources\AdvertismentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdvertisment extends EditRecord
{
    protected static string $resource = AdvertismentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
