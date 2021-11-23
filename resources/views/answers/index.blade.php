@extends('layouts.app')


@section('content')
    <div class="flex flex-row">
        <table class="table-auto  border-separate p-3 w-9/12">
            <thead>
                <tr class="text-left">
                    <th class="w-1/2">Take</th>
                    @foreach($exercise->fields() as $fields)
                        <th >{{$fields->slug}}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
            @foreach($answers as $answer)
               <tr class="text-left">
                   <td class="w-1/2">{{$answer->take}}</td>
                   @foreach($answer->result() as $result)
                       <td >{{$result->answer}}</td>
                   @endforeach
               </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection

