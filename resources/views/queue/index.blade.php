@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-6 offset-3 mt-5">
            @if(Session::has('message'))
                <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
            <a href="{{ route('send_mail') }}">Send Mail</a>
        </div>
    </div>
@endsection

