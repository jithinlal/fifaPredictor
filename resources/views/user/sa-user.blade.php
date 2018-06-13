@extends('layouts.admin.master')

@section('title')
    @parent
    User Controller
@endsection

@section('pageHeading')
    SA
@endsection

@section('pageSubHeading')
    Users
@endsection

@section('breadcrumbLevelOne')
        <a href="/admin/admin">
				User Controller
		</a>
@endsection

@section('content')
<div class="pull-right">
    <a class="btn btn-primary" href="/admin/make-sa-user"> Generate SA USERS</a>
</div>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>  
            @endforeach         
        </tbody>
    </table>

    {{ $users->links() }}

@endsection