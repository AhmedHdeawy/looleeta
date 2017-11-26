@extends('admin.master')

@section('title', 'Ads')

@section('breadcrumb')

<!-- Page BreadCrumb -->
<div class="row">
    <div class="col-xl-12">
        <h1 class="page-header">
            Ads
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li class="active">
                 Ads
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->


{{-- Fetch Data --}}

<div class="row">
    


    <div class="col-xs-12">
        <h2 class="">
            <span>All Ads</span>
            <span class="pull-right">
                <a href="{{ route('ads.create') }}" class="btn btn-danger">
                    <i class="fa fa-plus-circle"></i> Add       
                </a>
            </span>
        </h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="ads-table">
                <thead>
                   
                    <tr>
                        <th>Name</th>
                        <th>image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($ads as $ad)

                    <tr>
                        <td>{{ $ad->ads_link }}</td>
                        <td><img src="{{ asset('images/adverts/icWNB1511723631.png') }}" class="tabls-img"></td>
                        
                        <td>
                        	<a class="btn btn-success btn-sm" 
                                href="{{ route('ads.edit', $ad->ads_id) }}">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>

                        	{!! Form::open(['route' => ['ads.destroy', $ad->ads_id], 'method' => 'DELETE', 'class' => 'table-form']) !!}
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
	{{ $ads->links() }}
</div>
<!-- /.row -->


@endsection

