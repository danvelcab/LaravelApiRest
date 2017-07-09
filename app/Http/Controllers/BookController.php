<?php

namespace App\Http\Controllers;

use App\Http\Requests\Books\CreateBookFormRequest;
use App\Http\Requests\Books\EditionBookFormRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(10);

        if (!$books) {
            throw new HttpException(400, "Invalid data");
        }

        return response()->json(
            $books,
            200
        );
    }

    public function show($id)
    {
        if (!$id) {
           throw new HttpException(400, "Invalid id");
        }

        $book = Book::find($id);

        return response()->json([
            $book,
        ], 200);

    }

    public function store(CreateBookFormRequest $request)
    {
        $book = new Book;
        $book->title = $request->input('title');
        $book->price = $request->input('price');
        $book->author = $request->input('author');
        $book->editor = $request->input('editor');

        if ($book->save()) {
            return $book;
        }

        throw new HttpException(400, "Invalid data");
    }

    public function update(EditionBookFormRequest $request, $id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        $book = Book::find($id);
        $book->title = $request->input('title');
        $book->price = $request->input('price');
        $book->author = $request->input('author');
        $book->editor = $request->input('editor');

        if ($book->save()) {
            return $book;
        }

        throw new HttpException(400, "Invalid data");
    }

    public function destroy($id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        $book = Book::find($id);
        $book->delete();

        return response()->json([
            'message' => 'book deleted',
        ], 200);
    }
}
