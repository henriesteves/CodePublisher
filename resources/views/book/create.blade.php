@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>New Book</h3>

            {!! Form::open(['route' => 'book.store', 'class' => 'form']) !!}

            @include('book._form')

            {{--
            <div class="form-group">
                {!! Form::submit('Add Book', ['class' => 'btn btn-primary']) !!}
            </div>
            --}}

            {!! Html::openFormGroup() !!}
                {!! Button::primary('Add Book')->submit() !!}
            {!! Html::closeFormGroup() !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection