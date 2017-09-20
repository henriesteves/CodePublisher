{!! Form::hidden('redirect_to', URL::previous()) !!}

{{-- <div class="form-group {{ $errors->first('name') ? ' has-error' : '' }}"> --}}
{!! Html::openFormGroup('name', $errors) !!}
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    {{-- $errors->first('name') --}}

    {{--
    <span class="help-block">
        <strong>{{ $errors->first('name') }}</strong>
    </span>
    --}}

    {!! Form::error('name', $errors) !!}
{!! Html::closeFormGroup() !!}
{{-- </div> --}}