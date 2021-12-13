@extends('layouts.app')

@section('content')
    <h2 class="text-5xl pb-4 text-gray-500">{{$fulfillment}} UTC</h2>
    @foreach($answers->fulfillment() as $answer)
        <div>
            <p class="text-gray-500 font-semibold">{{$answer->label}}</p>
            <p class="text-gray-500 p-8">{{$answer->answer}}</p>
        </div>
    @endforeach

@endsection

