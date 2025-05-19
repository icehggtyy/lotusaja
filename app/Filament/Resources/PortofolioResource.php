<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Portofolio;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PortofolioResource\Pages;
use App\Filament\Resources\PortofolioResource\RelationManagers;
use Dom\Text;
use Filament\Forms\Components\RichEditor;

class PortofolioResource extends Resource
{
    protected static ?string $model = Portofolio::class;
    protected static ?string $navigationGroup = 'Postingan';
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->maxLength('255')->required()
                    ->live(debounce: 1000)
                    ->afterStateUpdated(function ($state, callable $set) {
                        $state = $state ?? '';
                        $set('slug', Str::slug($state));
                    }),
                TextInput::make('slug')
                    ->required()
                    ->disabled()
                    ->dehydrated(true),
                FileUpload::make('image')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('porto')
                    ->acceptedFileTypes(['image/webp'])
                    ->nullable(),
                TextInput::make('link_img')
                    ->url()
                    ->suffixIcon('heroicon-m-globe-alt'),
                TextInput::make('link')->required()->maxLength('300'),
                RichEditor::make('description')->required()->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable(),
                TextColumn::make('description')
                    ->wrap()
                    ->limit(50, '...')
                    ->tooltip(function ($state) {
                        return Str::limit(strip_tags($state), 100, '...');
                    })
                    ->html()
                    ->formatStateUsing(fn(string $state): string => $state),
                ImageColumn::make('image'),
                TextColumn::make('created_at')->sortable(),
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
            'index' => Pages\ListPortofolios::route('/'),
            'create' => Pages\CreatePortofolio::route('/create'),
            'edit' => Pages\EditPortofolio::route('/{record}/edit'),
        ];
    }
}
