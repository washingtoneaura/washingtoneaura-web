<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewsController extends Controller
{
    /**
     * Display a listing of the view names.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewNames = [];
        $viewsPath = resource_path('views');
        $files = glob($viewsPath . '/*.blade.php');
        foreach ($files as $file) {
            $viewNames[] = basename($file, '.blade.php');
        }

        return view('views.index', ['viewNames' => $viewNames]);
    }
}
