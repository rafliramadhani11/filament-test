<?php

namespace App\Filament\Resources\OrangtuaResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\OrangtuaResource;

class CreateOrangtua extends CreateRecord
{
    protected static string $resource = OrangtuaResource::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Profile')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('name')->label('Nama')
                                    ->required()
                                    ->minLength(3),
                                TextInput::make('job')->label('Pekerjaan')
                                    ->required(),
                                Select::make('gender')->label('Jenis Kelamin')
                                    ->options([
                                        'Laki - Laki' => 'Laki - Laki',
                                        'Perempuan' => 'Perempuan',
                                    ])
                                    ->required()
                                    ->native(false)
                            ]),
                        Grid::make(3)
                            ->schema([
                                Select::make('type')->label('Tipe Orangtua')
                                    ->options([
                                        'Ayah' => 'Ayah',
                                        'Ibu' => 'Ibu',
                                        'Wali' => 'Wali',
                                    ])
                                    ->required()
                                    ->native(false),
                                DatePicker::make('date_of_birth')->label('Tanggal Lahir')
                                    ->required()
                                    ->native(false)
                                    ->displayFormat('d F Y')
                                    ->locale('id'),
                                TextInput::make('phone_number')->label('No Handphone')
                                    ->required()
                                    ->numeric()
                                    ->prefix('+62')
                            ])
                    ]),
                Section::make('Informasi')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                Select::make('kota_id')->label('Kota')
                                    ->required()
                                    ->relationship('kota', 'name')
                                    ->native(false),
                                TextInput::make('district')->label('Kecamatan')
                                    ->required(),
                                TextInput::make('sub_district')->label('Kelurahan')
                                    ->required(),
                            ]),
                        Textarea::make('address')->label('Alamat')
                            ->required()
                    ])
            ]);
    }
}
