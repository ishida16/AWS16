<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('index') }}
        </h2>
    </x-slot>
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <div class='create'>
            <a href='/posts/create'>create</a>
        </div>
        <div class='posts'>
            @foreach ($posts as $post)
            <div class='post'>
                <!--　<h2 class='title'>Title</h2> -->
                <!-- <h2 class='title'>{ { $post->title }}</h2> -->
                <h2 class='title'>
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h2>
                <!-- <p class='body'>This is a sample body.</p> -->
                <p class='body'>{{ $post->body }}</p>
                <div class="category">
                    <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                </div>
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                </form>
            </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <p class='username'>
            ログイン：{{ Auth::user()->name }}
        </p>
        <script>
            function deletePost(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</x-app-layout>
</html>
