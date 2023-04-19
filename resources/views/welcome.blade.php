@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row row-cols-3">     
        @foreach ($shoes as $shoe)
        <div class="col mb-4">
            <div class="card h-100">
                <div class="ratio ratio-16x9 img-cont">
                    <img src="{{asset('storage/' . $shoe->image)}}" alt="" class="border rounded">
                </div>
                <div class="card-body">
                    <h5 class="card-title"><a href="{{route('shoes.show', $shoe)}}">{{$shoe->model}}</a></h5>
                    <h6 class="card-subtitle">{{$shoe->manufacturer}}</h6>
                    <p class="card-text">
                        {{$shoe->description}}
                </div>
                <div class="d-flex w-100 justify-content-end p-1">
                    <h4>
                      {{  number_format((float)$shoe->price, 2, '.', '') }}
                    </h4>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection