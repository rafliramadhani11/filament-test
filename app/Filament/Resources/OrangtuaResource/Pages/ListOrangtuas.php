<?php

namespace App\Filament\Resources\OrangtuaResource\Pages;

use Carbon\Carbon;
use Filament\Actions;
use App\Models\Orangtua;
use Filament\Tables\Table;
use Filament\Resources\Components\Tab;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\ActionGroup;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\OrangtuaResource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\RestoreBulkAction;

class ListOrangtuas extends ListRecords
{
    protected static string $resource = OrangtuaResource::class;
    protected static ?string $title = 'Orangtua';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'All Data' => Tab::make()
                ->badge(Orangtua::count())
                ->modifyQueryUsing(fn(Builder $query) => $query->where('deleted_at', null)),
            'Trashed' => Tab::make()
                ->badge(Orangtua::onlyTrashed()->count())
                ->modifyQueryUsing(fn(Builder $query) => $query->onlyTrashed())
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nama')
                    ->description(fn(Orangtua $record): string => $record->type),
                TextColumn::make('gender')->label('Jenis Kelamin'),
                TextColumn::make('phone_number')->label('No Handphone')
                    ->prefix('+62 '),
                TextColumn::make('job')->label('Pekerjaan'),
                TextColumn::make('date_of_birth')->label('Tanggal Lahir')
                    ->formatStateUsing(fn($state) => Carbon::parse($state)->locale('id')->translatedFormat('d F Y')),
                TextColumn::make('address')->label('Alamat'),
            ])
            ->filters([])
            // Not Finish yet -------------
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
                ForceDeleteAction::make(),
                RestoreAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
