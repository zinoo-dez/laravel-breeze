<?php

namespace App\Filament\Resources;

use App\Enums\ActiveinactiveType;
use App\Filament\Resources\AdvertismentResource\Pages;
use App\Filament\Resources\AdvertismentResource\RelationManagers;
use App\Models\Advertisment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdvertismentResource extends Resource
{
    protected static ?string $model = Advertisment::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name'),
                Forms\Components\TextInput::make('location'),
                Forms\Components\TextInput::make('sorting'),
                Forms\Components\TextInput::make('link'),
                Forms\Components\DateTimePicker::make('expired_at'),
                Forms\Components\Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('location'),
                Tables\Columns\TextColumn::make('sorting'),
                Tables\Columns\TextColumn::make('link'),
                Tables\Columns\TextColumn::make('expired_at'),
                Tables\Columns\TextColumn::make('status'),
                // Tables\Columns\IconColumn::make('status')
                // ->label('Status')
                // ->getStateUsing(function ($record) {
                //     return $record->status === ActiveinactiveType::Active ? true : false;
                // })
                // ->trueIcon('heroicon-o-check-circle') // Icon for active
                // ->falseIcon('heroicon-o-x-circle'),


            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdvertisments::route('/'),
            'create' => Pages\CreateAdvertisment::route('/create'),
            'edit' => Pages\EditAdvertisment::route('/{record}/edit'),
        ];
    }
}
