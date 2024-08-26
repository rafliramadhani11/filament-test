<?php

namespace App\Filament\Resources\OrangtuaResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\DatePicker;
use App\Filament\Resources\OrangtuaResource;
use Filament\Forms\Components\Tabs;
use Illuminate\Contracts\Support\Htmlable;

class EditOrangtua extends EditRecord
{
    protected static string $resource = OrangtuaResource::class;

    public function getTitle(): string|Htmlable
    {
        return $this->record->name . ' Edit';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Profile')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('name')->label('Nama')

                                    ->minLength(3),
                                TextInput::make('job')->label('Pekerjaan'),
                                Select::make('gender')->label('Jenis Kelamin')
                                    ->options([
                                        'Laki - Laki' => 'Laki - Laki',
                                        'Perempuan' => 'Perempuan',
                                    ])

                            ]),
                        Grid::make(3)
                            ->schema([
                                Select::make('type')->label('Tipe Orangtua')
                                    ->options([
                                        'Ayah' => 'Ayah',
                                        'Ibu' => 'Ibu',
                                        'Wali' => 'Wali',
                                    ]),

                                DatePicker::make('date_of_birth')->label('Tanggal Lahir')

                                    ->native(false)
                                    ->displayFormat('d F Y')
                                    ->locale('id'),
                                TextInput::make('phone_number')->label('No Handphone')

                                    ->numeric()
                                    ->prefix('+62')
                            ])
                    ]),
                Section::make('Informasi')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                Select::make('kota_id')->label('Kota')

                                    ->relationship('kota', 'name')
                                    ->native(false),
                                TextInput::make('district')->label('Kecamatan'),
                                TextInput::make('sub_district')->label('Kelurahan'),
                            ]),
                        TextInput::make('address')->label('Alamat')

                    ])
            ]);
    }
}
