<?php

namespace App\Http\Controllers;

use App\LinkShop;
use Illuminate\Http\Request;
use App\Books;
use App\Shops;
use App\Http\Resources\BookResource;
use App\Http\Resources\ShopResource;
use App\Http\Resources\LinkResource;
use DB;
class HomeController extends Controller
{
    public function index()
    {
        LinkResource:: withoutWrapping ();
        return LinkResource::collection(LinkShop::get());
    }

    public function store(Request $request)
    {
        $link = LinkShop::create([
            'book_id' => $request->book_id,
            'shop_id' => $request->shop_id,
        ]);

        return new LinkResource($link);
    }
    public function showBook1($ganre_id, $shop_id)
    {
        /*select * from books
 join linkshop on books.id=linkshop.book_id
 join genres on books.genre_id=genres.id
 where genres.id = 2 and linkshop.shop_id = 1*/
        $link = DB::table('books')
            ->join('linkshop', 'books.id', '=', 'linkshop.book_id')
            ->join('genres', 'books.genre_id', '=', 'genres.id')
            ->join('shops', 'linkshop.shop_id', '=', 'shops.id')
            ->where('books.genre_id',$ganre_id)->where('linkshop.shop_id',$shop_id)
            ->get();
        return response()->json(["data" => $link], 200);

    }
    public function showBook($id)
    {
        LinkResource:: withoutWrapping ();
        return LinkResource::collection(LinkShop::where('book_id',$id)->get());
    }
}
