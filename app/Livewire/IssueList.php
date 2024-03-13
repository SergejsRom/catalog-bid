<?php

namespace App\Livewire;

use App\Models\Issue;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\RichEditor;

class IssueList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
        ->query(Issue::query())
        ->columns([
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('description')->limit(50)->html(),
            Tables\Columns\TextColumn::make('expected_term'),
        ])
        ->filters([
            //
        ])
        ->actions([
            // Tables\Actions\EditAction::make(),
            Tables\Actions\ViewAction::make()
            ->form([
                TextInput::make('name'),
                RichEditor::make('description'),
                TextInput::make('expected_term'),
        ])

            ]);

        // return $table;
    }
    public function render()
    {
        return view('livewire.issue-list');
    }
}
