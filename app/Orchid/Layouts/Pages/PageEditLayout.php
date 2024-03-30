<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Pages;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Quill;


class PageEditLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('page.title')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Title'))
                ->placeholder(__('Title')),
                
            Quill::make('page.content')
                ->title(__('Content'))
                ->placeholder(__('Enter your content here'))
                ->toolbar(["text", "color", "header", "list", "format", "media"]),

            Input::make('page.slug')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Slug'))
                ->placeholder(__('Slug')),

            CheckBox::make('page.published')
                ->value(true)
                ->sendTrueOrFalse()
                ->title(__('Published'))
                ->placeholder(__('Published'))
        ];
    }
}
