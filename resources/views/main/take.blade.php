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

        @foreach($exercises as $exercise)
            <div class="grid grid-cols-3 shadow-lg bg-gray-200 bg-opacity-75">
                <div class="col-start-2 text-center py-3">{{$exercise->title}}</div>
                <div class="col-start-2 align-baseline">
                    <button class="bg-purple-500 w-full text-white font-bold py-2 px-4 rounded">Button</button>

                </div>
            </div>
        @endforeach

    </div>

@endsection