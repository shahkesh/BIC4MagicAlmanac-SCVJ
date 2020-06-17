@extends('layouts.app')

@section('content')
    <section class="section is-fullheight">
        <example-component title="Welcome to the world of magic!">
            @if (session('status'))
                <query-message :success="true" :fail="false" message="{{ session('status') }}"></query-message>
            @endif
            <p>Welcome, <strong>{{ auth()->user()->name }}</strong>...</p>
        </example-component>
    </section>
@endsection
