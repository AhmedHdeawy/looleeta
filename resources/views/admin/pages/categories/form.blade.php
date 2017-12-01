
{!! Form::hidden('categories_id', null) !!}

<div class="form-group {{ $errors->has('categories_name') ? 'has-danger' : '' }} ">
    <label>Name</label>
    {!! Form::text('categories_name', null, 
        ['class' => $errors->has('categories_name') ? 'form-control form-control-danger' : 'form-control']) 
    !!}
    @if ($errors->has('categories_name'))
        <div class="form-control-feedback">
            {{ $errors->first('categories_name') }}
        </div>
    @endif
</div>


<div class="form-group {{ $errors->has('parents_id') ? 'has-danger' : '' }} ">
    <label>Parent</label>
    {!! Form::select('parents_id', $parents, null, 
        ['class' => $errors->has('parents_id') ? 'form-control form-control-danger' : 'form-control', ]) 
    !!}
    @if ($errors->has('parents_id'))
        <div class="form-control-feedback">
            {{ $errors->first('parents_id') }}
        </div>
    @endif
</div>




{!! Form::submit($btnName, ['class' => 'btn btn-primary']) !!}

