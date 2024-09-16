<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewModel;

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Убедитесь, что это поле необязательно
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public'); // Сохранение изображения в папку 'public/images'
        }

        NewModel::create([
            'summary' => $validatedData['summary'],
            'short_description' => $validatedData['short_description'],
            'full_text' => $validatedData['full_text'],
            'image_path' => $imagePath
        ]);

        return redirect()->route('news.index');
    }
}

