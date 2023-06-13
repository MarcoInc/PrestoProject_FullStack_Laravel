<x-layout docTitle="Register" title="Registrati">

    <div class="container-fluid formRegister">
        <div class="row justify-content-center vh-100">
            <div class="col-6">
                <form method="POST" action={{ route('register') }}>
                    @csrf

                    <div class="mb-3 pt-4 text-white">
                        <label for="user" class="form-label fs-5">{{__('ui.userName')}}</label>
                        <input name='name' type="text" class="form-control  @error('name') is-invalid @enderror"
                            id="user" aria-describedby="emailHelp" value={{ old('name') }}>
                    </div>

                    <div class="mb-3 my-4 text-white">
                        <label for="email" class="form-label fs-5">{{__('ui.email')}}</label>
                        <input name='email' type="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" aria-describedby="emailHelp " value={{ old('email') }}>
                        @error('email')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 mb-4 text-white">
                        <label for="password" class="form-label fs-5">Password</label>
                        <input name='password' type="password"
                            class="form-control @error('password') is-invalid @enderror" id="password">
                    </div>

                    <div class="mb-3 text-white">
                        <label for="password" class="form-label fs-5">{{__('ui.confirmPassword')}}</label>
                        <input name='password_confirmation' type="password"
                            class="form-control  @error('password_confirmation') is-invalid @enderror" id="password">
                    </div>

                    <button type="submit" class="btnForm mt-4 fs-5 btn text-white">{{__('ui.registerButton')}}</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>
