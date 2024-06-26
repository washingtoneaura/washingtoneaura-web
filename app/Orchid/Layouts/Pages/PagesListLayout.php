<?php

namespace App\Orchid\Layouts\Pages;

use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use App\Models\Page;


class PagesListLayout extends Table
{
    protected $target = 'pages';

    protected function columns(): array
    {
        return [
            TD::make('title', 'Title')
                ->sort()
                ->cantHide()
                ->filter(TD::FILTER_TEXT)
                ->render(function ($repository) {
                    $title = $repository->get('title');
                    $id = $repository->get('id');
    
                    return Link::make($title)
                        ->route('platform.pages.edit', $id);
                }),

            TD::make('slug', 'Slug')
                ->sort()
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

            TD::make('published', 'Published')
                ->sort()
                ->cantHide()
                ->filter(TD::FILTER_TEXT),

            TD::make('created_at', 'Created')
                //->align(TD::ALIGN_RIGHT)
                ->sort(),

            TD::make('updated_at', 'Last Modified')
                //->align(TD::ALIGN_RIGHT)
                ->sort(),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function ($repository) {
                $page = $repository->get('page');
                $id = $repository->get('id');
                return DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([
                        Link::make(__('Edit'))
                            ->route('platform.pages.edit', $id)
                            ->icon('bs.pencil'),

                        Button::make('Preview')
                            //->route('page.preview')
                            ->icon('eye')
                            ->route('pages.preview', $id)
                            ->target('_blank'),

                        Button::make(__('Delete'))
                            ->icon('bs.trash3')
                            ->confirm(__('Once the page is deleted, all of its resources and data will be permanently deleted. Before deleting this page, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $id,
                        ]),
                ]);
            }),
        ];
    }
}
