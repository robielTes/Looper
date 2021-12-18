@extends('layouts.app')

@section('content')
    <div class="flex-1 px-2">
        <div class="pb-8 text-gray-600 ">
            <h1 class="text-5xl pb-4 text-gray-600">Your take</h1>
            <p>If you'd like to come back later to finish, simply submit it with blanks</p>
        </div>

        <form method="post" action="/exercises/{{$exercise->id}}/fulfillments">
            @if($exercise !== null)
                @foreach($exercise->fields() as $field)
                    <label class="text-gray-700 text-xl" for="{{$field->id}}">{{$field->label}}</label>
                    @if(($field->slug === 'single'))
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               type="text" name="{{$field->id}}"><br><br>
                    @else
                        <textarea
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                rows="2" name="{{$field->id}}">
                           </textarea>
                    @endif
                @endforeach
            @endif
            <div class="content-end">
                <input class="shadow bg-purple-500 hover:bg-gray-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 mt-6 rounded"
                       type="submit" value="save">
            </div>
        </form>
    </div>
    </div>

@endsection



