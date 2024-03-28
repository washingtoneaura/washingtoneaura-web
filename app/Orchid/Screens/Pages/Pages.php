<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class Pages extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $viewNames = [];
        $viewsPath = resource_path('views');
        $files = glob($viewsPath . '/*.blade.php');
        foreach ($files as $file) {
            $viewNames[] = basename($file, '.blade.php');
        }
        // Return an array of objects, where each object has a 'viewName' property
        return array_map(function ($viewName) {
            return (object) ['viewName' => $viewName];
        }, $viewNames);
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Pages';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::table('viewNamesTable', [
                TD::make('viewName', 'View Name'),
            ])
            ->title('Views')
        ];
    }
}
