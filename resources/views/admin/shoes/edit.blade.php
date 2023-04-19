@extends('layouts.app')

@section('title', 'Modifica ' . $shoe->model .' '.$shoe->manufacturer )
    


@section('content')
    <div class="container mt-5">
{{-- @include('layouts.partials.errors') --}}

        <form action="{{ route('shoes.update', $shoe) }}" method="POST" enctype="multipart/form-data">
            @method('PUT') @csrf
        
            <div class="mb-3">
            <label for="manufacturer" class="form-label">Produttore</label>
            <input
                type="text"
                class="form-control @error('manufacturer') is-invalid @enderror"
                id="manufacturer"
                name="manufacturer"
                value="{{ $shoe->manufacturer }}"
                />
                @error('manufacturer')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            
        
            <div class="mb-3">
            <label for="model" class="form-label">Modello</label>
            <input
                type="text"
                class="form-control @error('model') is-invalid @enderror"
                id="model"
                name="model"
                value="{{ $shoe->model }}"
                />
                @error('model')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        
        
        
            <div class="mb-3">

            <label for="material" class="form-label">Materiale</label>
            <input
                type="text"
                class="form-control @error('material') is-invalid @enderror"
                id="material"
                name="material"
                value="{{ $shoe->material }}"
                />
                @error('material')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <input
                    type="text"
                    class="form-control"
                    id="description"
                    name="description"
                    value="{{ $shoe->description }}"
                />
            </div>

            <div class="mb-3 row">
                <div class=" col-6">
                    <label for="file" class="form-label">Immagine</label>
                       <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                       @error('image')
                       <div class="invalid-feedback">
                        {{ $message }}
                       </div>
                       @enderror
                </div>
                <div class="col-6">
                    <img src="{{asset('storage/' . $shoe->image)}}" class="img-fluid" id="image-preview" alt="">
                </div>
               </div>
        
            <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input
                type="number"
                step="0.01"
                class="form-control @error('price') is-invalid @enderror"
                id="price"
                name="price"
                value="{{ $shoe->price }}"
                />
                @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            
        
            <div class="mb-3">
            <label for="size" class="form-label">Taglia</label>
            <input
                type="text"
                class="form-control  @error('size') is-invalid @enderror"
                id="size"
                name="size"
                value="{{ $shoe->size }}"
                />
                @error('size')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>    
                        
            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection

@section('scripts')
<script>
    const imageInputEl = document.getElementById('image');
    const imagePreviewEl = document.getElementById('image-preview');

    imageInputEl.addEventListener('change', () => {
        if (imageInputEl.files && imageInputEl.files[0]){
            const reader = new FileReader();
            reader.readAsDataURL(imageInputEl.files[0]);

            reader.onload = e => {
                imagePreviewEl.src = e.target.result;
            }
        }
    })
</script>
@endsection