<x-layout>
<div class="my-5 container-fluid p-5 text-center">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h1>Registrati</h1>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-7">
            <form action="{{route('register')}}" method="POST" class="card p-5 shadow">

                @csrf 
                <div class="mb-3">
                    <label for="name" class="form-lable">Nome utente</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-lable">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-lable">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
                    @error('password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-lable">Conferma password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{old('password')}}">
                </div>
                <div class="mb-3 d-flex justify-content-end flex-column align-items-center">
                    <button type="submit" class=btn-outline-secondary">Registrati</button>
                    <p class="mt-2">Sei gia registrato? <a href="{{route('login')}}" class="text-secondary">Clicca qui</a></p>
                </div>

            </form>
        </div>
    </div>
</div>
</x-layout>