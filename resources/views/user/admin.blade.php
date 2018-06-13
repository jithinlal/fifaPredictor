@extends('layouts.admin.master')

@section('title')
    @parent
    User Controller
@endsection

@section('pageHeading')
    User Controller
@endsection

@section('pageSubHeading')
    Index 
@endsection

@section('breadcrumbLevelOne')
        <a href="/admin/test">
				User Controller
		</a>
@endsection

@section('content')

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