<?php
namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Component;
use Filament\Pages\Auth\Register as BaseRegister;
use Afatmustafa\FilamentTurnstile\Forms\Components\Turnstile;

 
class Register extends BaseRegister
{
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                        Turnstile::make('turnstile')
                    ->theme('light')
                    ->size('normal')
                    ->language('en-US'),
                    ])
                    ->statePath('data'),
            ),
        ];
    }
}