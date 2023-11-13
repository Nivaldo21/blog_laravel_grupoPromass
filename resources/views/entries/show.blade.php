@extends('layouts.app')

@section('content')
    <div class="h-auto items-center w-2/3 p-16 shadow-lg">
        <h1 class="text-5xl text-blue-500 font-semibold">{{ $entry->title }}</h1>
        <h2 class="text-lg text-blue-900">{{$entry->author}} - {{\Carbon\Carbon::parse($entry->publication_date)->format('l, M j, Y')}}</h2>
        <p class="my-10">{{ $entry->content }}</p>
        <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded-full" href="{{ url('/entries') }}">Volver al listado</a> 
    </div>
@endsection
