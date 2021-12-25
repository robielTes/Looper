@extends('layouts.app')

@section('content')
    <div class="flex flex-row">
        <div class="flex-1 px-2">
            <h1 class="text-4xl font-bold pb-4 text-gray-600 ">Fields</h1>
            <table class="w-full text-left">
                <tr class="border-b-2">
                    <th class="text-gray-600">Label</th>
                    <th class="text-gray-600">Value kind</th>
                </tr>
                @forelse($exercise->fields() as $field)
                    <tr>
                        <td>{{$field->label}}</td>
                        <td>{{str_replace(" ","_",$field->value_kind)}}</td>
                        <td>
                            <div class="inline-grid grid-cols-2">
                                <a href="fields/{{$field->id}}/edit" title="edit">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="h-5 w-5 fill-current text-purple-500 hover:text-gray-500"
                                         viewBox="0 0 20 20">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                                        <path fill-rule="evenodd"
                                              d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </a>
                                <form action="fields/{{$field->id}}/destroy" method="post"
                                      onsubmit="return confirm('Are you sure?');">
                                    <button title="Destroy">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="h-5 w-5 fill-current text-purple-500 hover:text-gray-500"
                                             viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                @endforelse
            </table>
            <form class="py-8" action="/exercises/{{$exercise->id}}/state/answering" method="post"
                  onsubmit="return confirm('Are you sure? You won\'t be able to further edit this exercise');">
                <button
                        class="shadow bg-purple-500 hover:bg-gray-500 focus:shadow-outline focus:outline-none font-semibold text-white py-2 px-4 rounded"
                        type="submit">
                    <div class="flex">
                        <div class="flex-none w-14">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-10" viewBox="0 0 20 20" fill="white">
                                <path fill-rule="evenodd"
                                      d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="flex-initial w-74">
                            COMPLETE AND BE READY FOR ANSWERS
                        </div>
                    </div>
                </button>
            </form>
        </div>
        <div class="flex-1 px-2">
            <h1 class="text-4xl font-bold pb-4 text-gray-600">New Field</h1>
            <form method="post" action="/exercise/{{$exercise->id}}/fields">
                <label class="text-gray-700 text-xl text-gray-600 font-semibold">Label</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       type="text" id="label" name="label"><br><br>
                <label class="text-gray-700 text-xl text-gray-600 font-semibold">Value kind</label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="value-kind">

                    @foreach($lines as $line)
                        <option value="{{str_replace(" ","_",$line->kind)}}" {{$line->id == 1? 'selected' :''}}>{{$line->kind}}</option>
                    @endforeach

                </select>
                <div class="pt-8 content-end">
                    <input class="shadow bg-purple-500 hover:bg-gray-500 focus:shadow-outline focus:outline-none text-white font-semibold py-2 px-4 rounded"
                           type="submit"
                           value="CREATE FIELD">
                </div>
            </form>
        </div>
    </div>

@endsection



