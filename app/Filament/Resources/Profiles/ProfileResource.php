<?php

namespace App\Filament\Resources\Profiles;

use App\Filament\Resources\Profiles\Pages\CreateProfile;
use App\Filament\Resources\Profiles\Pages\EditProfile;
use App\Filament\Resources\Profiles\Pages\ListProfiles;
use App\Filament\Resources\Profiles\Schemas\ProfileForm;
use App\Filament\Resources\Profiles\Tables\ProfilesTable;
use App\Models\Profile;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';


public static function form(Schema $schema): Schema
{
    return $schema
        ->schema([
            Section::make('Informasi Utama')
                ->schema([
                    TextInput::make('name')
                        ->required(),

                    TextInput::make('title')
                        ->label('Profesi'),

                    Textarea::make('bio')
                        ->rows(4),
                ]),

            Section::make('Media')
                ->schema([
                    FileUpload::make('photo')
                        ->image()
                        ->directory('profiles')
                        ->imagePreviewHeight('150'),

                    FileUpload::make('cv')
                        ->directory('cv'),
                ]),

            Section::make('Social')
                ->schema([
                    TextInput::make('github_username'),

                    TextInput::make('email')
                        ->email(),
                ]),
        ]);
}

    public static function table(Table $table): Table
    {
        return ProfilesTable::configure($table);
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
            'index' => ListProfiles::route('/'),
            'create' => CreateProfile::route('/create'),
            'edit' => EditProfile::route('/{record}/edit'),
        ];
    }
}
