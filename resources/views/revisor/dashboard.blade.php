<x-layout>

 
    <div class="container-fluid p-5 bg-warning text-start">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1"> WWWWELCOME, {{Auth::user()->name}}</h1>
            </div>
        </div>
    </div>
    
        @if (session('message'))
            <div class="allertt allert-success">
                {{ session('message') }}
            </div>   
        @endif

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli da revisionare</h2>
                <x-articles-table :articles="$unrevisionedArticles"/>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli accettati</h2>
                <x-articles-table :articles="$acceptedArticles"/>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli rifiutati</h2>
                <x-articles-table :articles="$rejectedArticles"/>
            </div>
        </div>
    </div>

</x-layout>