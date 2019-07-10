@extends('layouts.app')

@section('title')
    <title>User -  {{ $user->first_name . " " . $user->last_name  }}</title>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-4">
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">Create User</div>
                <div class="card-body">

                    @include('users.form')

                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
    </div>

@endsection
