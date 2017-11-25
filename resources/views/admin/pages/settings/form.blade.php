
{!! Form::hidden('id', null) !!}

<div class="form-group {{ $errors->has('settings_name') ? 'has-danger' : '' }} ">
    <label>Name</label>
    {!! Form::text('settings_name', null, 
        ['class' => $errors->has('settings_name') ? 'form-control form-control-danger' : 'form-control']) 
    !!}
    @if ($errors->has('settings_name'))
        <div class="form-control-feedback">
            {{ $errors->first('settings_name') }}
        </div>
    @endif
</div>

<div class="form-group {{ $errors->has('settings_value') ? 'has-danger' : '' }} ">
    <label>Name</label>
    {!! Form::text('settings_value', null, 
        ['class' => $errors->has('settings_value') ? 'form-control form-control-danger' : 'form-control']) 
    !!}
    @if ($errors->has('settings_value'))
        <div class="form-control-feedback">
            {{ $errors->first('settings_value') }}
        </div>
    @endif
</div>





{!! Form::submit($btnName, ['class' => 'btn btn-primary']) !!}

