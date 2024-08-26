<?php

namespace App\Filament\Resources\KotaResource\Widgets;

use App\Models\Kota;
use Illuminate\Database\Eloquent\Model;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class KotaStatsOverview extends BaseWidget
{
    public ?Model $record = null;

    protected function getColumns(): int
    {
        return 2;
    }

    protected function getStats(): array
    {
        $kotas = Kota::withCount(['orangtuas', 'anaks'])->find($this->record->id);

        return [
            Stat::make('', $kotas->orangtuas_count)
                ->descriptionIcon('icon-parent')
                ->description('Orang Tua'),
            Stat::make('', $kotas->anaks_count)
                ->description('Anak')
                ->descriptionIcon('icon-baby'),
        ];
    }
}
