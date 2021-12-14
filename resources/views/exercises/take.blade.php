@extends('layouts.app')


@section('content')

    @foreach($exercises as $exercise)
        @if($exercise->state_id === 2)
            <div class="grid grid-cols-3 shadow-lg bg-gray-200 bg-opacity-75 my-10 ">
                <div class="col-start-2 text-center font-medium py-3 text-gray-600 text-xl">{{$exercise->title}}</div>
                <div class="col-start-1 col-span-3 align-baseline">
                    <form method="post" action="/exercises/{{$exercise->id}}/fulfillments/new">
                        <button
                            class="purple w-full text-white font-semibold py-2 px-4 rounded hover:bg-gray-500">
                            TAKE IT
                        </button>
                    </form>
                </div>
            </div>
        @endif
    @endforeach

@endsection

