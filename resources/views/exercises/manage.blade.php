@extends('layouts.take')


@section('exercises')


        <div class="flex flex-row">
            <div class="flex-1 px-2">
                <h1 class="text-4xl font-semibold">Building</h1>
                <h5 class="pt-5 border-b-2">Title</h5>
                @foreach($exercises as $exercise)
                    @if($exercise->state_id === 1)
                        <div class="flex flex-row">
                            <div>
                                <p>{{$exercise->title}} </p>
                            </div>
                            <div class="flex-grow"></div>
                            <div>
                                <a><i class="fa fa-comment"></i></a>
                                <a href="/exercises/{{$exercise->id}}/fields"><i class="fa fa-edit"></i></a>
                                <a><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
            <div class="flex-1 px-2">
                <h1 class="text-4xl font-semibold">Answering</h1>
                <h5 class="pt-5 border-b-2">Title</h5>
                @foreach($exercises as $exercise)
                    @if($exercise->state_id === 2)
                        <div class="flex flex-row">
                            <div>
                                <p>{{$exercise->title}} </p>
                            </div>
                            <div class="flex-grow"></div>
                            <div>
                                <a><i class="fa fa-chart-bar"></i></a>
                                <a><i class="fa fa-minus-circle"></i></a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="flex-1 px-2">
                <h1 class="text-4xl font-semibold">Closed</h1>
                <h5 class="pt-5 border-b-2">Title</h5>
                @foreach($exercises as $exercise)
                    @if($exercise->state_id === 3)
                        <div class="flex flex-row">
                            <div>
                                <p>{{$exercise->title}} </p>
                            </div>
                            <div class="flex-grow"></div>
                            <div>
                                <a><i class="fa fa-chart-bar"></i></a>
                                <a><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
@endsection

