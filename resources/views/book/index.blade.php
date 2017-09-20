@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Books</h3>

            {{--
            <a href="{{ route('book.create') }}" class="btn btn-primary">New Book</a>
            --}}

            {!! Button::primary('New Book')->asLinkTo(route('book.create')) !!}
        </div>
        
        <div class="row">

            {{--
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->subtitle }}</td>
                        <td>{{ $book->price }}</td>
                        <td>
                            <a href="{{ route('book.edit', ['id' => $book->id]) }}">Edit</a> | 
                            <a href="{{ route('book.confirm', ['id' => $book->id]) }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            --}}

            {!!
                Table::withContents($books->items())->striped()
                ->callback('Actions', function($field, $book) {
                    return (
                        "<a href=\"" . route('book.edit', ['id' => $book->id]) . "\">Edit</a> |
                        <a href=\"" . route('book.confirm', ['id' => $book->id]) . "\">Delete</a>"
                        );
                })
            !!}

            {{ $books->links() }}

        </div>
    </div>
@endsection