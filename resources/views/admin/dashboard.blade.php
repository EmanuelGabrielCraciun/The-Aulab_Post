<x-layout>  

    <div class="container-fluid p-5 bg-primary text-center">
        <div class="row justify-content-center">
            <div class="col-6 bg-blur ">
                <h1 class="display-1">
                    Welcome {{Auth::user()->name}}
                </h1>
            </div>
        </div>
    </div>
    @if (session('message'))
        <div class="allert allert-success">
            {{session('message')}}
        </div>
    @endif
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>
                    richieste per diventare amministratore
                    <x-request-table :roleRequest="$adminRequest" role="amministratore"/>
                </h2>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>
                    richieste per diventare revisore
                    <x-request-table :roleRequest="$revisorRequest" role="revisore"/>
                </h2>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>
                    richieste per diventare redattore
                    <x-request-table :roleRequest="$writerRequest" role="redattore"/>
                </h2>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Tag esistenti</h2>
                <x-metainfo-table :metaInfos="$tags" metaType="tags"/>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Tutte le categorie</h2>
                <form action="{{route('admin.storeCategory')}}" method="POST" class="w-50 d-flex m-3">
                    @csrf
                    <input type="text" name="name" placeholder="Inserire una nuova categoria" class="form-control me-2">
                    <button class="btn btn-outline-secondary" type="submit">Procedi</button>
                </form>
                <x-metainfo-table :metaInfos="$categories" metaType="categorie" />
            </div>
        </div>
    </div>
</x-layout>