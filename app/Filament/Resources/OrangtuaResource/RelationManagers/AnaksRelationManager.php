<?php

namespace App\Filament\Resources\OrangtuaResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class AnaksRelationManager extends RelationManager
{
    protected static string $relationship = 'anaks';
    protected static ?string $title = 'Data Anak';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('Tidak ada data anak')
            ->emptyStateDescription('')
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nama'),
                Tables\Columns\TextColumn::make('gender')->label('Jenis Kelamin'),
                Tables\Columns\TextColumn::make('age')->label('Umur'),
                Tables\Columns\TextColumn::make('weight')->label('Berat Badan'),
                Tables\Columns\TextColumn::make('height')->label('Panjang Badan'),
                Tables\Columns\TextColumn::make('body_mass_index')->label('Indeks Massa Tubuh'),

            ])

            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    protected function paginateTableQuery(Builder $query): Paginator
    {
        return $query->simplePaginate(($this->getTableRecordsPerPage() === 'all') ? $query->count() : $this->getTableRecordsPerPage());
    }
}
