<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;
use Illuminate\Support\Facades\Session;


class EntryController extends Controller
{
    public function index(){
        $entries = Entry::all();
        return view('entries.index', compact('entries'));
    }
    
    public function create(){
        return view('entries.create');
    }
    
    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'publication_date' => 'required|date',
            'content' => 'required',
        ]);
        
        Entry::create($validatedData);
        Session::flash('success', 'Post guardado correctamente.');
        return redirect('/entries');

    }
    
    public function show(Entry $entry){
        return view('entries.show', compact('entry'));
    }
    
    public function search(Request $request){
        $query = $request->input('search');
        $entries = Entry::where('title', 'like', "%$query%")
            ->orWhere('author', 'like', "%$query%")
            ->orWhere('content', 'like', "%$query%")
            ->get();
        if (count($entries) == 0) {
            $entries = Entry::all();
            Session::flash('info','No se encontraron coincidencias.');
        }
    
        return view('entries.index', compact('entries'));
    }

}
