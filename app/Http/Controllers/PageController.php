<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function show($id)
    {
        $page = Page::findOrFail($id);
        return view('page.show', ['page' => $page]);
    }
}
