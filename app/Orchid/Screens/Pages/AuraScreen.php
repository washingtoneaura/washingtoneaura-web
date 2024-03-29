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
use App\Orchid\Layouts\AuraListLayout;


class AuraScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Aura Dashboard';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [ 
            'names' => [
                ['name' => 'John Doe', 'created_at' => now()],
                ['name' => 'Jane Doe', 'created_at' => now()],
                ['name' => 'Alice Smith', 'created_at' => now()],
                ['name' => 'Bob Johnson', 'created_at' => now()],
                ['name' => 'Charlie Brown', 'created_at' => now()],
            ],
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
            //AuraListLayout::class,
        ];
    }
}
