
{!! Form::hidden('id', null) !!}

<div class="form-group {{ $errors->has('ads_link') ? 'has-danger' : '' }} ">
    <label>Name</label>
    {!! Form::text('ads_link', null, 
        ['class' => $errors->has('ads_link') ? 'form-control form-control-danger' : 'form-control']) 
    !!}
    @if ($errors->has('ads_link'))
        <div class="form-control-feedback">
            {{ $errors->first('ads_link') }}
        </div>
    @endif
</div>


<div class="form-group {{ $errors->has('ads_type') ? 'has-danger' : '' }} ">
    <label>Position</label>
    {!! Form::select('ads_type', ['lat' =>  'Latitiude', 'lang' =>  'Longtitude'], null, 
        ['class' => $errors->has('ads_type') ? 'form-control form-control-danger' : 'form-control', ]) 
    !!}
    @if ($errors->has('ads_type'))
        <div class="form-control-feedback">
            {{ $errors->first('ads_type') }}
        </div>
    @endif
</div>

<div class="form-group {{ $errors->has('ads_img') ? 'has-danger' : '' }}">
    <label>Image</label>
    {!! Form::file('ads_img', 
        ['class' => $errors->has('ads_img') ? 'form-control form-control-file' : 'form-control', 'id' => 'adsImg' ]) 
    !!}
    @if ($errors->has('ads_img'))
        <div class="form-control-feedback">
            {{ $errors->first('ads_img') }}
        </div>
    @endif
</div>




{!! Form::submit($btnName, ['class' => 'btn btn-primary']) !!}

