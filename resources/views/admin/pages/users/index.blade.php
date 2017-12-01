@extends('admin.master')

@section('title', 'Users')

@section('breadcrumb')

<!-- Page BreadCrumb -->
<div class="row">
    <div class="col-xl-12">
        <h1 class="page-header">
            Users
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li class="active">
                 Users
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->


{{-- Fetch Data --}}

<div class="row">
    


    <div class="col-xs-12">
        <h2>All Users</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="users-table">
                <thead>
                    <tr>
                    <form class="form" action="{{ route('users.search') }}" method="get" accept-charset="utf-8">
                        
                        <th>
                            <input type="text" name="name" value="{{ $data['name'] or '' }}" placeholder="User name" class="form-control">
                        </th>
                        <th>
                            <input type="text" name="email" value="{{ $data['email'] or '' }}" placeholder="User Email" class="form-control">
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
                        <th>Email</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><img class="tabls-img imgModal" src="{{ $user->image ? asset('images/users/'.$user->image) : asset('images/users/default.jpg') }}"></td>
                        <td>
                            @role('admin') 
                        	   
                               <a class="btn btn-success btn-sm" href="{{ route('users.edit', $user->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                            	{!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE', 'class' => 'table-form']) !!}
    							    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}
    							{!! Form::close('') !!}
                            @endrole

                        </td>
                    </tr>
                @endforeach
                   
                </tbody>
            </table>

        </div>
    </div>
</div>

<div class="row">
	{{ $users->links() }}
</div>
<!-- /.row -->


@endsection
