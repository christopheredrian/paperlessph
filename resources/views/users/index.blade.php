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
                    <th>Last name</th>
                    <th>User name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Last log in</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->last_logged_in }}</td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                <a href="/users/{{ $user->id }}/edit">
                                    <button class="btn btn-sm btn-primary" type="button">
                                        Edit
                                    </button>
                                </a>

                                <a href="/users/{{ $user->is_disabled ? 'enable' : 'disable' }}/{{ $user->id }}">
                                    <button class="btn btn-sm btn-{{ $user->is_disabled ? 'success' : 'danger' }}" type="button">
                                        {{  $user->is_disabled ? 'Enable' : 'Disable' }}
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>


@endsection

