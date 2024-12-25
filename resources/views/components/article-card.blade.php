<div class="card" style="width: 18rem; ">
        <img src="{{Storage::url($article->image) }}" class="card-img-top" alt="Immagine del articolo: {{$article->title}}">                           
            <div class="card-body">
                <h5 class="card-title"> {{$article->title}}</h5>
                 <p class="card-subtitle"> {{$article->subtitle}}</p>
                 <p class="text-muted">Categoria:
                 <a href="{{route('article.byCategory', $article->category)}}" class="text-capittalize text-muted">{{$article->category->name}}</a>
                 </p>
            </div>
        <div class="card-footer d-flex justify-content-between align-items-center">
           <a href="{{route('article.byUser', $article->user)}}" class="btn btn-warning"> redatto da {{$article->user->name}}  </a>
               <p> il {{$article->created_at->format('d/m/y')}} </p>                              
                <a href="{{route('article.show', $article)}}" class="btn-outline-secondary">Leggi Articolo</a>
        </div>
            <p class="small text-muted my-0">
                @foreach ($article->tags as $tag)
                    #{{$tag->name}}
                @endforeach
            </p>
    </div>