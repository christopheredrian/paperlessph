<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>
<body>
<div id="app">
    <router-view></router-view>

    {{-- Available Because we have the new VueRouter on app.js --}}
    <router-link to="/home">Home</router-link>
    <router-link to="/about">About</router-link>

</div>
<script src="/js/app.js"></script>
</body>
</html>
