<?php

namespace CodePublisher\Http\Controllers;

use CodePublisher\Book;
use CodePublisher\Http\Requests\BookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private $book;

    public function __construct(Book $book) 
    {
        $this->book = $book;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->book->paginate(15);

        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $data = $request->only('user_id', 'title', 'subtitle', 'price');

        $data['user_id'] = auth()->user()->id;

        //dd($data);

        $this->book->create($data);

        $url = $request->get('redirect_to', route('book.index'));

        $request->session()->flash('message', 'The book was updated');

        //return redirect()->route('book.index');
        return redirect()->to($url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = $this->book->findOrFail($id);

        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        $book = $this->book->findOrFail($id);
        $data = $request->only('title', 'subtitle', 'price');
        $book->fill($data);
        $book->save();

        $url = $request->get('redirect_to', route('book.index'));

        $request->session()->flash('message', 'The book was updated');

        //return redirect()->route('book.index');
        return redirect()->to($url);
    }

    public function confirm($id)
    {
        $book = $this->book->findOrFail($id);

        return view('book.confirm', compact('book'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $book = $this->book->findOrFail($id);

        $book->delete();

        $request->session()->flash('message', 'The book was deleted');

        $url = $request->redirect_to;

        //return redirect()->route('book.index');
        return redirect()->to($url);
    }
}
