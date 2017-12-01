{!! Form::hidden('users_id', auth()->user()->id) !!}


<div class="form-group {{ $errors->has('categories_id') ? 'has-danger' : '' }} col-md-12">
    <label class="col-md-12">Category</label>
    <div class="col-md-8">
        {!! Form::select('categories_id', $categoriesBluck, null, 
            ['class' => $errors->has('categories_id') ? 'form-control is-invalid' : 'form-control', ]) 
        !!}
        
        @if ($errors->has('categories_id'))
            <div class="invalid-feedback">
              {{ $errors->first('categories_id') }}
            </div>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('articles_title') ? 'has-danger' : '' }} col-md-12">
    <label class="col-md-12">Title</label>
    <div class="col-md-8">
        
        {!! Form::text('articles_title', null, 
            ['class' => $errors->has('articles_title') ? 'form-control is-invalid' : 'form-control']) 
        !!}
        @if ($errors->has('articles_title'))
            <div class="invalid-feedback">
              {{ $errors->first('articles_title') }}
            </div>
        @endif
    </div>
</div>


<div class="form-group {{ $errors->has('articles_desc') ? 'has-danger' : '' }} col-md-12">
    <label class="col-md-12">Content</label>
    <div class="col-md-10">
      
      {!! Form::textarea('articles_desc', null, 
          ['class' => $errors->has('articles_title') ? 'form-control text-tinymce is-invalid' : 'form-control text-tinymce' ]) 
      !!}
      @if ($errors->has('articles_desc'))
          <div class="invalid-feedback">
            {{ $errors->first('articles_desc') }}
          </div>
      @endif
    </div>
</div>

<div class="form-group {{ $errors->has('articles_img') ? 'has-danger' : '' }} col-md-12">
    <label class="col-md-12">Image</label>
    <div class="col-md-8">
      
      {!! Form::file('articles_img', 
          ['class' => $errors->has('articles_img') ? 'form-control is-invalid' : 'form-control', 'id'  =>  'artImg'  ]) 
      !!}
      @if ($errors->has('articles_img'))
          <div class="invalid-feedback">
            {{ $errors->first('articles_img') }}
          </div>
      @endif

    </div>
</div>

<div class="col-md-8">
  
{!! Form::submit($btnName, ['class' => 'btn btn-primary']) !!}
</div>
