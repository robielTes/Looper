@extends('layouts.app')


@section('content')

    @foreach($exercisesAnswering as $exercise)
            <div class="grid grid-cols-3 shadow-lg bg-gray-200 bg-opacity-75 my-10 ">
                <div class="col-start-2 text-center py-3 text-gray-600 text-xl">{{$exercise->title}}</div>
                <div class="col-start-1 col-span-3 align-baseline">
                    <a href="/exercises/{{$exercise->id}}/fulfillments/new">
                        <button
                            class="purple w-full text-white text-sm font-medium py-2 px-4 rounded hover:bg-gray-500 ">
                                TAKE IT
                        </button>
                    </a>
                </div>
            </div>
    @endforeach

@endsection

