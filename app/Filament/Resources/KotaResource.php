<?php

namespace App\Filament\Resources;

use App\Models\Kota;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KotaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KotaResource extends Resource
{
    protected static ?string $model = Kota::class;
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationGroup = 'Data Management';
    protected static ?string $navigationIcon = 'icon-city';
    protected static ?string $navigationLabel = 'Kota';

    public static function getRelations(): array
    {
        return [];
    }

    public static function getWidgets(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKotas::route('/'),
            'view' => Pages\ViewKota::route('/{record}/')
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
