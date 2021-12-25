@extends('layouts.app')


@section('content')
    <div class="flex flex-row">
        <div class="flex-1 px-2">
            <h1 class="text-5xl text-gray-500 pb-4 font-medium">Building</h1>
            <h5 class="py-3 border-b text-gray-500 font-medium">Title</h5>
            @foreach($exercisesBuilding as $exercise)
                <div class="flex flex-row py-3 border-b">
                    <div>
                        <p class="text-gray-500">{{$exercise->title}} </p>
                    </div>
                    <div class="flex-grow justify-end"></div>
                    <div class="flex justify-end">
                        @if(!empty($exercise->fields()))
                            <form action="/exercises/{{$exercise->id}}/state" method="post">
                                <button title="Be ready for answers">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="h-5 w-5 fill-current text-purple-600 hover:text-gray-500"
                                         viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                              d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </form>
                        @endif
                        <a href="/exercises/{{$exercise->id}}/fields" title="Manage fields">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-5 w-5 fill-current text-purple-600 hover:text-gray-500" viewBox="0 0 20 20">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                                <path fill-rule="evenodd"
                                      d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </a>
                        <form action="/exercises/{{$exercise->id}}/destroy" method="post"
                              onsubmit="return confirm('Are you sure?');">
                            <button title="Destroy">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-5 w-5 fill-current text-purple-600 hover:text-gray-500"
                                     viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </form>

                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex-1 px-2">
            <h1 class="text-5xl text-gray-500 pb-4 font-medium">Answering</h1>
            <h5 class="py-3 border-b text-gray-500 font-medium">Title</h5>
            @foreach($exercisesAnswering as $exercise)
                <div class="flex flex-row py-3 border-b">
                    <div>
                        <p class="text-gray-500">{{$exercise->title}} </p>
                    </div>
                    <div class="flex-grow"></div>
                    <div class="flex justify-end">
                        <a href="/exercises/{{$exercise->id}}/results" title="Show results">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-5 w-5 fill-current text-purple-600 hover:text-gray-500" viewBox="0 0 20 20">
                                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                            </svg>
                        </a>
                        <form action="/exercises/{{$exercise->id}}/state" method="post">
                            <button title="close">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-5 w-5 fill-current text-purple-600 hover:text-gray-500"
                                     viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex-1 px-2">
            <h1 class="text-5xl text-gray-500 pb-4 font-medium">Closed</h1>
            <h5 class="py-3 border-b text-gray-500 font-medium">Title</h5>
            @foreach($exercisesClosed as $exercise)
                <div class="flex flex-row py-3 border-b">
                    <div>
                        <p class="text-gray-500">{{$exercise->title}} </p>
                    </div>
                    <div class="flex-grow"></div>
                    <div class="flex justify-end">
                        <a href="/exercises/{{$exercise->id}}/results" title="Show results">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-5 w-5 fill-current text-purple-600 hover:text-gray-500" viewBox="0 0 20 20">
                                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                            </svg>
                        </a>
                        <form action="/exercises/{{$exercise->id}}/destroy" method="post"
                              onsubmit="return confirm('Are you sure?');">
                            <button title="Destroy">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-5 w-5 fill-current text-purple-600 hover:text-gray-500"
                                     viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

