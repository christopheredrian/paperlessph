@extends('layouts.app')

@section('title')
    <title>Post Tempalates</title>
@endsection

@section('content')

    <div class="card">

        <div class="card-header">
            Users
        </div>

        <div class="card-body p-5">

            <a href="/users/create" class="btn btn-success pull-right mb-3"> Create </a>

            <table class="table">
                <thead>
                <tr>
                    <th>First name</th>
                    <th>Surname</th>
                    <th>User name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->surname }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>****</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>


@endsection

