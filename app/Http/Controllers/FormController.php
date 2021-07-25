<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormValidation;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index(){
        return view('advanced_validation.index');
    }

    public function store(StoreFormValidation $request){
        $form = new Form();
        $form->name = $request->name;
        $form->email = $request->email;
        $form->save();
        return back()->with('message', 'Data Added Successfully');
    }
}
