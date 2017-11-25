@extends('admin.master')

@section('title', 'Articles')

@section('breadcrumb')

<!-- Page BreadCrumb -->
<div class="row">
    <div class="col-xl-12">
        <h1 class="page-header">
            Articles
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li class="active">
                 Articles
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->


{{-- Fetch Data --}}

<div class="row">
    


    <div class="col-xs-12">
        <h2 class="">
            <span>All Articles</span>
            <span class="pull-right">
                <a href="{{ route('articles.create') }}" class="btn btn-danger">
                    <i class="fa fa-plus-circle"></i> Add       
                </a>
            </span>
        </h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="articles-table">
                <thead>
                    <tr>
                    <form class="form" action="{{ route('articles.search') }}" method="get" accept-charset="utf-8">
                        
                        <th>
                            <input type="text" name="title" value="{{ $data['title'] or '' }}" placeholder="title" class="form-control">
                        </th>
                        <th>
                            <input type="text" name="user" value="{{ $data['user'] or '' }}" placeholder="user" class="form-control">
                        </th>
                        <th>
                            <select name="category" class="form-control">
                                <option value="">select category</option>
                                <?php 
                                    foreach ($categoriesSearch as $category) {
                                        echo '<option value='.$category->categories_id.'>'. $category->categories_name .'</option>';
                                    }
                                ?>
                            </select>   
                        </th>
                        <th>
                            <button type="submit" class="btn btn-sm btn-primary"> <i class="fa fa-search"></i> </button>
                            <button type="button" class="btn btn-sm btn-primary resetForm"> <i class="fa fa-eraser"></i> </button> 
                        </th>
                    </form>    
                    </tr>
                    <tr>
                        <th>Title</th>
                        <th>User</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>
                            <a href="{{ route('articles.show', $article->articles_id) }}">
                                {{ $article->articles_title }}
                            </a>
                        </td>
                        <td>{{ $article->user->name }}</td>
                        <td>{{ $article->category->categories_name }}</td>
                        
                        
                        <td>
                        	<a class="btn btn-success btn-sm" 
                                href="{{ route('articles.edit', $article->articles_id) }}">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>

                        	{!! Form::open(['route' => ['articles.destroy', $article->articles_id], 'method' => 'DELETE', 'class' => 'table-form']) !!}
							    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm btn-delete']) !!}
							{!! Form::close('') !!}
                        </td>
                    </tr>
                @endforeach
                   
                </tbody>
            </table>

        </div>
    </div>
</div>

<div class="row">
	{{ $articles->links() }}
</div>
<!-- /.row -->


@endsection

