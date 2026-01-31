<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class MyTeam extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Mi Equipo';

    protected string $view = 'filament.pages.my-team';
}
