<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if($user->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized Access!', 'book' => $user], 403);
        }
        
        $request->validate([
            'judul' => 'required|string|max:255',
            'isbn' => 'required|string|max:255|unique:books',
            'penulis' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
        ]);

         // Create a new book
         $book = Book::create([
            'judul' => $request->judul,
            'isbn' => $request->isbn,
            'penulis' => $request->penulis,
            'tahun_terbit' => $request->tahun_terbit,
        ]);

        return response()->json(['message' => 'Book created successfully', 'book' => $book], 201);
    }

    public function update(Request $request, Book $book)
    {
        $user = Auth::user();
        if($user->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized Access!', 'book' => $user], 403);
        }
        $request->validate([
            'judul' => 'sometimes|required|string|max:255',
            'isbn' => 'sometimes|required|string|max:255|unique:books,isbn,' . $book->id,
            'penulis' => 'sometimes|required|string|max:255',
            'tahun_terbit' => 'sometimes|required|integer',
        ]);

        $book->update($request->all());

        return response()->json(['message' => 'Book updated successfully', 'book' => $book]);
    }

    public function destroy(Book $book)
    {
        $user = Auth::user();
        if($user->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized Access!', 'book' => $user], 403);
        }
        
        $book->delete();

        return response()->json(['message' => 'Book deleted successfully']);
    }
}