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
                            <div class="flex flex-row">
                                <img src="/assets/edit.png" alt="edit">
                                <img src="/assets/trash.png" alt="trash">
                                <img src="/assets/stop.png" alt="stop" >
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
                            <div class="flex flex-row">
                                <img src="/assets/edit.png" alt="edit">
                                <img src="/assets/trash.png" alt="trash">
                                <img src="/assets/stop.png" alt="stop" >
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
                            <div class="flex flex-row">
                                <img src="/assets/edit.png" alt="edit">
                                <img src="/assets/trash.png" alt="trash">
                                <img src="/assets/stop.png" alt="stop" >
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
@endsection

