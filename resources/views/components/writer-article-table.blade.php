
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Sottotitolo</th>
                <th scope="col">Categori</th>
                <th scope="col">Tags</th>
                <th scope="col">Data publicazione</th>
                <th scope="col">Azione</th>
            </tr>
        </thead>
        <tbody>
       
        @foreach ($articles as $article)
            <tr>
                <th scope="row">{{$article->id}}</th>
                <td>{{$article->title}}</td>
                <td>{{$article->subtitle}}</td>
                <td>{{$article->category->name}}</td>
                <td>
                    @foreach ($article->tags as $tag)
                    {{ $tag->name }}
                    @endforeach
                </td>
                <td>{{$article->created_at->format('d/m/Y')}}</td>
                <td>
                    <a href="{{route('article.show',$article)}}" class="btn btn-secondary">Visualizza</a>
                    <a href="{{route('article.edit', $article)}}" class="btn btn-warning">Modifica</a>
                    <form action="{{route('article.destroy', $article)}}" method="POST" class="btn btn-warning">
                        @csrf    
                        @method('DELETE')
                        <button class="btn btn-warning" type="submit">Elimina</but>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
