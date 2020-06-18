@extends('layouts.app')

@section('content')
    <section class="hero is-fullheight-with-navbar">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    {{ env('APP_TITLE', 'Sample application') }}
                </h1>
                <br/>
                <h2 class="subtitle">
                   Useful spells for all occasions
                </h2>
            </div>
        </div>
    </section>
@endsection
