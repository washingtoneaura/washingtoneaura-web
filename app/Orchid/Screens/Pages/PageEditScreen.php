<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Pages;

use App\Models\Page;
use App\Orchid\Layouts\Pages\PageEditLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Link;

class PageEditScreen extends Screen
{
    /**
     * @var Page
     */
    public $page;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Page $page): iterable
    {
        return [
            'page' => $page,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return $this->page->exists ? 'Edit Page' : 'Create Page';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'Edit or create a new page.';
    }

    /**
     * The screen's action buttons.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Save'))
                ->icon('bs.check-circle')
                ->method('save'),

            Link::make('Preview')
                //->route('page.preview')
                ->icon('eye'),

            
        ];
    }

    /**
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::block(PageEditLayout::class)
            
                ->title(__('Page Information'))
                ->description(__('Update your page\'s information.'))
                ->commands(
                    Button::make(__('Save'))
                        ->type(Color::BASIC)
                        ->icon('bs.check-circle')
                        ->method('save')
                ),
        ];
    }

/**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Page $page, Request $request)
    {
        $request->validate([
            'page.title' => 'required|string|max:255',
            'page.slug' => 'required|string|max:255|unique:pages,slug,' . $page->id,
            'page.published' => 'required|boolean',
        ]);

        $pageData = $request->input('page');      
        $page->fill($pageData)->save();    

        Toast::info(__('Page was saved.'));

        return redirect()->route('platform.pages');
    }

}
