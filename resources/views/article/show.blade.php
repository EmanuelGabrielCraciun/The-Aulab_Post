<x-layout>


<div class="container-fluid p-5 bg-secondary text-center">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="display-1">{{$article->title}}</h1>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 d-flex flex column">

            <img src="{{Storage::url($article->image) }}" class="img-fluid" alt="Immagine del articolo:{{$article->title}}">
            <div class="text-center">
                <h2>{{$article->subtitle}}</h2>
                <p class="fs-5">
                    <a href="{{route('article.byCategory', $article->category)}}" class="text-capitalize fw-bold text-muted">{{$article->category->name}}</a>
                </p>
                <div class="text-muted my-3">
                    <p>redatto da {{$article->user->name}}
                        il {{$article->created_at->format('d/m/y')}}
                    </p>
                </div>
            </div>
        
            <hr>
             <p>{{$article->body}}</p>
                @if (Auth::user() && Auth::user()->is_revisor)
                    <div class="container my-5">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-evenly">
                                <form action="{{route('revisor.acceptArticle', $article)}}" method="POST">
                                    @csrf
                                    <button class="btn btn-success" type="submit">accetta articolo</button>
                                </form>
                                <form action="{{route('revisor.rejectArticle', $article)}}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">rifiuta articolo</button>
                                </form>
                            </div>
                        </div>
                    </div>
                
                @endif
                <div class="text-center">
                <a href="{{route('article.index')}}" class="text-secondary">Torna a indice</a>
                </div>
                
        </div>
    </div>
</div>
</x-layout>