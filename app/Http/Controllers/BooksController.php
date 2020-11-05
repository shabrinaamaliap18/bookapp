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
     $books = Book::find($id);
  
     if ($books) {
         return response()->json([
             'message'   => 'show book by ID',
             'data'      => $books
         ], 200);
     } else {
         return response()->json([
             'message' => 'Book not found',
         ], 404);
   
     } 
}
}
