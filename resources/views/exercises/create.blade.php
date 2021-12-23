@extends('layouts.app')


@section('content')

    <div>
        <p class="text-5xl pb-8 text-gray-600">New Exercise</p>
        <label class="text-xl text-gray-600 font-medium">Title</label>
        <form method="post" action="/exercises/{{$next}}/fields">
            <label for="title"></label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   type="text" id="title" name="title"><br><br>
            <input type="submit" value="CREATE EXERCISE"
                   class="shadow bg-purple-800 hover:bg-gray-500 focus:shadow-outline focus:outline-none text-white font-medium py-2 px-4 rounded">
        </form>
    </div>

@endsection
