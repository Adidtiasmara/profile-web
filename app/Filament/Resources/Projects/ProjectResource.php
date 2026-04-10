<?php

namespace App\Filament\Resources\Projects;

use App\Filament\Resources\Projects\Pages\CreateProject;
use App\Filament\Resources\Projects\Pages\EditProject;
use App\Filament\Resources\Projects\Pages\ListProjects;
use App\Filament\Resources\Projects\Tables\ProjectsTable;
use App\Models\Project;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

// Form Components
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TagsInput;

use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Proyek')
                    ->description('Detail utama proyek')
                    ->icon('heroicon-o-folder')
                    ->schema([
                        Select::make('profile_id')
                            ->relationship('profile', 'name')
                            ->label('Pemilik')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpan(1),

                        TextInput::make('title')
                            ->label('Judul Proyek')
                            ->placeholder('Contoh: ClipFluence Dashboard')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(2),

                        FileUpload::make('image')
                            ->label('Thumbnail')
                            ->image()
                            ->imageEditor()
                            ->directory('projects/thumbnails')
                            ->disk('public')
                            ->imagePreviewHeight('200')
                            ->helperText('Gunakan rasio 16:9 agar tampilan optimal')
                            ->maxSize(2048)
                            ->columnSpanFull(),
                    ])
                    ->columns(3),

                Section::make('Detail Teknis')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->schema([
                        TagsInput::make('tech_stack')
                            ->label('Tech Stack')
                            ->placeholder('Tambah teknologi...')
                            ->separator(',')
                            ->helperText('Contoh: Laravel, React, MySQL')
                            ->columnSpan(2),

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'Completed' => '✅ Completed',
                                'In Progress' => '⏳ In Progress',
                                'Maintenance' => '🛠️ Maintenance',
                            ])
                            ->native(false)
                            ->default('Completed')
                            ->required()
                            ->columnSpan(1),
                    ])
                    ->columns(3),

                Section::make('Deskripsi Proyek')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        RichEditor::make('description')
                            ->label('Deskripsi')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'strike',
                                'link',
                                'bulletList',
                                'orderedList',
                                'h2',
                                'h3',
                            ])
                            ->required()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return ProjectsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProjects::route('/'),
            'create' => CreateProject::route('/create'),
            'edit' => EditProject::route('/{record}/edit'),
        ];
    }
}