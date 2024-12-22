<table class="table table-stripped table-hover">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome tag</th>
            <th scope="col">N. di articoli correlati</th>
            <th scope="col">Aggiorna </th>
            <th scope="col">Cancella</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($metaInfos as $metaInfo)
            <tr>
                <th scope="row">{{$metaInfo->id}}</th>
                <td>{{$metaInfo->name}}</td>
                <td>{{count ($metaInfo->articles)}}</td>
                @if ($metaType == 'tags')
                    <td>
                        <form action="{{route('admin.editTag',['tag'=>$metaInfo])}}" method="POST">
                            @csrf
                            @method ('PUT')
                            <input type="text" name="name" placeholder="Nuovo tag" class="form-controller w-50 d-inline">
                            <button class="btn btn-danger" type="submit">Aggiorna</button>

                        </form>
                    </td>
                    <td>
                        <form action="{{route('admin.deleteTag',['tag'=>$metaInfo])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Elimina</button>
                        </form>
                    </td>
                @else
                    <td>
                        <form action="{{route('admin.editCategory',['category'=>$metaInfo])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" value="{{$metaInfo->name}}" name="name" placeholder="Nuova categoria" class="form-control w-50 d-inline">
                            <button class="btn btn-secondary" type="submit">Aggiorna</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{route('admin.deleteCategory',['category'=>$metaInfo])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Elimina</button>
                        </form>
                    </td>
                @endif
            </tr>
        
        @endforeach
    </tbody>
</table>