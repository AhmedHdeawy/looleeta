
{!! Form::hidden('id', null) !!}

<div class="form-group {{ $errors->has('roles') ? 'has-danger' : '' }} col-md-12">
    <label class="col-md-12">Role</label>
    <div class="col-md-6">
        {!! Form::select('roles', $roles, null, 
            ['class' => $errors->has('roles') ? 'form-control form-control-danger' : 'form-control', ]) 
        !!}
        @if ($errors->has('roles'))
            <div class="form-control-feedback">
                {{ $errors->first('roles') }}
            </div>
        @endif
    </div>
</div>



{!! Form::submit($btnName, ['class' => 'btn btn-primary']) !!}

