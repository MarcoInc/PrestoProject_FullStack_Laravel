<x-layout docTitle="Login" title="Accesso">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST" action={{route('login')}}>
                    @csrf
            
                    <div class="mb-3 pt-4">
                        <label for="email" class="form-label fs-5">Indirizzo email</label>
                        <input name='email' type="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label  fs-5">Password</label>
                        <input name='password' type="password" class="form-control" id="password">
                    </div>   
            
                    <button type="submit" class="btn btn-danger fs-5">Login</button>
                    <p class="pt-3 fs-5">Non sei ancora registrato?</p> <a class='btn btn-info fs-5' href="{{route('register')}}">Registrati</a>
                </form>
            </div>
        </div>
    </div>
</x-layout>