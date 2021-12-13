@extends('layouts.app')

@section('content')
    <div class="flex flex-row">
        <table class="table-auto  border-separate p-3 w-9/12">
            <thead>
            <tr class="text-left">
                <th class="w-1/2 text-gray-500">Take</th>
                @foreach($exercise->fields() as $fields)
                    <th class="text-purple-800 hover:text-gray-500">
                        <a href="/exercises/{{$exercise->id}}/results/{{$fields->id}}">{{$fields->label}}</a>
                    </th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($answers as $answer)
                <tr class="text-left">
                    <td class="w-1/2 text-purple-800 hover:text-gray-500">
                        <a href="/exercises/{{$exercise->id}}/fulfillments/{{$answer->fulfillment_id}}">
                            {{$fulfillment[$answer->fulfillment_id]->take}} UTC
                        </a>
                    </td>
                    @foreach($answer->result() as $result)
                        @if(empty($result->answer))
                            <td><i class="fa fa-times empty"></i></td>
                        @elseif(strlen($result->answer) < 10)
                            <td><i class="fa fa-check filled"></i></td>
                        @else
                            <td><i class="fa fa-check-double filled"></i></td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection

