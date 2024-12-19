<x-layout>
    <div class="container-fluid p-5 bg-danger text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1">
                    WWWWWWWWWWWWWWWWWWWWWWWWWWWelcome {{Auth::user()->name}}
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
</x-layout>