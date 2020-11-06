<?php


namespace App\Http\Controllers;
use App\Models\Author;
use Symfony\Component\Translation\Catalogue\AbstractOperation;
use Illuminate\Http\Request;

class AuthorController extends Controller{
public function index ()
{
  return Author::all();
}

public function berdasarID($id)
{
     $authors = Author::find($id);
  
     if ($authors) {
         return response()->json([
             'message'   => 'show Author by ID',
             'data'      => $authors
         ], 200);
     } else {
         return response()->json([
             'message' => 'Author not found',
         ], 404);
        }
      
}
public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required',
      'gender' => 'required',
      'biography' => 'required'
    ]);

    $authors = Author::create(
      $request->only(['name', 'gender', 'biography'])
    );

    return response()->json([
      'created' => true,
      'data' => $authors
    ], 201);
  }

  public function update(Request $request, $id)
  {
    try {
      $authors = Author::findOrFail($id);
    } catch (ModelNotFoundException $exception) {
      return response()->json([
        'message' => 'Author not found'
      ], 404);
    }

    $authors->fill(
      $request->only(['name', 'gender', 'biography'])
    );
    $authors->save();

    return response()->json([
      'updated' => true,
      'data' => $authors
    ], 200);
  }

  public function destroy($id)
  {
    try {
      $authors = Author::findOrFail($id);
    } catch (ModelNotFoundException $exception) {
      return response()->json([
        'error' => [
          'message' => 'Author not found'
        ]
      ], 404);
    }

    $authors->delete();

    return response()->json([
      'deleted' => true
    ], 200);
  }



}

  