<x-layout>
<div class="container-fluid p-5 bg-secondary-subtle text-center">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 bg-blur">
            <h1 class="display-1">Tutti gli articoli</h1>
        </div>
    </div>
</div>
<div class="container my-5">
        <div class="row justify-content-center ">
            @foreach ($articles as $article)
                <div class="border-bottom border-black col-12 col-md-6 col-xxl-3 py-3 d-flex justify-content-center">
                    <x-article-card :article="$article"/>
                </div>
            @endforeach
        </div>

</x-layout>