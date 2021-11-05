@extends('layouts.app')


@section('content')

    <div class="flex px-12 sm:px-24 md:px-40 {{$color}}">
        <div>
            <a href="\">
                <img class="w-14" src="/assets/logo.png"/>
            </a>
        </div>
        <div class="py-4">
            <p class="pl-8 text-white text-xl" href="\">{{$title}}</p>
        </div>
    </div>
    <div class="px-12 sm:px-24 md:px-40">

        @yield('exercises')

    </div>

@endsection