<?php

namespace App\Filament\Resources\KotaResource\Pages;

use App\Filament\Resources\KotaResource;
use App\Filament\Resources\KotaResource\Widgets\KotaStatsOverview;
use Filament\Resources\Pages\ViewRecord;

class ViewKota extends ViewRecord
{
    protected static string $resource = KotaResource::class;

    public function getBreadcrumbs(): array
    {
        return [
            '/kotas' => 'Kota',
            'Detail'
        ];
    }

    public function getTitle(): string
    {
        return $this->record->name;
    }

    public function getHeaderWidgets(): array
    {
        return [
            KotaStatsOverview::class
        ];
    }
}
