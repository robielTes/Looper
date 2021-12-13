@extends('layouts.app')


@section('content')

    <div class="flex flex-row">
        <div class="flex-1 px-2">
            <h1 class="text-4xl font-semibold text-gray-500">Building</h1>
            <h5 class="pt-5 border-b-2 text-gray-500 font-semibold">Title</h5>
            @foreach($exercises as $exercise)
                @if($exercise->state_id === 1)
                    <div class="flex flex-row">
                        <div>
                            <p class="text-gray-500">{{$exercise->title}} </p>
                        </div>
                        <div class="flex-grow"></div>
                        <div class="inline-grid grid-cols-3">
                            <a href="/exercises/{{$exercise->id}}/state" title="Be ready for answers">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current text-pink-600 hover:text-gray-500" viewBox="0 0 20 20" >
                                    <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="/exercises/{{$exercise->id}}/fields" title="Manage fields">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current text-pink-600 hover:text-gray-500" viewBox="0 0 20 20">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="/exercises/{{$exercise->id}}/destroy" title="Destroy">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current text-pink-600 hover:text-gray-500" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>

                @endif
            @endforeach
        </div>
        <div class="flex-1 px-2">
            <h1 class="text-4xl font-semibold text-gray-500">Answering</h1>
            <h5 class="pt-5 border-b-2 text-gray-500 font-semibold">Title</h5>
            @foreach($exercises as $exercise)
                @if($exercise->state_id === 2)
                    <div class="flex flex-row">
                        <div>
                            <p class="text-gray-500">{{$exercise->title}} </p>
                        </div>
                        <div class="flex-grow"></div>
                        <div class="inline-grid grid-cols-2">
                            <a href="/exercises/{{$exercise->id}}/results" title="Show results">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current text-pink-600 hover:text-gray-500" viewBox="0 0 20 20">
                                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                                </svg>
                            </a>
                            <a href="/exercises/{{$exercise->id}}/state" title="close">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current text-pink-600 hover:text-gray-500" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="flex-1 px-2">
            <h1 class="text-4xl font-semibold text-gray-500">Closed</h1>
            <h5 class="pt-5 border-b-2 text-gray-500 font-semibold">Title</h5>
            @foreach($exercises as $exercise)
                @if($exercise->state_id === 3)
                    <div class="flex flex-row">
                        <div>
                            <p class="text-gray-500">{{$exercise->title}} </p>
                        </div>
                        <div class="flex-grow"></div>
                        <div class="inline-grid grid-cols-2">
                            <a href="/exercises/{{$exercise->id}}/results" title="Show results">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current text-pink-600 hover:text-gray-500" viewBox="0 0 20 20">
                                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                                </svg>
                            </a>
                            <a href="/exercises/{{$exercise->id}}/destroy" title="Destroy">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current text-pink-600 hover:text-gray-500" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

@endsection

