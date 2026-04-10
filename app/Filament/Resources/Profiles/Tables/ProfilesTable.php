<?php

namespace App\Filament\Resources\Profiles\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class ProfilesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo')
                    ->label('Foto')
                    ->circular()
                    ->disk('public'),

                TextColumn::make('name')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('title')
                    ->label('Profesi')
                    ->badge()
                    ->color('info'),

                TextColumn::make('github_username')
                    ->label('GitHub')
                    ->icon('heroicon-m-code-bracket'),
            ])
            ->filters([
                // Bisa tambahkan filter Jabatan / GitHub di sini
            ])
            ->recordActions([
                EditAction::make(), // tombol edit
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(), // tombol bulk delete
                ]),
            ]);
    }
}