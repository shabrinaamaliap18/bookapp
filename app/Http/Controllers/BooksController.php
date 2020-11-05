<?php


namespace App\Http\Controllers;
use App\Models\Book;

class BooksController extends Controller{
public function index ()
{
  return Book::all();
}

public function berdasarID($id)
{

        if ($book = Book::find($id)){
        return $book;
        } 
        else{
        return response('Book Not Found', 404);
	}
}
}