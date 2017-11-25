{!! Form::hidden('users_id', auth()->user()->id) !!}

<div class="form-group {{ $errors->has('categories_id') ? 'has-danger' : '' }} col-md-12">
    <label class="col-md-12">Category</label>
    <div class="col-md-6">
        {!! Form::select('categories_id', $categories, null, 
            ['class' => $errors->has('categories_id') ? 'form-control form-control-danger' : 'form-control', ]) 
        !!}
        @if ($errors->has('categories_id'))
            <div class="form-control-feedback">
                {{ $errors->first('categories_id') }}
            </div>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('articles_title') ? 'has-danger' : '' }} col-md-12">
    <label class="col-md-12">Title</label>
    <div class="col-md-6">
        
        {!! Form::text('articles_title', null, 
            ['class' => $errors->has('articles_title') ? 'form-control form-control-danger' : 'form-control']) 
        !!}
        @if ($errors->has('articles_title'))
            <div class="form-control-feedback">
                {{ $errors->first('articles_title') }}
            </div>
        @endif
    </div>
</div>


<div class="form-group {{ $errors->has('articles_desc') ? 'has-danger' : '' }} col-md-12">
    <label>Description</label>
    {!! Form::textarea('articles_desc', null, 
        ['class' => 'form-control text-tinymce col-md-6']) 
    !!}
    @if ($errors->has('articles_desc'))
        <div class="form-control-feedback">
            {{ $errors->first('articles_desc') }}
        </div>
    @endif
</div>

<div class="form-group {{ $errors->has('articles_img') ? 'has-danger' : '' }} col-md-12">
    <label>Image</label>
    {!! Form::file('articles_img', null, 
        ['class' => $errors->has('articles_img') ? 'form-control form-control-file' : 'form-control',  ]) 
    !!}
    @if ($errors->has('articles_img'))
        <div class="form-control-feedback">
            {{ $errors->first('articles_img') }}
        </div>
    @endif
</div>



{!! Form::submit($btnName, ['class' => 'btn btn-primary']) !!}

