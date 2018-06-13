@extends('layouts.admin.master')

@section('title')
    @parent
    SA Users
@endsection

@section('pageHeading')
    List
@endsection

@section('pageSubHeading')
    Users
@endsection

@section('breadcrumbLevelOne')
        <a href="/admin/user-sa-user">
				SA Users
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
                <th scope="col">UserId</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->id }}</td>
                </tr>  
            @endforeach         
        </tbody>
    </table>

    {{ $users->links() }}

@endsection