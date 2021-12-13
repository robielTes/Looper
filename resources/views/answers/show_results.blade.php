@extends('layouts.app')

@section('content')
    <h2 class="text-5xl pb-4 text-gray-500">{{$field->label}}</h2>
    <div class="flex flex-row">
        <table class="table-auto  border-separate p-3 w-9/12">
            <thead>
            <tr class="text-left">
                <th class="w-1/2 text-gray-500">Take</th>
                <th class="w-1/2 text-gray-500">Content</th>
            </tr>
            </thead>
            <tbody>
            @foreach($answers as $answer)
                <tr class="text-left">
                    <td class="w-1/2 text-purple-800 hover:text-gray-500">
                        <a href="/exercises/{{$exercise->id}}/fulfillments/{{$answer->fulfillment_id}}">
                            {{$answer->take()[0]->take}} UTC
                        </a>
                    </td>
                    <td class="w-1/2 text-gray-500">{{$answer->take()[0]->answer}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection

