<x-layout>
<div class="my-5 container-fluid p-5 text-center">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Inserisci articolo</h1>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-7">
            <form action="{{route('article.store')}}" method="POST" class="card p-5 shadow" enctype="multipart/form-data">

                @csrf 
                
                <div class="mb-3">
                    <label for="title" class="form-lable">Titolo</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                   
                    @error('title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="subtitle" class="form-lable">Sotto titolo</label>
                    <input type="subtitle" class="form-control" id="subtitle" name="subtitle" value="{{old('email')}}">
                    
                    @error('subtitle')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="file" name="image" class="form-control" id="image">
                @error('image')
                <span class="text-danger">{{$message}}</span>
                @enderror
                </div>
                
                <div class="mb-3">
                    <lable for="tags" class="form-lable">Tags</lable>
                    <input type="text" class="form-control" name="tags" id="tags" Value="{{old('tags')}}"></input>
                    <span class="small text-muted">Dividi i tag con una virgola</span>
                    @error('tags')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
              
                    <div class="mb-3 d-flex justify-content-center flex-column align-items-center">
                    <label for="body" class="form-lable">Corpo del testo</label>
                    <textarea name="body" class="form-control" id="body" cols="30" rows="7" value="{{old('title')}}"></textarea>
                    @error('body')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
                <label for="category" class="form-label">Categoria</label>
                <select name="category" id="category" class="form-control">
                    <option selected disabled>Seleziona categoria</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

                </div>
                <div class="mb-3 d-flex justify-content-end flex-column align-items-center">
                    <button type="submit" class=btn-outline-secondary">inserisci articolo</button>
                    <a href="{{route('welcome')}}" class="text-secondary mt-2">Torna alla home</a>
                </div>
              

            </form>
        </div>
    </div>
</div>
</x-layout>