<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages\CreatePost;
use App\Filament\Resources\PostResource\Pages\EditPost;
use App\Filament\Resources\PostResource\Pages\ListPosts;
use App\Filament\Resources\PostResource\Pages\ViewPost;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Split;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Forms\Components\Split::make([

                    Section::make([
                        TextInput::make('title')
                            ->required(),
                        TextInput::make('slug')
                            ->required(),
                        RichEditor::make('content')
                            ->columnSpanFull(),
                        TagsInput::make('tags')
                            ->columnSpanFull(),
                    ]),

                    Section::make([
                        FileUpload::make('image')
                            ->image()
                            ->disk('public'),
                        Toggle::make('published'),
                        DateTimePicker::make('published_at'),
                    ])
                        ->grow(false)
                        ->extraAttributes(['style' => 'min-width:300px']),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->columns(null)
            ->schema([
                Split::make([
                    \Filament\Infolists\Components\Section::make([
                        TextEntry::make('title')
                            ->weight('bold'),
                        TextEntry::make('slug')
                            ->color('primary'),
                        TextEntry::make('content')
                            ->prose()
                            ->alignJustify(),
                        TextEntry::make('tags')
                            ->badge(),
                    ]),

                    \Filament\Infolists\Components\Section::make([
                        ImageEntry::make('image')
                            ->width(300)
                            ->height(200),
                        IconEntry::make('published')
                            ->boolean(),
                        TextEntry::make('published_at')
                            ->dateTime(),
                    ])
                        ->grow(false),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('title')
                    ->searchable(),
                ToggleColumn::make('published'),
                TextColumn::make('published_at')
                    ->since()
                    ->sortable(),
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
            ->actions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => ListPosts::route('/'),
            'create' => CreatePost::route('/create'),
            'view' => ViewPost::route('/{record}'),
            'edit' => EditPost::route('/{record}/edit'),
        ];
    }
}
