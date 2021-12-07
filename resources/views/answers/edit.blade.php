@extends('layouts.app')

@section('content')

    <div class="flex-1 px-2">
        <div class="pb-8 text-gray-600 ">
            <h1 class="text-5xl pb-4">Your take</h1>
            <p>Bookmark this page, it's yours. You'll be able to come back later to finish.</p>
        </div>
        <form method="post" action="/exercises/{{$exercise->id}}/fulfillments/update">
            @if($exercise !== null)
                @foreach($exercise->fields() as $field)
                    <label class="text-gray-700 text-xl">{{$field->label}}</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           type="text" name="{{$ids[$field->id-1]}}"
                           value="{{$new ? $inputData[$field->id]: $inputData[$ids[$field->id-1]]}}"> <br><br>

                @endforeach
            @endif

            <div class="content-end" >
                <input class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="edit">
            </div>
        </form>
    </div>
    </div>
@endsection



