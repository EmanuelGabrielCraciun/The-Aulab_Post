<div class="card" style="width: 18rem; ">
        <img src="{{Storage::url($article->image) }}" class="card-img-top" alt="Immagine del articolo: {{$article->title}}">                           
            <div class="card-body">
                <h5 class="card-title"> {{$article->title}}</h5>
                <p class="text-muted">Categoria:
                    @if ($article->category)
                        <a href="{{ route('article.byCategory', $article->category) }}" class="text-capitalize text-muted">
                        {{ $article->category->name }}
                        </a>
                    @else
                        <span>Categoria non esistente</span>
                    @endif
</p>

            </div>
            <div class="card-footer btn-group d-flex ms-0 justify-content-between align-items-center flex-fill footer_card">
                <a href="{{route('article.byUser', $article->user)}}" class="btn btn-warning btn-outline-secondary">
                    Redattore: {{$article->user->name}}
                </a>
               
                <a href="{{route('article.show', $article)}}" class="btn btn-warning btn-outline-secondary">
                     Leggi Articolo
                </a>
                <p class="mb-0 text-muted btn btn-warning btn-outline-secondary">
                    Il {{$article->created_at->format('d/m/y')}}
                </p>

            </div>
                <p class="small text-muted my-0">
                    @foreach ($article->tags as $tag)
                        #{{$tag->name}}
                    @endforeach
                </p>
            </div>