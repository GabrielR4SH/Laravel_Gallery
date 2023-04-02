<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photos;
use Illuminate\Support\Facades\Storage;

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

    public function edit(Photos $photo)
    {
        return view('edit')->with('photo', $photo);
    }
    

    public function update(Request $request, $id)
    {
        $photo = Photos::findOrFail($id);

        $photo->title = $request->input('title');
        $photo->description = $request->input('description');

        if ($request->hasFile('imagem')) {
        
        Storage::delete($photo->image);
        
        }
        $path = $request->file('imagem')->store('public/photos');
        $photo->image = $path;
        $photo->save();
        return redirect()->route('index');

    }

     public function delete($id)
    {
        $photo = Photos::findOrFail($id);
        Storage::delete($photo->image);
        $photo->delete();
        return redirect()->route('index');
    }

}



    



