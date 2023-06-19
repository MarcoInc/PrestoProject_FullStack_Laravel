<x-layout title="Profilo: {{ Auth::user()->name }}">

    @if (session('editProfileOk'))
        <div>
            <p class="alert alert-warning mt-3 text-center"> {{ session('editProfileOk') }} </p>
        </div>
    @endif
    <div class="container ">
        <div class="row justify-content-center ">
            <div class="col-12 borderProfilo">
                <div class="row justify-content-center ">
                    <div class="col-12 py-3   formCustomProfile mt-1 d-flex align-items-center justify-content-between">

                        <i class="text-white bi bi-person-circle ps-3 display-1 me-3 md-md-0"></i>

                        <h2 class="text-white">{{ __('ui.titlePersonalProfile') }}</h2>

                    </div>

                    <div class="row px-0 min-vh-100">

                        <div class="col-md-4 col-12 borderBottom formCustomProfile2">

                            <ul class="list-unstyled pt-5">

                                <li class="pe-3">
                                    <h2 class="py-3 text-white">{{ Auth::user()->name }}</h2>

                                </li>

                                <li class="list-item pt-4 fs-5">
                                    <span class="text-white">
                                        <i class="bi bi-person-check-fill me-1"></i>
                                        {{ __('ui.userName') }}:
                                    </span>
                                    {{ Auth::user()->name }}
                                </li>
                                <li class="list-item pt-4 fs-5"><span class="text-white">
                                        <i class="bi bi-envelope-heart-fill"></i>
                                        {{ __('ui.email') }}:</span>
                                    {{ Auth::user()->email }}
                                </li>
                                <li class="list-item pt-4 fs-5"><span class="text-white">
                                        <i class="bi bi-calendar-check"></i>
                                        {{ __('ui.registratoIl') }}:</span>
                                    {{ Auth::user()->created_at->format('d/m/Y') }}
                                </li>

                            </ul>

                        </div>
                        <div class="col-md-8 col-12 mb-3">


                            <h3 class="list-item py-5 text-center">{{ __('ui.articleApprovation') }}
                            </h3>


                        
                            @if (Auth::user()->guest_houses)
                                <div class="table-responsive">

                                    <table class="table shadow borderRevisor">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">{{ __('ui.place') }}</th>
                                                <th scope="col">{{ __('ui.location') }}</th>
                                                <th scope="col">{{ __('ui.price') }}</th>
                                                <th scope="col">{{ __('ui.statusRevision') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($houses as $house)
                                                <tr class="table-column">
                                                    <th scope="row"><i class="bi bi-house-fill mainColor"></i></th>
                                                    <td><a class="text-decoration-none btn mainColor fw-semibold scale transition"
                                                            href="{{ route('show', ['id' => $house->id]) }}">{{ $house->place }}</a>
                                                    </td>
                                                    <td>{{ $house->location->name }}</td>
                                                    <td>{{ $house->price }}/{{ __('ui.night') }}</td>
                                                    <td>
                                                        @if ($house->is_accepted === 0)
                                                            <span
                                                                class="badge bg-danger">{{ __('ui.notApproved') }}</span>
                                                        @elseif($house->is_accepted === null)
                                                            <span
                                                                class="badge bg-warning">{{ __('ui.inApprovation') }}</span>
                                                        @else
                                                            <span
                                                                class="badge bg-success">{{ __('ui.revisionAccepted') }}</span>
                                                        @endif

                                                    </td>
                                                </tr>
                                            @empty
                                            @endforelse


                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center vhCustom">

                                    <div class="borderCustom p-5 d-flex flex-column justify-content-center align-items-center">
                                        <h3>{{ __('ui.notYetAnnouncements') }}</h3>
                                        <i class="text-white fs-4 pb-2 bi bi-cloud-upload-fill"></i>
                                        <a href="{{ route('create') }}"
                                            class="btn opacity btnCustom p-2 fs-5">{{ __('ui.CaricaAnnuncio') }}!
                                        </a>
                                    </div>
                                </div>

                            @endif







                        </div>
                    </div>

                </div>

            </div>



















            {{-- row --}}
        </div>









        {{-- container --}}
    </div>

    <x-script-card />

</x-layout>
