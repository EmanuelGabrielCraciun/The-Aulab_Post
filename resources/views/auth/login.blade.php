<x-layout>
   <div class="container-fluid p-5 bg-secondary text-center">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h1 class+"display-1">Accedi</h1>
            </div>
        </div>
   </div>

   <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form action="{{route('login')}}" method="POST" class="card p-5 shadow">
                    @csrf 
                        <div class="mb-3">
                            <lable for="email" class="form-lable">Email</lable>
                            <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror 
                        </div>


                        <div class="mb-3">
                            <lable for="password" class="form-lable">Password</lable>
                            <input type="password" class="form-control" id="password" name="password">
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror 
                        </div>
                        <div class="mb-3 d-flex justify-content-center flex-column align-items-center">
                            <button type="submit" class="btn ntn-outline-secondary">Accedi</button>
                            <p class="mt-2">Non sei registrato? <a href="{{route('register')}}" class="text-secondary">Clicca qui</a></p>
                        </div>
                </form>
            </div>
        </div>
   </div>
</x-layout>