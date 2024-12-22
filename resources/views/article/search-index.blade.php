<x-layout>
    <div class="container-fluid p-5 bg-secondary text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1">Articoli per{{$query}}</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-evenly">
            @foreach ($articles as $article)
                <div class="col-12 col-md-4">
                     <div class="card" style="width: 18rem;">
                        <img src="{{Storage::url($article->iamge) }}" class="card-image-top"
                        alt="Immagine articolo: {{$article->title}}">
                        <div class="cardbody">
                            <h5 class="card-title">{{$article->title}}</h5>
                            <p class="card-subtitle">{{$article->subtitle}}</p>
                            <p class="small text-muted">
                                <a href="{{route('article.byCategory', $article->category)}}" class="text-capitalize text-muted">
                                    {{$article->category->name}}
                                </a>
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <p>redatto il {{$article->created_at->format('d/m/Y')}}<br>
                            da <a href="{{route('article.byUser',$article->user)}}" class="text-muted">{{$article->user->name}}</a>
                        </p>
                            <a href="{{route('article.byUser',$article->user) }}" class="btn btn-outline-secondary">Leggi</a>
                            <p class="small text-muted my-0">
                            @foreach ($article->tags as $tag)
                                #{{$tag->name}}
                            @endforeach
                        </p>
                        </div>
                    </div>
                </div>          
            @endforeach
           
        </div>
    </div>
</x-layout>