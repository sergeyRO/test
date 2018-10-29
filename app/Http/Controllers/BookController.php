<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Books;
use App\Http\Resources\BookResource;
use DB;
class BookController extends Controller
{
    public function index()
    {
        BookResource :: withoutWrapping ();
        return BookResource::collection(Books::get());
       /* return response()->json(Books::get());*/
    }

    public function store(Request $request)
    {
        $book = Books::create([
            'name' => $request->name,
            'comments' => $request->comments,
            'pages' => $request->pages,
            'summa' => $request->summa,
            'genre_id' => $request->genre_id,
        ]);
     //   return response()->json($book);


       /* $book = new Books();
        $book->name = $request->input('name');
        $book->comments = $request->input('comments');
        $book->pages = $request->input('pages');
        $book->summa = $request->input('summa');
        $book->genre_id = $request->input('genre_id');
        $book->save();
        return response()->json($book,201);*/
       // return new BookResource($book);
       // return response()->json($data);

       // return response()->json($book);
        return new BookResource($book);

    }

    public function show(Books $book)
    {
        return $book;
     /*   return new BookResource($book);*/
    }

    public function update(Request $request, Books $book)
    {
        // check if currently authenticated user is the owner of the book
        /*if ($request->user()->id !== $book->user_id) {
            return response()->json(['error' => 'You can only edit your own books.'], 403);
        }*/

        $book->update($request->only(['name', 'comments','pages','summa','genre_id']));

        return new BookResource($book);
    }

    public function destroy(Books $book)
    {
       $book->delete();
        return response()->json(null, 204);
    }
}
