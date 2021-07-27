@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-6 offset-3 mt-5">
        <h3> {{ __('headlines.title') }}</h3>
{{--        or use lang tag--}}
        <h4>@lang('headlines.contact')</h4>
{{--        send variable--}}
        <h4>@lang('headlines.username', ['name' => 'Sharif Ahmed'])</h4>
{{--        if item is plural write 'items', if no item write 'no item'--}}
        <h4>{{ trans_choice('headlines.item', 1) }}</h4>
        <h4>{{ trans_choice('headlines.item', 2) }}</h4>
        <h4>{{ trans_choice('headlines.item', 0) }}</h4>


        <a href="{{ route('locale') }}">Show English</a>
        <a href="{{ route('locale', 'bn' ) }}">বাংলা দেখান</a>
    </div>
</div>

@endsection

