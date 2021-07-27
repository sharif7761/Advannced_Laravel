@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-6 offset-3 mt-5">
        <h3> {{ __('headlines.title') }}</h3>
        <h4>{{ __('headlines.contact') }}</h4>
        <a href="{{ route('locale') }}">Show English</a>
        <a href="{{ route('locale', 'bn' ) }}">বাংলা দেখান</a>
    </div>
</div>

@endsection

