@extends('layouts.take')

@section('exercises')

    <div class="flex flex-row">
        <div class="flex-1 px-2">
            <h1 class="text-4xl font-bold pb-4">Field</h1>
            <table class="w-full text-left">
                <tr class="border-b-2">
                    <th>Label</th>
                    <th>Value kind</th>
                </tr>
                @if($exercise !== null)

                    @foreach($exercise->fields() as $field)
                        <tr>
                            <td>{{$field->label}}</td>
                            <td>{{$field->kind}}</td>
                        </tr>

                    @endforeach
                @endif

            </table>
            <form class="py-8">
                <input class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="Complete and be ready for answers">
            </form>
        </div>
        <div class="flex-1 px-2">
            <h1 class="text-4xl font-bold pb-4">New Field</h1>
           <form method="post">
               <label class="text-gray-700 text-xl">Label</label>
               <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="label" name="label"><br><br>
               <label class="text-gray-700 text-xl">Value kind</label>
               <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="value-kind">

                   @foreach($lines as $line)
                       <option value="{{str_replace(" ","-",$line->kind)}}" {{$line->id == 1? 'selected' :''}}>{{$line->kind}}</option>
                   @endforeach

               </select>
               <div class="pt-8 content-end" >
                   <input class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="Create Field">
               </div>
           </form>
        </div>
    </div>

@endsection



