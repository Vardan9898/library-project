<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookIndexRequest;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class BooksController extends Controller
{
    /**
     * @param  BookIndexRequest  $request
     * @return false|string
     */
    public function index(BookIndexRequest $request)
    {
        $books = Book::with('authors', 'publishers')
            ->skip($request->start ?? 0)
            ->take($request->length ?? 10)
            ->get();

        $data = $books->map(function ($book) {
            return [
                'id'             => $book->id,
                'author_name'    => $book->authors->pluck('name')->flatten()->implode(', '),
                'name'           => $book->name,
                'publisher_name' => $book->publishers->pluck('name')->flatten()->implode(', '),
            ];
        });

        $response = [
            'draw'                 => intval($request->draw ?? 1),
            'iTotalDisplayRecords' => Book::count(),
            'data'                 => $data,
        ];

        return json_encode($response);
    }

    /**
     * @param  BookStoreRequest  $request
     * @return false|string
     */
    public function store(BookStoreRequest $request)
    {
        $book = Book::create([
            'name' => $request->name,
        ]);

        $book->publishers()->attach($request->publishers);
        $book->authors()->attach($request->authors);

        return json_encode($book);
    }

    /**
     * @param  BookUpdateRequest  $request
     * @param  Book  $book
     * @return false|string
     */
    public function update(BookUpdateRequest $request, Book $book)
    {
        $book->update([
            'name' => $request->name,
        ]);

        $book->publishers()->sync($request->publishers);
        $book->publishers()->sync($request->authors);

        return json_encode($book);
    }

    /**
     * @param  Book  $book
     * @return Application|ResponseFactory|Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return response(['message' => 'Book successfully deleted!']);
    }
}
