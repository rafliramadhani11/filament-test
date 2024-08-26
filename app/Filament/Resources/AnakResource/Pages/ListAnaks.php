<?php

namespace App\Filament\Resources\AnakResource\Pages;

use App\Models\Anak;
use Filament\Actions;
use Filament\Tables\Table;
use Illuminate\Pagination\Paginator;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\AnakResource;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\CursorPaginator;

class ListAnaks extends ListRecords
{
    protected static string $resource = AnakResource::class;
    protected static ?string $title = 'Anak';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('Data tidak ada')
            ->queryStringIdentifier('anaks')
            ->columns([
                TextColumn::make('name')->label('Nama Anak')
                    ->description(fn(Anak $record): string => $record->orangtua->name),
                TextColumn::make('gender')->label('Jenis Kelamin'),
                TextColumn::make('age')->label('Umur')
                    ->formatStateUsing(fn($state): string
                    => $state . ' bulan'),
                TextColumn::make('weight')->label('Berat Badan')
                    ->formatStateUsing(fn($state): string
                    => $state . ' g'),
                TextColumn::make('height')->label('Panjang Badan')
                    ->formatStateUsing(fn($state): string
                    => $state . ' cm'),
                TextColumn::make('body_mass_index')->label('Indeks Massa Tubuh'),
            ])
            ->filters([])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make()
                ])
            ])
            ->bulkActions([]);
    }
}
