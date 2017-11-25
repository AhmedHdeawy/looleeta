@extends('admin.master')

@section('title', 'Settings')

@section('breadcrumb')

<!-- Page BreadCrumb -->
<div class="row">
    <div class="col-xl-12">
        <h1 class="page-header">
            Settings
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li class="active">
                 Settings
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->


{{-- Fetch Data --}}

<div class="row">
    


    <div class="col-xs-12">
        <h2 class="">
            <span>All Settings</span>
            
        </h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="settings-table">
                <thead>
                    
                    <tr>
                        <th>Name</th>
                        <th>value</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($settings as $setting)
                    <tr>
                        <td>{{ $setting->settings_name }}</td>
                        <td>{{ $setting->settings_value }}</td>
                        
                        <td>
                        	<a class="btn btn-success btn-sm" 
                                href="{{ route('settings.edit', $setting->settings_id) }}">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>

                        </td>
                    </tr>
                @endforeach
                   
                </tbody>
            </table>

        </div>
    </div>
</div>

<div class="row">
	{{ $settings->links() }}
</div>
<!-- /.row -->


@endsection

