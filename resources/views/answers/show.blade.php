@extends('layouts.app')


@section('content')
    <h2 class="text-5xl pb-4">{{$field->label}}</h2>
    <div class="flex flex-row">
        <table class="table-auto  border-separate p-3 w-9/12">
            <thead>
                <tr class="text-left">
                    <th class="w-1/2">Take</th>
                    <th class="w-1/2">Content</th>
                </tr>
            </thead>
            <tbody>
            @foreach($answers as $answer)
               <tr class="text-left">
                   <td class="w-1/2">{{$answer->take}}</td>
                   <td class="w-1/2">{{$answer->answer}}</td>
               </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection
