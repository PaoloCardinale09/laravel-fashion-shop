@extends('layouts.app')

@section('title', 'Aggiungi nuova scarpa' )



@section('content')



<div class="container mt-5">
{{-- @include('layouts.partials.errors') --}}


    <form action="{{ route('shoes.store') }}" method="POST" enctype="multipart/form-data">
           @csrf
           <div class="mb-3">
               <label for="manufacturer" class="form-label">Produttore</label>
               <input type="text" class="form-control @error('manufacturer') is-invalid @enderror" id="manufacturer" name="manufacturer" placeholder="Produttore" value="{{old('manufacturer')}}" >
               @error('manufacturer')
               <div class="invalid-feedback">
                {{ $message }}
               </div>
               @enderror
            
           </div>

           <div class="mb-3">
               <label for="model" class="form-label">Modello</label>
               <input type="text" class="form-control @error('model') is-invalid @enderror" id="model" name="model" placeholder="Modello" value="{{old('model')}}">
               @error('model')
               <div class="invalid-feedback">
                {{ $message }}
               </div>
               @enderror
           </div>

           <div class="mb-3">
               <label for="material" class="form-label">Materiale</label>
               <input type="text" class="form-control @error('material') is-invalid @enderror" id="material" name="material" placeholder="Materiale" value="{{old('material')}}">
               @error('material')
               <div class="invalid-feedback">
                {{ $message }}
               </div>
               @enderror
           </div>

           <div class="row mb-3">
            <div class="col-6">
                <label for="file" class="form-label">Immagine</label>
                   <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                   @error('image')
                   <div class="invalid-feedback">
                    {{ $message }}
                   </div>
                   @enderror
            </div>
            <div class="col-6">
                <img src="{{asset('images/no-image.webp')}}" class="img-fluid" id="image-preview" alt="">
            </div>
           </div>

           <div class="mb-3">
               <label for="price" class="form-label">Prezzo</label>
               <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Prezzo" value="{{old('price')}}">
               @error('price')
               <div class="invalid-feedback">
                {{ $message }}
               </div>
               @enderror
           </div>

           <div class="mb-3">
               <label for="size" class="form-label">Taglia</label>
               <input type="text" class="form-control @error('size') is-invalid @enderror" id="size" name="size" placeholder="Taglia" value="{{old('size')}}">
               @error('size')
               <div class="invalid-feedback">
                {{ $message }}
               </div>
               @enderror
           </div>

           
           <div class="mb-3">
               <label for="album" class="form-label">Descrizione</label>
               <textarea type="text" 
               class="form-control @error('description') is-invalid @enderror" id="description" 
               name="description" 
               placeholder="Descrizione">{{old('description')}}</textarea>
               @error('description')
               <div class="invalid-feedback">
                {{ $message }}
               </div>
               @enderror
           </div>

           <button class="btn btn-primary">Aggiungi</button>
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