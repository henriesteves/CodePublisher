@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            {!! Form::open(['method' => 'delete', 'route' => ['book.destroy', $book->id]]) !!}
                {!! Form::hidden('redirect_to', URL::previous()) !!}

                <div class="alert alert-danger">
                    <strong>Warning!</strong> You are about to delete a book. This action cannot be undone. Are you sure you want to continue?
                </div>

                {!! Form::submit('Yes, delete it!', ['class' => 'btn btn-danger']) !!}

                <a href="{{ url()->previous() }}" class="btn btn-success">
                    <strong>Cancel</strong>
                </a>
            {!! Form::close() !!}

        </div>
    </div>
@endsection