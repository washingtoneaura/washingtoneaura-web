<?php

namespace App\Orchid\Screens\Pages;

use Orchid\Screen\Screen;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;
//use Orchid\Screen\Layout;
use Orchid\Screen\Layouts\Table; // Import the Table layout
//use Orchid\Screen\Fields\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\TD;
use App\Orchid\Layouts\PagesListLayout; // Import the PagesListLayout



class PagesScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Pages Dashboard';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        $viewsPath = resource_path('views');
        $viewFiles = glob($viewsPath . '/*.blade.php');
        $viewNames = array_map(function ($file) use ($viewsPath) {
            return (object) ['view_name' => str_replace([$viewsPath . '/', '.blade.php'], '', $file)];
        }, $viewFiles);
    
        return [
            'views' => $viewNames,
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [
            //PagesListLayout::class,
        ];
    }
}
