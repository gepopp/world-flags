<?php

namespace App\Filament\Resources;

use App\Actions\Countries;
use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form( Form $form ): Form
    {
        return $form
            ->schema( [
                Forms\Components\SpatieMediaLibraryFileUpload::make( 'image' )
                                                             ->responsiveImages()
                                                             ->preserveFilenames()
                                                             ->disk( 's3' ),
                Forms\Components\Select::make( 'country' )
                                       ->options( function () {
                                           return Countries::codeAndName();
                                       } )
                                       ->searchable()
                                       ->columnSpanFull(),

                Forms\Components\TextInput::make( 'title' )
                                          ->required()
                                          ->maxLength( 255 )
                                          ->columnSpanFull(),
                Forms\Components\RichEditor::make( 'content' )
                                           ->required()
                                           ->columnSpanFull(),
            ] );
    }

    public static function table( Table $table ): Table
    {
        return $table
            ->columns( [
                Tables\Columns\TextColumn::make( 'country' )
                                         ->searchable(),
                Tables\Columns\TextColumn::make( 'title' )
                                         ->searchable(),
                Tables\Columns\TextColumn::make( 'created_at' )
                                         ->dateTime()
                                         ->sortable()
                                         ->toggleable( isToggledHiddenByDefault: true ),
                Tables\Columns\TextColumn::make( 'updated_at' )
                                         ->dateTime()
                                         ->sortable()
                                         ->toggleable( isToggledHiddenByDefault: true ),
            ] )
            ->filters( [
                //
            ] )
            ->actions( [
                Tables\Actions\EditAction::make(),
            ] )
            ->bulkActions( [
                Tables\Actions\BulkActionGroup::make( [
                    Tables\Actions\DeleteBulkAction::make(),
                ] ),
            ] );
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
            'index'  => Pages\ListArticles::route( '/' ),
            'create' => Pages\CreateArticle::route( '/create' ),
            'edit'   => Pages\EditArticle::route( '/{record}/edit' ),
        ];
    }
}
