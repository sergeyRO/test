<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ShopResource;
use App\Shops;
class ShopController extends Controller
{
    public function index()
    {
        ShopResource :: withoutWrapping ();
        return ShopResource::collection(Shops::get());
        /* return response()->json(Books::get());*/
    }

    public function store(Request $request)
    {
        $shop = Shops::create([
            'name' => $request->name,
            'address' => $request->address,
        ]);
        return new ShopResource($shop);

    }

    public function show(Shops $shop)
    {
        return $shop;
        /*   return new BookResource($book);*/
    }

    public function update(Request $request, Shops $shop)
    {
        // check if currently authenticated user is the owner of the book
        /*if ($request->user()->id !== $book->user_id) {
            return response()->json(['error' => 'You can only edit your own books.'], 403);
        }*/

        $shop->update($request->only(['name', 'address']));

        return new ShopResource($shop);
    }

    public function destroy(Shops $shop)
    {
        $shop->delete();
        return response()->json(null, 204);
    }
}
