@extends('layouts.layout')

@section('site-content-layout')

    <div class="col2-left">

        <aside class="col-sidebar">
            @yield('site-sidebar')
        </aside>

        <div class="col-main">
            @yield('site-content')
        </div>

    </div>

@endsection