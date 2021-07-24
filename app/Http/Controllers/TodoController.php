<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){
        return view('ajax_todo.index');
    }

    public function create(Request $request){
        $todo = new Todo();
        $todo->item = $request->inputValue;
        $todo->save();
        return 'done';
    }
}
