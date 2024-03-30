<?php

// app/Orchid/Screens/PageListScreen.php

namespace App\Orchid\Screens\Pages;

use App\Models\Page;
use App\Orchid\Layouts\Pages\PagesListLayout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Platform\Models\User;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\TD;
use Orchid\Screen\Repository;


class PagesListScreen extends Screen
{
    public function query(): iterable
    {
    // Fetch all pages from the database
    $pages = Page::all();

    // Wrap each page in a Repository instance
    $pagesRepository = $pages->map(function ($page) {
        return new Repository([
            'id' => $page->id,
            'title' => $page->title,
            'slug' => $page->slug,
            'published' => $page->published,
            'created_at' => $page->created_at,
            'updated_at' => $page->updated_at,
            // Add more fields as needed
        ]);
    });

    return [
        'pages' => $pagesRepository,
    ];

    }

    public function name(): ?string
    {
        return 'Page Management';
    }

    public function description(): ?string
    {
        return 'A comprehensive list of all pages.';
    }

    public function commandBar(): iterable
    {
        return [
            Link::make(__('Add Page'))
                ->icon('bs.plus-circle')
                ->route('platform.pages.create'),
        ];
    }

    public function layout(): iterable
    {
        return [
            PagesListLayout::class,
            /*Layout::table('pages', [
                TD::make('title', 'Title'),
                TD::make('slug', 'Slug'),
                TD::make('published', 'Published'),
                // Add more columns as needed
            ]),*/
        ];
    }

    // Add methods for editing a page, similar to the saveUser method in the UserListScreen example.
}
