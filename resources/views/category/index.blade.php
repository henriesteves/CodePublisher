@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Categories</h3>
            
            {{--
            <a href="{{ route('category.create') }}" class="btn btn-primary">New Category</a>
            --}}
            {!! Button::primary('New Category')->asLinkTo(route('category.create')) !!}
        </div>
        
        <div class="row">

            {{--
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('category.edit', ['id' => $category->id]) }}">Edit</a> | 
                            <a href="{{ route('category.confirm', ['id' => $category->id]) }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            --}}

            {!!
                Table::withContents($categories->items())->striped()
                ->callback('Actions', function($field, $category) {
                    return (
                        "<a href=\"" . route('category.edit', ['id' => $category->id]) . "\">Edit</a> |
                        <a href=\"" . route('category.confirm', ['id' => $category->id]) . "\">Delete</a>"
                        );
                })
            !!}

            {{ $categories->links() }}

        </div>
    </div>
@endsection