<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewModel;

class NewsController extends Controller
{
    public function index()
    {
        $news = NewModel::all();

        return view('index', compact('news'));
    }

    public function create()
    {
        return view('addNew');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'header' => 'required|string|max:50',
            'short_text' => 'required|string|max:150',
            'article' => 'required|string|max:5000',
        ]);

        NewModel::create([
            'summary' => $validatedData['header'],
            'short_description' => $validatedData['short_text'],
            'full_text' => $validatedData['article'],
        ]);

        return redirect('/');
    }
}
