<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photos;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photos::all();
        return view('index')->with('photos', $photos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'imagem' => 'required|image',
            'titulo' => 'required',
            'descricao' => 'required',
        ]);

        $path = $request->file('imagem')->storePublicly('public/images');
        $name_image = basename($path);

        $photo = new Photos();
        $photo->title = $request->titulo;
        $photo->description = $request->descricao;
        $photo->image = $name_image;
        $photo->save();

        return redirect()->back();
    }

}