@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Edit Book</h3>

            {{--
            @if($errors->any())
                <ul class="alert alert-danger list-inline">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            --}}

            {!! Form::model($book, [
                'route' => 
                    ['book.update', 'id' => $book->id], 
                    'class' => 'form', 
                    'method' => 'PUT'
            ]) !!}

            @include('book._form')

            <div class="form-group">
                {!! Form::submit('Save Book', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection