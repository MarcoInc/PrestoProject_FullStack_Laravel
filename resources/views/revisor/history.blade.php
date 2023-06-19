<x-layout title="{{ __('ui.historyIndexRevisorTitle') }}">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-10">

                        <h2 class="py-4">{{ __('ui.historyIndexRevisorTitle') }}</h2>
                        @if (session('message'))
                            <div class="container">
                                <p class="alert alert-warning">{{ session('message') }}</p>
                            </div>
                        @endif
                    </div>
                    @if ($houses->isEmpty())

                        {{-- Se non ci sono articoli da revisionare --}}
                        <div class="col-12 vhCustom d-flex justify-content-center align-items-center">
                            <div
                                class="borderCustom p-md-5 p-2 pt-0 text-center d-flex flex-column justify-content-center align-items-center">
                                <h2 class="text-white p-md-5 p-4">{{ __('ui.noHistory') }}</h2>
                                <div
                                    class="d-flex flex-md-row flex-column justify-content-md-around justify-content-center w-100">

                                    <div class="scale transition">
                                        <span><i class="fa-solid fa-paperclip text-white"></i></span> <a
                                            href="{{ route('revisorIndex') }}"
                                            class="btn fs-5">{{ __('ui.goToReview') }}</a>

                                    </div>
                                    <div class="scale transition">
                                        <span><i class="fa-solid py-4 py-md-0 fa-rotate-left text-white"></i></span><a
                                            href="{{ route('revisor.history') }}"
                                            class="btn fs-5">{{ __('ui.Refresh') }}</a>
                                    </div>
                                </div>


                            </div>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-light">
                                <thead class="bg-light">
                                    <tr class="borderRevisor table-success">
                                        {{-- <th scope="col">ID</th> --}}
                                        <th class="text-center" scope="col">{{ __('ui.viewArticleName') }}</th>
                                        <th class="text-center" scope="col">{{ __('ui.publishBy') }}</th>
                                        <th class="text-center" scope="col">{{ __('ui.createDate') }}</th>
                                        <th class="text-center" scope="col">{{ __('ui.editDate') }}</th>
                                        <th class="text-center" scope="col">{{ __('ui.statusRevision') }}</th>
                                        <th class="text-center" scope="col">{{ __('ui.actionRevision') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($houses as $house)
                                        <tr>
                                            {{-- <td>{{$house->id}}</td> --}}
                                            <td class="text-start borderRevisor">

                                                <a href="{{ route('show', ['id' => $house->id]) }}" class="btn">
                                                    <p class="fs-5 fw-semibold transition btnRevisor"><i
                                                            class="fa-solid fa-circle-info mainColor"></i>
                                                        {{ $house->place }}
                                                    </p>
                                                </a>

                                            </td>


                                            <td class="text-center borderRevisor">
                                                <div class="transition btnRevisor">
                                                    <a href="{{ route('userProfile', ['id' => $house->user->id]) }}"
                                                        class="btn fs-5 p-0 pe-1 pt-4">
                                                        <i class="fa-solid fa-user mainColor fs-6"></i>
                                                        {{ $house->user->name }}
                                                    </a>

                                                </div>
                                            </td>

                                            <td class="text-center borderRevisor">
                                                {{-- <p class=' rounded-2 text-success text-uppercase fw-bold'>Creato</p> --}}
                                                <p class="fs-5">{{ $house->created_at->format('d/m/Y') }}
                                                    <span>
                                                        <br>h {{ $house->created_at->format('H:i') }}</span>
                                                </p>

                                            </td>
                                            <td class="text-center borderRevisor">
                                                @if ($house->created_at < $house->updated_at)
                                                    {{-- <p class=' rounded-2 fw-semibold text-warning'>Modificato</p> --}}
                                                    <p class="fs-5">{{ $house->updated_at->format('d/m/Y') }}
                                                        <span> <br>h {{ $house->updated_at->format('H:i') }}</span>
                                                    </p>
                                                @endif

                                            </td>

                                            <td class="text-center borderRevisor">
                                                @if ($house->is_accepted === 0)
                                                    <h5> <span
                                                            class="badge bg-danger">{{ __('ui.revisionRejected') }}</span>
                                                    </h5>
                                                @elseif($house->is_accepted === 1)
                                                    <h5> <span
                                                            class="badge bg-success">{{ __('ui.revisionAccepted') }}</span>
                                                    </h5>
                                                @endif
                                            </td>

                                            <td class="text-center borderRevisor">

                                                <a onclick="event.preventDefault();getElementById('form-resetRevision').submit()"
                                                    class="btn form-reject fs-6" type='submit'>
                                                    <i
                                                        class="fa-solid fa-arrow-rotate-left mainColor"></i>{{ __('ui.revisionReset') }}</a>
                                                <form id="form-resetRevision" class="d-none" method=POST
                                                    action={{ route('revisor.resetRevision', compact('house')) }}>
                                                    @csrf
                                                    @method('patch')
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
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
