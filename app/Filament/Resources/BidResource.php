<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BidResource\Pages;
use App\Filament\Resources\BidResource\RelationManagers;
use App\Models\Bid;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BidResource extends Resource
{
    protected static ?string $model = Bid::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-euro';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListBids::route('/'),
            'create' => Pages\CreateBid::route('/create'),
            'edit' => Pages\EditBid::route('/{record}/edit'),
        ];
    }
}
