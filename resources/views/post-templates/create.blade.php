@extends('layouts.app')

@section('title')
    <title>Create new Post Template</title>
@endsection

@section('content')

    <div id="app">
        {{-- Load the template--}}
      <create-edit-post-template></create-edit-post-template>
    </div>

@endsection
