<x-layout docTitle="Login" title="{{__('ui.loginTitle')}}">
    {{-- icona login --}}
    
    <div class="container-fluid bgLogin  pb-5 ">
        <div class="row justify-content-center mLogin p-5 vh-100">
            
            <div class="col-5 bg-dark shadow">
                <div class="w-100 text-center pt-5">
                    <i class="bi bi-person-circle display-1 text-white"></i>
                </div>
                <form method="POST" action={{route('login')}}>
                    @csrf
                    
                    <div class="mb-3 pt-4 px-5 text-white">
                        <label for="email" class="form-label fs-5">{{__('ui.email')}}</label>
                        <input name='email' type="email" class="form-control @error('password_confirmation') is-invalid @enderror" id="email" aria-describedby="emailHelp">
                        @error('email')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-3 my-5 px-5 text-white">
                        <label for="password" class="form-label  fs-5">Password</label>
                        <input name='password' type="password" class="form-control @error('password') is-invalid @enderror" id="password">
                        @error('password')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>   
                    <div class="text-center pt-4 pb-4">
                        
                        <button type="submit" class="btn text-uppercase btnLogin fs-6 mt-3">Login</button>
                        <p class="pt-3 fs-5 register mt-3">{{__('ui.notRegister')}}</p>
                        <a class='btn btnForm fs-5 mt-3' href="{{route('register')}}">{{__('ui.register')}}</a>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</x-layout>