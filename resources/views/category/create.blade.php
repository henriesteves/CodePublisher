@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>New Category</h3>

            {!! Form::open(['route' => 'category.store', 'class' => 'form']) !!}

            @include('category._form')

            <div class="form-group">
                {!! Form::submit('Add Category', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection