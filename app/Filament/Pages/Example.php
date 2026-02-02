<?php

declare(strict_types=1);

namespace App\Filament\Pages;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;

final class Example extends Page implements HasSchemas
{
    use InteractsWithSchemas;

    public ?array $data = [];

    protected string $view = 'filament.pages.example';

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->columns(2)
            ->components([
                Section::make()
                    ->divided()
                    ->heading('Addresses (divided parent Section)')
                    ->schema([
                        Repeater::make('addresses')
                            ->schema([
                                TextInput::make('street'),
                                TextInput::make('city'),
                                TextInput::make('zip'),
                                TextInput::make('state'),
                            ]),
                    ]),

                Section::make()
                    ->heading('Addresses (undivided)')
                    ->schema([
                        Repeater::make('more_addresses')
                            ->schema([
                                TextInput::make('street'),
                                TextInput::make('city'),
                                TextInput::make('zip'),
                                TextInput::make('state'),
                            ]),
                    ]),

            ]);
    }
}
