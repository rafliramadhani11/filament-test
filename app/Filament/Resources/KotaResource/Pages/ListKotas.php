<?php

namespace App\Filament\Resources\KotaResource\Pages;

use Closure;
use App\Models\Kota;
use Filament\Actions;
use Filament\Forms\Set;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Components\Grid;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\KotaResource;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\RestoreBulkAction;

class ListKotas extends ListRecords
{
    protected static string $resource = KotaResource::class;
    protected static ?string $title = 'Kota';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Buat Baru')
                ->form([
                    Grid::make(2)
                        ->schema([
                            TextInput::make('name')->label('Nama Kota')
                                ->required()
                                ->live(debounce: 500)
                                ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                            TextInput::make('slug')->label('Slug')
                                ->required()
                                ->disabled()
                                ->dehydrated()
                        ])
                ])->successNotification(
                    Notification::make()
                        ->title('Berhasil dibuat')
                        ->body('Data kota berhasil dibuat')
                        ->success()
                ),

        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('Tidak ada data Kota')
            ->paginated(false)
            ->columns([
                TextColumn::make('name')->label('Nama Kota')
                    ->sortable(),
                TextColumn::make('slug')->label('Slug'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([])
            ->actions([
                EditAction::make()
                    ->form([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')->label('Nama Kota')
                                    ->required()
                                    ->unique(table: Kota::class)
                                    ->validationMessages([
                                        'unique' => 'Nama kota sudah ada'
                                    ])
                                    ->live(debounce: 500)
                                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                                TextInput::make('slug')->label('Slug')
                                    ->required()
                                    ->validationMessages([
                                        'unique' => ' '
                                    ])
                                    ->unique(table: Kota::class)
                                    ->disabled()
                                    ->dehydrated()
                            ])
                    ])
                    ->successNotification(
                        Notification::make()
                            ->title('Berhasil diubah')
                            ->body('Data kota berhasil diubah')
                            ->icon('heroicon-o-pencil-square')
                            ->success()

                    ),
                DeleteAction::make()
                    ->modalHeading('Delete data kota')
                    ->modalDescription('Semua data dari kota ini akan terhapus, apa kamu yakin ?')
                    ->modalSubmitActionLabel('Ya, Hapus')
                    ->successNotification(
                        Notification::make()
                            ->title('Berhasil dihapus')
                            ->body('Data kota berhasil dihapus')
                            ->success()
                    ),
            ])
            ->bulkActions([]);
    }
}
