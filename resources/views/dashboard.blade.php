@extends('layouts.app')

@section('content')
<div class="w-full flex flex-col h-60p border-t-2 border-green-500">
    @foreach($users as $user)
        <div class="container mx-auto py-4 border-b border-gray-200">
            <a href="/users/{{ $user->id }}">
                <h1 class="text-gray-700 text-2xl">{{ $user->name }}</h1>
            </a>
        </div>
    @endforeach
</div>
@endsection