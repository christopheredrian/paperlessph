@extends('layouts.app')

@section('title')
    <title>Post Tempaltes</title>
@endsection

@section('content')

    <div class="card">

        <div class="card-header">
            Post Templates
        </div>

        <div class="card-body p-5">

            <a href="/post-templates/create" class="btn btn-success pull-right mb-3"> Create </a>

            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Template Name</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($templates as $template)
                    <tr>
                        <td>{{ $template->id }}</td>
                        <td>{{ $template->template_name }}</td>
                        <td>{{ $template->created_at }}</td>
                        <td><a href="/post-templates/edit{{$template->id}}" class="btn btn-warning">Edit</a></td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>


@endsection

