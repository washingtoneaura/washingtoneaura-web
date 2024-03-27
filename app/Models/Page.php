<?php

namespace App\Models;

use Orchid\Platform\Models\Page as OrchidPage;
use Orchid\Screen\AsSource;
use Orchid\Screen\Fields\Text;
use Orchid\Screen\Fields\TextArea;

class Page extends OrchidPage
{
    use AsSource;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Define the fields for the model.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Text::make('title')
                ->required()
                ->title('Title')
                ->placeholder('Enter the title here'),

            Text::make('slug')
                ->required()
                ->title('Slug')
                ->placeholder('Enter the slug here')
                ->help('The slug is used in the URL for this page.'),

            TextArea::make('content')
                ->required()
                ->title('Content')
                ->placeholder('Enter the content here')
                ->rows(10),
        ];
    }
}