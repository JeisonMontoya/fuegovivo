<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class MyNetwork extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-share';

    protected static ?string $navigationLabel = 'Mi Red';

    protected string $view = 'filament.pages.my-network';
}
