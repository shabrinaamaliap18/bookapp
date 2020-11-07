<?php


namespace App\Http\Controllers;
use App\Models\Book;
use Symfony\Component\Translation\Catalogue\AbstractOperation;
use Illuminate\Http\Request;

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
<<<<<<< HEAD
        }
      
}
public function store(Request $request)
  {
    $this->validate($request, [
      'title' => 'required',
      'description' => 'required',
      'author' => 'required'
    ]);

    $books = Book::create(
      $request->only(['title', 'description', 'author'])
    );

    return response()->json([
      'created' => true,
      'data' => $books
    ], 201);
  }

  public function update(Request $request, $id)
  {
    try {
      $books = Book::findOrFail($id);
    } catch (ModelNotFoundException $exception) {
      return response()->json([
        'message' => 'book not found'
      ], 404);
    }

    $books->fill(
      $request->only(['title', 'description', 'author'])
    );
    $books->save();

    return response()->json([
      'updated' => true,
      'data' => $books
    ], 200);
  }

  public function destroy($id)
  {
    try {
      $books = Book::findOrFail($id);
    } catch (ModelNotFoundException $exception) {
      return response()->json([
        'error' => [
          'message' => 'book not found'
        ]
      ], 404);
    }

    $books->delete();

    return response()->json([
      'deleted' => true
    ], 200);
  }



}

  
=======
   
     } 
}
}
>>>>>>> 7752fe4ace372d307550f61288fcc93070d27d5d
