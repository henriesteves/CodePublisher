@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>New Category</h3>

            {{--
            @if($errors->any())
                <ul class="alert alert-danger list-inline">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            --}}

            {!! Form::open(['route' => 'category.store', 'class' => 'form']) !!}

                @include('category._form')

                {{-- 
                <div class="form-group">
                    {!! Form::submit('Add Category', ['class' => 'btn btn-primary']) !!}
                </div>
                --}}
                {!! Html::openFormGroup() !!}
                    {!! Button::primary('Add Category')->submit() !!}
                {!! Html::closeFormGroup() !!}

            {!! Form::close() !!}

        </div>
    </div>
@endsection