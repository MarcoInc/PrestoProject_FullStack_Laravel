<x-layout docTitle="Register" title="Registrati">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST" action={{ route('register') }}>
                    @csrf

                    <div class="mb-3 pt-4">
                        <label for="user" class="form-label fs-5">Nome</label>
                        <input name='name' type="text" class="form-control @error('name') is-invalid @enderror"
                            id="user" aria-describedby="emailHelp" value={{ old('name') }}>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fs-5">Indirizzo email</label>
                        <input name='email' type="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" aria-describedby="emailHelp " value={{ old('email') }}>
                        @error('email')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fs-5">Password</label>
                        <input name='password' type="password"
                            class="form-control @error('password') is-invalid @enderror" id="password">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fs-5">Conferma Password</label>
                        <input name='password_confirmation' type="password"
                            class="form-control  @error('password_confirmation') is-invalid @enderror" id="password">
                    </div>

                    <button type="submit" class="btn btn-danger fs-5">Registrati</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>
