<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewModel;
use Illuminate\Support\Facades\Storage;


class NewsController extends Controller
{
    public function newView(Request $request)
    {
        $id = (int)$request->get('id');
        $new = NewModel::where('id', $id)->first();
        return view('newView', compact('new'));
    }

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
            'summary' => 'required|string|max:50',
            'short_description' => 'required|string|max:150',
            'full_text' => 'required|string|max:5000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
        }

        NewModel::create([
            'summary' => $validatedData['summary'],
            'short_description' => $validatedData['short_description'],
            'full_text' => $validatedData['full_text'],
            'image_path' => $imagePath
        ]);

        return redirect()->route('news.index');
    }

    public function edit(Request $request)
    {
        $id = (int)$request->get('id');
        $new = NewModel::where('id', $id)->first();
        return view('editNew', compact('new'));
    }

    public function update(Request $request)
    {
        $id = (int)$request->post('id');
        $validatedData = $request->validate([
            'summary' => 'required|string|max:50',
            'short_description' => 'required|string|max:150',
            'full_text' => 'required|string|max:5000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imgPath = null;

        $new = NewModel::find($id);

        if (request()->hasFile('image')) {
            if ($new->image_path != null) {
                Storage::delete($new->image_path);
            }

            $image = $request->file('image');
            $imgPath = $image->store('images', 'public');
        } else {
            $imgPath = $new->image_path;
        }

        $new->update([
            'summary' => $validatedData['summary'],
            'short_description' => $validatedData['short_description'],
            'full_text' => $validatedData['full_text'],
            'image_path' => $imgPath
        ]);
        redirect('news.index');
    }
}

