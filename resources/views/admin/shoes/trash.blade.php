@extends('layouts.app')

@section('title', 'Lista Cestino' )


@section('content')

    <div class="container">
        <div class="d-flex justify-content-end mt-5">
            <a href="{{route('shoes.index')}}" class="btn btn-primary mx-4">Torna alla lista</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">manufacturer</th>
                    <th scope="col">model</th>
                    <th scope="col">material</th>
                    <th scope="col">price</th>
                    <th scope="col">size</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($shoes as $shoe)
                <tr>
                    <th scope="row">{{ $shoe->id }}</th>
                    <td>{{ $shoe->manufacturer }}</td>
                    <td>{{ $shoe->model }}</td>
                    <td>{{ $shoe->material }}</td>
                    <td>{{ $shoe->price }}</td>
                    <td>{{ $shoe->size }}</td>   
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('admin.shoes.delete')
@endsection