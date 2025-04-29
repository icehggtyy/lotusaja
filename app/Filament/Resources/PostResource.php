<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PostResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PostResource\RelationManagers;
use Filament\Forms\Components\RichEditor;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $navigationGroup = 'Postingan';
    protected static ?string $navigationIcon = 'heroicon-o-bookmark-square';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required()->maxLength(255)->live(debounce: 1000)
                    ->afterStateUpdated(function ($state, callable $set) {
                        $state = $state ?? '';
                        $set('slug', Str::slug($state));
                    }),
                TextInput::make('slug')->required()->disabled()->dehydrated(true),
                Select::make('category_id')->required()->relationship('category', 'title')->searchable()->preload(),
                RichEditor::make('description')->required()->maxLength(3000)->columnSpanFull(),
                TextInput::make('author_id')->required()->disabled()
                    ->default(fn() => auth()->id())->dehydrated(true), //id() is not error but if you see it error it beacuse the intelephense
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable(),
                TextColumn::make('category.title')
                    ->label('Category')
                    ->badge()
                    ->color(fn($record) => match ($record->category->color ?? 'gray') {
                        'success' => 'success',
                        'warning' => 'warning',
                        'error' => 'danger',
                        'info' => 'info',
                        default => 'gray',
                    }),
                TextColumn::make('author.name')->label('Author'),
                TextColumn::make('description')
                    ->wrap()
                    ->limit(50, '...')
                    ->tooltip(function ($state) {
                        return Str::limit(strip_tags($state), 100, '...');
                    })
                    ->html() // This allows rendering the HTML content safely
                    ->formatStateUsing(fn(string $state): string => $state), // Remove nl2br and e() since we want to render HTML
                TextColumn::make('created_at')->dateTime('d-m-y')->sortable(),
            ])
            ->filters([
                SelectFilter::make('Author')
                    ->multiple()
                    ->relationship('author', 'name')
                    ->preload(),
                SelectFilter::make('Category')
                    ->multiple()
                    ->relationship('category', 'title')
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
