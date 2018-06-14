@extends('layouts.admin.master')

@section('title')
    @parent
    User Controller
@endsection

@section('pageHeading')
    All Users
@endsection

@section('pageSubHeading')
    List 
@endsection

@section('breadcrumbLevelOne')
        <a href="/admin/user">
				All Users
		</a>
@endsection

@section('content')

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">SA USER</th>
                <th scope="col">UserId</th>
            </tr>
        </thead>
        <tbody>
            @if($count > 0)
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ empty($user->sa_user) ? 'No' : 'Yes' }}</td>
                        <td>{{ $user->id }}</td>
                    </tr>  
                @endforeach
            @else
                <td> No Records Found </td>
            @endif
        </tbody>
    </table>

    {{ $users->links() }}

@endsection