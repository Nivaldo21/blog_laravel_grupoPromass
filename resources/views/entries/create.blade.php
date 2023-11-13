@extends('layouts.app')

@section('content')
    <div class="h-auto items-center w-1/2 shadow-lg p-16">
        <h1 class="text-4xl font-semibold">Nuevo Post</h1>
        <form class="mt-6" method="post" action="{{ url('/entries') }}">
            @csrf
            <label for="title" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Título</label>
            <input id="title" type="text" name="title" class="block w-full rounded-lg p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required />
            
            <label for="author" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Autor</label>
            <input id="author" type="text" name="author"class="block rounded-lg w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required />
            
            <label for="publication_date">Fecha de Publicación:</label>
            <input type="date" name="publication_date"  class="block rounded-lg w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"  required>

            <label for="content" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Contenido</label>
            <textarea id="content" name="content"  class="block rounded-lg w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required></textarea>
            
            <button type="submit" class="font-bold w-full py-3 mt-6 rounded-full tracking-widest text-white uppercase bg-blue-500 shadow-lg focus:outline-none hover:bg-blue-600 hover:shadow-none">
                Guardar Post
            </button>
        </form>
    </div>
@endsection
