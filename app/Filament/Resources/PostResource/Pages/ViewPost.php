<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\Actions\NextAction;
use App\Filament\Resources\Actions\PreviousAction;
use App\Filament\Resources\Pages\Concerns\CanPaginateViewRecord;
use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPost extends ViewRecord
{
    use CanPaginateViewRecord;

    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            PreviousAction::make(),
            NextAction::make(),
        ];
    }
}
