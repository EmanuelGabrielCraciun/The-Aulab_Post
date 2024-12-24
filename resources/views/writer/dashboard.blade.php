
<x-layout>
    <div class="container-fluid p-5 bg-secondary textcenter">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1">Ben tornato {{Auth::user()->name}}</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli in fase di revisione</h2>
                <x-writer-article-table :articles="$unrevisonedArticles" />
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli accettati</h2>
                <x-writer-article-table :articles="$acceptedArticles" />
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli rifiutati</h2>
                <x-writer-article-table :articles="$rejectedArticles" />
                
            </div>
        </div>
    </div>
</x-layout>