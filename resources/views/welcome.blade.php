<x-layout>
    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1">The Aulab Post</h1>
            </div>
        </div>
    </div>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    
    @if(session('allert'))
        <div class="aller allert-danger">
            {{session('allert')}}
        </div>
    @endif
    <div class="container my-5">
        <div class="row justify-content-evenly">
            @foreach ($articles as $article)
                <div class="col-12 col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{Storage::url($article->image) }}" class="card-img-top" 
                            alt="Immagine del articolo: {{$article->title}}">
                        <div class="card-body">
                            <h5 class="card-title"> {{$article->title}}</h5>
                            <p class="card-subtitle"> {{$article->subtitle}}</p>
                            <p class="text-muted">Categoria:
                                <a href="c" class="text-capittalize text-muted">{{$article->category->name}}</a>
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <p>redatto da {{$article->user->name}}
                                il {{$article->created_at->format('d/m/y')}}
                            </p>
                            <a href="{{route('article.show', $article)}}" class="btn-outline-secondary">Leggi Articolo</a>
                        </div>
                        <p class="small text-muted my-0">
                            @foreach ($article->tags as $tag)
                                #{{$tag->name}}
                            @endforeach
                        </p>
                    </div>
                </div>
            @endforeach
        </div>



    </div>
</x-layout>
