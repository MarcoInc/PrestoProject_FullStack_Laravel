<x-layout title="Pagina revisore">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <h1>{{ $houses ? 'Storico annunci revisionati' : 'Nessun annucio revisionato' }}</h1>
                        {{-- <h2>{{ $house_toCheck->place }}</h2>
                        <h3>Posti letto : {{ $house_toCheck->beds }}</h3>
                        <h2>Prezzo a notte : {{ $house_toCheck->price }}</h2>
                        <h2>Creato il: {{ $house_toCheck->created_at }} da {{ $house_toCheck->user->name}} ({{$house_toCheck->user->email}})</h2>
                        <h2>Descrizione: {{ $house_toCheck->description }}</h2>
                        
                        <img src="{{ Storage::url($house_toCheck->img) }}" alt="{{ $house_toCheck->name }}">  --}}

                        <table class="table">
                            <thead>
                                <tr>
                                    {{-- <th scope="col">ID</th> --}}
                                    <th class="text-center" scope="col">Articolo</th>
                                    <th class="text-center" scope="col">Stato</th>
                                    <th class="text-center" scope="col">Pubblicato da</th>
                                    <th class="text-center" scope="col">Dati</th>
                                    <th class="text-center" scope="col">Azione</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($houses as $house)
                                    <tr>
                                        {{-- <td>{{$house->id}}</td> --}}
                                        <td class="text-center">
                                            
                                            <a href="{{ route('show', ['id' => $house->id]) }}"
                                                class="btn btn-primary">
                                                </i>{{ $house->place }}
                                            </a>
                                        </td>

                                        <td class="text-center">
                                            @if($house->is_accepted === 0)
                                                <h5> <span class="badge bg-danger">Non approvato</span></h5>
                                            @elseif($house->is_accepted === 1)
                                                <h5> <span class="badge bg-success">Approvato</span></h5>
                                            @endif
                                        </td>

                                       
                                        <th class="text-center" scope="row">{{ $house->user->name }}</th>

                                        <td class="text-center">
                                            <p class='bg-success'>Creato il </p>
                                            
                                            {{ $house->created_at }}
                                            @if ($house->created_at < $house->updated_at)
                                                <hr>
                                                <p class='bg-warning'>Modificato il </p>
                                                {{ $house->updated_at }} </p>
                                            @endif
                                        </td>


                                        <td class="text-center text-uppercase">



                                            <a onclick="event.preventDefault();getElementById('form-resetRevision').submit()"
                                                class="btn form-reject" type='submit'>
                                                <i class="fa-solid fa-square-xmark text-info"></i> Manda in
                                                revisione</a>
                                            <form id="form-resetRevision" class="d-none" method=POST action={{ route('revisor.resetRevision', compact('house'))}}>
                                            @csrf
                                            @method('patch')
                                            </form>



                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                        {{--                         
                            @if ($house_toCheck)
                            <form method=POST action={{ route('revisor.accept', ['house_toCheck'=>$house_toCheck] )}}>
                                @csrf
                                @method('patch')
                                <button class="btn btn-info" type='submit'>Accetta annuncio</button>
                            </form>
                            
                            <form method=POST action={{ route('revisor.reject', ['house_toCheck'=>$house_toCheck]) }}>
                                @csrf
                                @method('patch')
                                <button class="btn btn-danger" type='submit'>Rifiuta annuncio</button>
                            </form>
                            @endif  --}}
                   
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script-form />
</x-layout>
