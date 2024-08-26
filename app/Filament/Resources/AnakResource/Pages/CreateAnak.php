<?php

namespace App\Filament\Resources\AnakResource\Pages;

use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use App\Filament\Resources\AnakResource;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\CreateRecord;

class CreateAnak extends CreateRecord
{
    protected static string $resource = AnakResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $weight = $data['weight'] ?? 0;
        $height = $data['height'] ?? 0;

        $heightM = round($height / 100, 2);

        $imt = $heightM > 0 ? round($weight / ($heightM * $heightM), 2) : null;

        $data['body_mass_index'] = $imt;
        return $data;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(4)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Anak'),
                        Select::make('orangtua_id')
                            ->label('Nama Oang Tua')
                            ->relationship(name: 'orangtua', titleAttribute: 'name'),
                        Select::make('gender')
                            ->label('Jenis Kelamin')
                            ->options([
                                'Laki - Laki' => 'Laki - Laki',
                                'Perempuan' => 'Perempuan',
                            ]),
                        TextInput::make('age')->label('Umur (bulan)')
                            ->numeric()
                    ]),
                Grid::make(4)
                    ->schema([
                        TextInput::make('weight')
                            ->label('Berat Badan (g)')
                            ->numeric(),
                        TextInput::make('height')
                            ->label('Panjang Badan (cm)')
                            ->numeric()
                    ])
            ]);
    }
}
