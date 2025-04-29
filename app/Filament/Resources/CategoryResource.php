<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CategoryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CategoryResource\RelationManagers;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;
    protected static ?string $navigationGroup = 'Postingan';
    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?int $navigationSort = 2;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required()->unique(ignoreRecord: true)->live(debounce: 1000)
                    ->afterStateUpdated(function ($state, callable $set) {
                        $state = $state ?? '';
                        $set('slug', Str::slug($state));
                    })->dehydrated(true),
                TextInput::make('slug')->required()->dehydrated(true)->readOnly(),
                Select::make('color')
                    ->options([
                        'success' => 'Green',
                        'warning' => 'Yellow',
                        'error' => 'Red',
                        'info' => 'Blue',
                    ])
                    ->native(false)
                    ->required()
                    ->unique(ignoreRecord: true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('title')->searchable()
                    ->badge()
                    ->color(fn($record) => match ($record->color) {
                        'success' => 'success',
                        'warning' => 'warning',
                        'error' => 'danger',
                        'info' => 'info',
                        default => 'secondary',
                    }),
                TextColumn::make('slug'),
                TextColumn::make('created_at')
                    ->dateTime('d-m-y')
                    ->sortable(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
