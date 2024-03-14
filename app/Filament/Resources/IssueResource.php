<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IssueResource\Pages;
use App\Filament\Resources\IssueResource\RelationManagers;
use App\Models\Issue;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class IssueResource extends Resource
{
    protected static ?string $model = Issue::class;

    protected static ?string $navigationIcon = 'heroicon-o-bolt';

    public static function form(Form $form): Form
    {
        if (auth()->user()->hasRole('super_admin')) {
            return $form
            ->schema([
                Forms\Components\TextInput::make('name'),
                Forms\Components\RichEditor::make('description'),
                Forms\Components\DatePicker::make('expected_term'),
            ])
            ->columns(1);
        }else{
            return $form
            ->schema([
                Forms\Components\TextInput::make('name')->disabledOn('edit'),
                Forms\Components\RichEditor::make('description')->disabledOn('edit'),
                Forms\Components\DatePicker::make('expected_term')->disabledOn('edit'),
            ])
            ->columns(1);
        }
        
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description')->limit(50)->html(),
                Tables\Columns\TextColumn::make('expected_term'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('New bid')->icon('heroicon-o-plus')->form([
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
                ])
                    ->action(function (array $data, \App\Models\Issue $record): void {
                        $record->bids()->create($data);
                        $record->save();
                    })
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
            RelationManagers\BidsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIssues::route('/'),
            'create' => Pages\CreateIssue::route('/create'),
            'edit' => Pages\EditIssue::route('/{record}/edit'),
            'view' => Pages\ViewIssue::route('/{record}'),
        ];
    }
}
