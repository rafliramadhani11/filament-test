<?php

namespace App\Filament\Resources;

use App\Models\Anak;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AnakResource\Pages\EditAnak;
use App\Filament\Resources\AnakResource\Pages\ListAnaks;
use App\Filament\Resources\AnakResource\Pages\CreateAnak;

class AnakResource extends Resource
{
    protected static ?string $model = Anak::class;
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Anak';
    protected static ?string $navigationGroup = 'Data Management';
    protected static ?string $navigationIcon = 'icon-baby';

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAnaks::route('/'),
            'create' => CreateAnak::route('/create'),
            'edit' => EditAnak::route('/{record}/edit')
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
