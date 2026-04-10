<?php

namespace App\Filament\Resources\Projects\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('profile.name')
                    ->label('Profil')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('title')
                    ->label('Judul Proyek')
                    ->searchable()
                    ->weight('bold'),
                TextColumn::make('github_link')
                    ->label('GitHub')
                    ->url(fn ($record) => $record->github_link)
                    ->openUrlInNewTab()
                    ->searchable(),
                ImageColumn::make('image')
                    ->disk('public')
                    ->label('Thumbnail')
                    ->height(80),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
