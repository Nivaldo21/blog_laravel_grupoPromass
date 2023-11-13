@extends('layouts.app')

@section('content')

@if(Session::has('success') || Session::has('info'))
    <div id="alertContainer" class="fixed max-w-xs bg-white rounded-xl shadow-lg bottom-10 right-4
        @if(Session::has('success'))
            border border-green-200
        @elseif(Session::has('info'))
            border border-yellow-200
        @endif
    " role="alert">
        <div class="flex p-4">
            <div class="flex-shrink-0">
                @if(Session::has('success'))
                <svg class="flex-shrink-0 h-4 w-4 text-teal-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
                @endif  
                @if(Session::has('info'))
                <svg class="flex-shrink-0 h-4 w-4 text-yellow-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>
                @endif
            </div>
            <div class="ms-3">
            <p class="text-sm font-bold text-gray-700">
            {{ Session::get('success') ? Session::get('success') : Session::get('info') }}
            </p>
            </div>
        </div>
    </div>
@endif


<div class="h-screen items-center">
    <div class="flex justify-between gap-20 m-10">
        <h1 class="text-5xl font-semibold">Blog Grupo Promass</h1>
        <a href="{{ url('/entries/create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold pt-3 px-4 rounded-full">Nuevo Post</a>
    </div>
    @if (count($entries) > 0)
        <div class="max-w-2xl mx-auto my-10">
            <form action="{{ url('/entries/search') }}" method="get">
                <label for="default-search" class="mb-2 text-sm font-medium text-white sr-only">Search</label>
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>  
                    <input type="text" id="default-search" name="search" class="focus:outline-none block p-4 pl-10 w-full text-sm text-dark rounded-lg border border-blue-700" placeholder="Busca Titulo, Autor..." required>
                    <button type="submit" class=" text-white absolute right-2.5 bottom-2.5 bg-blue-700 font-medium rounded-lg text-sm px-4 py-2 ">Buscar</button>
                </div>
            </form>
        </div>
        <div class="grid grid-cols-2 gap-4">
            @foreach ($entries as $entry)   
            <a href="{{ url('/entries', $entry->id) }}" class="hover: max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-16">
                <div class="flex justify-center md:justify-end -mt-16">
                    <img class="w-20 h-20 object-cover rounded-full border-2 border-blue-500" src="https://static.vecteezy.com/system/resources/thumbnails/009/292/244/small/default-avatar-icon-of-social-media-user-vector.jpg">
                </div>
                <div>
                    <h2 class="text-gray-800 text-3xl font-semibold">
                        {{ $entry->title }}
                        <p class="font-normal text-sm text-blue-500"> {{\Carbon\Carbon::parse($entry->publication_date)->format('l, M j, Y')}} </p>
                    </h2>
                    <p class="mt-2 text-gray-600">{{ Str::limit($entry->content, 70, '...') }}</p>
                </div>
                <div class="flex justify-end mt-4">
                    <p class="text-lg font-medium text-blue-500">By: {{$entry->author}} </p>
                </div>
            </a>
            @endforeach
        </div>
    @else
    <div class="flex bg-blue-100 rounded-lg p-4 mb-4 text-sm text-blue-700" role="alert">
        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div>
            <span class="font-semibold">No se encontrarón Post.</span> Puedes agregar un post dando en el botón "Nuevo Post".
        </div>
    </div>
    @endif
</div>
@endsection
