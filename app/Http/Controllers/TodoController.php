<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::all();
        return view('ajax_todo.index', compact('todos'));
    }

    public function create(Request $request){
        $todo = new Todo();
        $todo->item = $request->inputValue;
        $todo->save();
        return 'done';
    }

    public function delete(Request $request){
        $todo = Todo::findOrFail($request->id);
        $todo->delete();
        return 'done';
    }

    public function update(Request $request){
        $todo = Todo::findOrFail($request->id);
        $todo->item = $request->inputValue;
        $todo->save();
        return 'done';
    }
}
