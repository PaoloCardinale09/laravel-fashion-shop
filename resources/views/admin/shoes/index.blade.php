@extends('layouts.app')

@section('title', 'Lista Scarpe' )


@section('content')

    <div class="container">
        <div class="d-flex justify-content-end mt-5">
            <a href="{{route('create')}}" class="btn btn-primary">Aggiungi Scarpa</a>
            <a href="{{route('shoes.trash')}}" class="btn btn-primary mx-4">Cestino</a>
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
                    <td>{{  number_format((float)$shoe->price, 2, '.', '') }}</td>
                    <td>{{ $shoe->size }}</td>

                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="{{ route('shoes.edit', $shoe)}}" title="Modifica"><i class="bi bi-pencil-square text-warning ps-2 pe-2"></i></a>
                            <a href="{{ route('shoes.show', $shoe)}}" title="Dettaglio"><i class="bi bi-eye ps-2 pe-2"></i></a>
                            <button type="button" class="btn"  data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $shoe->id }}"><i class="bi bi-trash text-danger"></i></button>
                        </div>
                    </td>
                    
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('admin.shoes.delete')
@endsection