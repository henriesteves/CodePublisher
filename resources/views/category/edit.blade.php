@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Edit Category</h3>

            {!! Form::model($category, [
                'route' => 
                    ['category.update', 'id' => $category->id], 
                    'class' => 'form', 
                    'method' => 'PUT'
            ]) !!}

            @include('category._form')

            <div class="form-group">
                {!! Form::submit('Save Category', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection