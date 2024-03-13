<?php

namespace App\Filament\Resources\IssueResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Bid;

class BidsRelationManager extends RelationManager
{
    protected static string $relationship = 'bids';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('start_date')
                ->required(),
                Forms\Components\DatePicker::make('estimated_date')
                ->required(),
                    Forms\Components\TextInput::make('amount')
                    ->required()
                    ->numeric(),
                    Forms\Components\TextInput::make('comment')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        if (auth()->user()->hasRole('super_admin')) {
            return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('start_date'),
                Tables\Columns\TextColumn::make('estimated_date'),
                Tables\Columns\TextColumn::make('amount'),
                Tables\Columns\TextColumn::make('comment'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->slideOver(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->slideOver(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
        }else{
            return $table
            ->query(Bid::where('user_id', '=', auth()->user()->id))
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('start_date'),
                Tables\Columns\TextColumn::make('estimated_date'),
                Tables\Columns\TextColumn::make('amount'),
                Tables\Columns\TextColumn::make('comment'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->slideOver(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Make a bid')->slideOver(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
        }
    }
}
