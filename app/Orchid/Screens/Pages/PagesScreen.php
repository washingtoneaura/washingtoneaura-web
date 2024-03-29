<?php

namespace App\Orchid\Screens\Pages;

use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use App\Orchid\Layouts\PagesListLayout;
use Orchid\Screen\Repository;
use Orchid\Screen\TD;
use Illuminate\Support\Str;
use Orchid\Screen\Components\Cells\Currency;
use Orchid\Screen\Components\Cells\DateTimeSplit;




class PagesScreen extends Screen
{
      /**
     * Fish text for the table.
     */
    public const TEXT_EXAMPLE = 'Lorem ipsum at sed ad fusce faucibus primis, potenti inceptos ad taciti nisi tristique
    urna etiam, primis ut lacus habitasse malesuada ut. Lectus aptent malesuada mattis ut etiam fusce nec sed viverra,
    semper mattis viverra malesuada quam metus vulputate torquent magna, lobortis nec nostra nibh sollicitudin
    erat in luctus.';

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
            // Extract the view name from the file path
            $viewName = str_replace([$viewsPath . '/', '.blade.php'], '', $file);
            
            // Create a Repository instance for each view file
            return new Repository([
                'view_name' => $viewName,
                'created_by' => 'Washingtone Aura',
                // You can add more fields here if needed
            ]);
        }, $viewFiles);

        return [
            'views-table' => $viewNames,
            'data' => [
                new Repository(['name' => 'Lorem ipsum', 'price' => 10.24, 'created_at' => '2020-01-01']),
            ],
            'table'   => [
                new Repository(['id' => 100, 'name' => self::TEXT_EXAMPLE, 'price' => 10.24, 'created_at' => '01.01.2020']),
                new Repository(['id' => 200, 'name' => self::TEXT_EXAMPLE, 'price' => 65.9, 'created_at' => '01.01.2020']),
                new Repository(['id' => 300, 'name' => self::TEXT_EXAMPLE, 'price' => 754.2, 'created_at' => '01.01.2020']),
                new Repository(['id' => 400, 'name' => self::TEXT_EXAMPLE, 'price' => 0.1, 'created_at' => '01.01.2020']),
                new Repository(['id' => 500, 'name' => self::TEXT_EXAMPLE, 'price' => 0.15, 'created_at' => '01.01.2020']),

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
                //PagesListLayout::class,
                Layout::table('views-table', [
                    TD::make('view_name', 'Pages')
                        ->width('100'),
                    TD::make('created_by', 'Created By')
                    ->width('100'),
                ]),


                Layout::table('table', [
                    TD::make('id')
                        ->width('100')
                        ->render(fn (Repository $model) => // Please use view('path')
                        "<img src='https://loremflickr.com/500/300?random={$model->get('id')}'
                                  alt='sample'
                                  class='mw-100 d-block img-fluid rounded-1 w-100'>
                                <span class='small text-muted mt-1 mb-0'># {$model->get('id')}</span>"),
    
                    TD::make('name')
                        ->width('450')
                        ->render(fn (Repository $model) => Str::limit($model->get('name'), 200)),
    
                    TD::make('price', 'Price')
                        ->width('100')
                        ->usingComponent(Currency::class, before: '$')
                        ->align(TD::ALIGN_RIGHT)
                        ->sort(),
    
                    TD::make('created_at', 'Created')
                        ->width('100')
                        ->usingComponent(DateTimeSplit::class)
                        ->align(TD::ALIGN_RIGHT),
                ]),
        


            Layout::table('data', [

                TD::make('name')
                    ->width('450px'),
                TD::make('price', 'Price')
                    ->width('100px')
                    ->align(TD::ALIGN_RIGHT),

            ])
        ];
    }
}
