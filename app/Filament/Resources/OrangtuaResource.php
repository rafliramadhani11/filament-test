<?php

namespace App\Filament\Resources;

use App\Models\Orangtua;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\OrangtuaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrangtuaResource\RelationManagers\AnaksRelationManager;

class OrangtuaResource extends Resource
{
    protected static ?string $model = Orangtua::class;
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Orangtua';
    protected static ?string $navigationGroup = 'Data Management';
    protected static ?string $navigationIcon = 'icon-parent';

    public static function getRelations(): array
    {
        return [
            AnaksRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrangtuas::route('/'),
            'edit' => Pages\EditOrangtua::route('/{record}/edit'),
            'create' => Pages\CreateOrangtua::route('/create')
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
