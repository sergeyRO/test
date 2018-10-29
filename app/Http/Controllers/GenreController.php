<?php

namespace App\Http\Controllers;

use App\Genres;
use Illuminate\Http\Request;
use App\Http\Resources\GenerResource;

class GenreController extends Controller
{
    public function index()
    {
        GenerResource :: withoutWrapping ();
        return GenerResource::collection(Genres::get());
    }

    public function store(Request $request)
    {
        $genre = Genres::create([
            'genre' => $request->genre,
        ]);

        return new GenerResource($genre);

    }

    public function show(Genres $genre)
    {
        return $genre;
    }

    public function update($id, Request $request)
    {
$genre = Genres::where('id',$id)->first();
$genre->genre = $request->genre;
$genre->update();
        return response()->json($genre);
    }

    public function destroy(Genres $genre)
    {
        $genre->delete();
        return response()->json(null, 204);
    }
}
