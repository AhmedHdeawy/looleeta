@extends('admin.master')

@section('title', 'Categories')

@section('breadcrumb')

<!-- Page BreadCrumb -->
<div class="row">
    <div class="col-xl-12">
        <h1 class="page-header">
            Categories
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li class="active">
                 Categories
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->


{{-- Fetch Data --}}

<div class="row">
    


    <div class="col-xs-12">
        <h2 class="">
            <span>All Categories</span>
            <span class="pull-right">
                <a href="{{ route('categories.create') }}" class="btn btn-danger">
                    <i class="fa fa-plus-circle"></i> Add       
                </a>
            </span>
        </h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="categories-table">
                <thead>
                    <tr>
                    <form class="form" action="{{ route('categories.search') }}" method="get" accept-charset="utf-8">
                        
                        <th>
                            <input type="text" name="name" value="{{ $data['name'] or '' }}" placeholder="name" class="form-control">
                        </th>
                        <th>
                            <select name="parent" class="form-control">
                                <option value="">Select category</option>
                                <?php 
                                    foreach ($categoriesSearch as $category) {
                                        echo '<option value='.$category->categories_id.'>'. $category->categories_name .'</option>';
                                    }
                                ?>
                            </select>   
                        </th>
                        <th>

                        </th>
                        <th>
                            <button type="submit" class="btn btn-sm btn-primary"> <i class="fa fa-search"></i> </button>
                            <button type="button" class="btn btn-sm btn-primary resetForm"> <i class="fa fa-eraser"></i> </button> 
                        </th>
                    </form>    
                    </tr>
                    <tr>
                        <th>Name</th>
                        <th>parent</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->categories_name }}</td>
                        <td>{{ $category->parent->categories_name or '' }}</td>
                        
                        <td>
                        	<a class="btn btn-success btn-sm" 
                                href="{{ route('categories.edit', $category->categories_id) }}">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>

                        	{!! Form::open(['route' => ['categories.destroy', $category->categories_id], 'method' => 'DELETE', 'class' => 'table-form']) !!}
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
	{{ $categories->links() }}
</div>
<!-- /.row -->


@endsection

