@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-6 offset-3 mt-5">
            @if($errors)
                @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
            @endif
            @if(Session::has('message'))
                <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
            <form action="{{ route('form_validation') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Enter Name">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection

