@extends('layouts.app')


@section('content')


    <h2>Post Templates</h2>

    {{--<div id="app">--}}
    {{--<post-templates-create></post-templates-create>--}}

    {{--</div>--}}


    <div class="card mt-3">
        <div class="card-header">
            Head
        </div>
        <div class="card-body">
            <a href="/post-templates/create" class="btn btn-success mb-2 pull-right">Create</a>
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Creted At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach($post_templates as $post_template)
                        <td>{{ $post_template->id }}</td>
                        <td>{{ $post_template->template_name  }}</td>
                        <td>{{ $post_template->created_at }}</td>
                        <td><a href="/post-templates/show/{{$post_template->id}}" class="btn btn-primary">View</a></td>
                    @endforeach
                </tr>
                </tbody>
            </table>
        </div>

    </div>

@endsection