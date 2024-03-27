<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Layout;
use App\Models\Page;

class PagesScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    /*public function query(): iterable
    {
        return [];
    }*/

    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Pages';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Page Screen';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Page $page): array
    {
        return [
            'page' => $page,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'PagesScreen';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            Button::make('Create Page')
                ->icon('icon-pencil')
                ->method('createOrUpdatePage'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    /*public function layout(): iterable
    {
        return [];
    }*/

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): array
    {
        return [
            Input::make('page.title')
                ->title('Title')
                ->placeholder('Enter the title here'),

            Input::make('page.slug')
                ->title('Slug')
                ->placeholder('Enter the slug here')
                ->help('The slug is used in the URL for this page.'),

            Quill::make('page.content')
                ->title('Content')
                ->placeholder('Enter the content here'),
        ];
    }
}
