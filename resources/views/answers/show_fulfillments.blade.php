@extends('layouts.app')

@section('content')
    <h2 class="text-5xl pb-4">{{$fulfillment}}</h2>
    @foreach($answers->fulfillment() as $answer)
        <div>
            <p>{{$answer->label}}</p>
            <p>{{$answer->answer}}</p>
        </div>
    @endforeach

@endsection

