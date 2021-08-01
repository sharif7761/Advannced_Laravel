@extends('layouts.app')

@section('content')
    <div class="container antialiased text-center">
        <h1>
            <a href="{{ route('ajax_todo') }}">Ajax Todo</a>
        </h1>
        <h1>
            <a href="{{ route('form_validation') }}">Form validation with custom message</a>
        </h1>
        <h1>
            <a href="{{ route('recaptcha') }}">Recaptcha</a>
        </h1>
        <h1>
            <a href="{{ route('locale') }}">Multi language</a>
        </h1>
        <h1>
            <a href="{{ route('queue') }}">Queue</a>
        </h1>
        <h1>
            <a href="{{ route('notification') }}">Send Notification Mail</a>
        </h1>
    </div>

@endsection
