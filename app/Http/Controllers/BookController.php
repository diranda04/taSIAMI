<?php

namespace App\Http\Controllers;

use App\book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index(){
        $books = Book::all();
        return view ('audit_book.index', compact('books'));
    }

    public function store(Request $request){
        $books = new Book ([
            'book_name' => $request->input('book_name'),
        ]);
        $books -> save();
        \Session::flash('sukses','Berhasil menambahkan judul buku');
        return redirect()->back();
    }

    public function destroy($id_book){
        $books = Book::find($id_book)->delete();
        \Session::flash('sukses','Standar berhasil hapus');
        return redirect()->back();
    }
}
