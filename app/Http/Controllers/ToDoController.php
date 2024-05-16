<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function index()
    {
        $to_dos = ToDo::all();

        return view('to_dos.index', compact('to_dos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        ToDo::create([
            'description' => $request->name,
            'completed' => false,
        ]);

        return redirect()->route('to_dos.index');
    }

    public function destroy(ToDo $to_dos)
    {
        $to_dos->delete();

        return redirect()->route('to_dos.index');
    }

    public function toggleCompleted(ToDo $to_do)
    {
        $to_do->update(['completed' => !$to_do->completed]);
        $to_dos = ToDo::all();
        return view('to_dos.index', compact('to_dos'));
    }

    public function deleteCompleted()
    {
        ToDo::where('completed', true)->delete();
        $to_dos = ToDo::all();
        return view('to_dos.index', compact('to_dos'));
    }
    
    public function destroyAll()
    {
        ToDo::truncate();
        $to_dos = ToDo::all();
        return view('to_dos.index', compact('to_dos'));
    }
    
}
