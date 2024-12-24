<x-layout>
    <div class="container-fluid p-5 bg-secondary textcenter">
        <div class="row justify-content-center">
            <div class="col-12">
               <h1 class="display-1">Sezione modifica articolo</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md8">
                <form action="{{route('article.update',$article)}}" method="POST" class="card p-5 shadow" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">cambia titolo</label>
                        <input type="text" name="title" id="title" value="{{$article->title}}" class="form-control">
                        @error('title')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                         
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">cambia sottotitolo</label>
                        <input type="text" name="subtitle" id="subtitle" value="{{$article->subtitle}}" class="form-control">
                        @error('subtitle')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Immagine attuale</label>
                        <img src="{{Storage::url($article->image)}}" alt="{{$article->title}}" class="w-50 d-flex">
                    </div>
                         
                    <div class="mb-3">
                        <label for="image" class="form-label">nuova immagine</label>
                        <input type="file" name="image" id="image" value="{{$article->title}}" class="form-control">
                        @error('image')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <label for="category" class="form-label">categoria</label>
                        <select name="category" id="category" class="form-control">
                            @foreach ($categories as $category)     
                            <option value="{{$category->id}}" @if($article->category->id == $category->id) selected @endif>
                                {{$category->name}}
                            </option>                        
                            @endforeach
                        </selected>
                        @error('category')
                            <span class="text danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tags" class="form-label">Tag</label>
                        <input type="text" class="form-control" name="tags" id="tags" value="{{$article->tags->implode('name',',')}}">
                        <span class="small text-muted">Ricorda di dividere con la virgola </span>
                        @error('tags')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="body" class="form-label">Cambia testo</label>
                        <textarea name="body" id="body" class="form-control" cols="30" rows="7">{{$article->body}}</textarea>
                        @error('body')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="mt-3 justify-content-center flex-column-align-items-center">
                        <button class="btn btn-outline-secondary">MODIFICA</button>
                        <a href="{{route('welcome')}}" class="mt-2">Torna alla home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layout>