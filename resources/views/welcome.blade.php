<x-layout>
    <div class="container-fluid mt-0 p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 bg-blur">
                <h1 class="display-1">The Aulab Post</h1>
            </div>
        </div>
    </div>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    
    @if(session('allert'))
        <div class="aller allert-danger">
            {{session('allert')}}
        </div>
    @endif
    <div class="container my-5 ">
        <div class="row justify-content-center">
            @foreach ($articles as $article)
                <div class="border-bottom border-black col-12 col-md-6 col-xxl-3 py-3 d-flex justify-content-center">
                   <x-article-card :article="$article"/>
                </div>
            @endforeach
        </div>



    </div>
</x-layout>
