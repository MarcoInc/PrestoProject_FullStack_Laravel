<x-layout title="{{ __('ui.titlePageUser') }}: {{ $user->name }}">



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 borderProfilo">
                <div class="row justify-content-evenly">
                    <div class="col-12 py-3  formCustomProfile d-flex align-items-center justify-content-between">

                        <div class="row justify-content-center justify-content-md-between w-100">

                            @if ($profile && $profile->img)
                                <div class="col-md-2 col-12 ms-md-3 ms-0 text-center">

                                    <img class=" whImgProfile border border-3 p-1 bRadius"
                                        src="{{ Storage::url($profile->img) }}" alt="Immagine profilo">

                                </div>
                            @else
                                <div class="display-1 text-center col-md-2 col-12 pt-4">
                                    <i class="text-white bi bi-person-circle ps-md-5 ps-0 display-1"></i>
                                </div>
                            @endif

                            <div class="col-md-9 col-12 pe-md-5 pe-0 text-center text-md-end">
                                <h2 class="py-3 text-white">{{ __('ui.titlePageUser') }} {{ $user->name }}</h2>
                                @if (Auth::user() && Auth::user()->id == $user->id)
                                    <a class="btn btnCustom mb-3"
                                        href="{{ route('edit_profile', ['user' => Auth::user()]) }}">{{ __('ui.profileModifie') }}</a>
                                @endif
                                @if ($user->is_revisor)
                                    <p class="text-white fs-5">{{ __('ui.rule') }}: {{ __('ui.revisor') }}
                                        <i class="ps-2 bi bi-vector-pen"></i>
                                    </p>
                                @elseif($user)
                                    <p class="text-white fs-5">{{ __('ui.rule') }}: Guest

                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row px-0">

                        <div class="col-md-4 col-12 borderBottom formCustomProfile2">
                            <h2 class="pt-3 text-white">{{ __('ui.whoIam') }}</h2>
                            <hr class="text-white">
                            <ul class="list-unstyled">
                                <li class="list-item pt-4 fs-5"><span class="text-white"><i
                                            class="bi bi-person-check-fill me-1"></i>{{ __('ui.nameAndSurname') }}:</span>
                                    {{ $profile ? $profile->name : '' }} </li>
                                <li class="list-item py-4 fs-5"><span class="text-white"><i
                                            class="bi bi-hash me-1"></i>{{ __('ui.age') }}:</span>
                                    {{ $profile ? $profile->age : '' }}</li>
                                <li class="list-item pb-4 fs-5"><span class="text-white"><i
                                            class="bi bi-reception-3 me-1"></i>{{ __('ui.myJob') }}:</span>
                                    {{ $profile ? $profile->work : '' }}</li>
                                <li class="list-item pb-4 fs-5"><span class="text-white"><i
                                            class="bi bi-globe me-1"></i>{{ __('ui.language') }}:</span>{{ $profile ? $profile->language : '' }}
                                </li>
                                <li class="list-item pb-4 fs-5"><span class="text-white"><i
                                            class="bi bi-house-heart-fill me-1"></i>{{ __('ui.residenza') }}:</span>
                                    {{ $profile ? $profile->from : '' }}</li>
                            </ul>
                            <h2 class="text-white">{{ __('ui.contactMe') }}</h2>
                            <hr class="text-white">

                            <p class="fs-5"><i
                                    class="bi bi-phone-vibrate text-white me-1"></i>{{ $profile ? $profile->contact : '' }}
                            </p>
                        </div>
                        <div
                            class="col-md-8 col-12 pb-2 borderBottom d-flex flex-column justify-content-center align-items-center">
                            @if (session('editProfileOk'))
                                <div>
                                    <p class="alert alert-warning mt-3 text-center"> {{ session('editProfileOk') }}
                                    </p>
                                </div>
                            @endif

                            <a class="mainColor pb-4 fs-1 btn" href="#articles"><i
                                    class="bi bi-chevron-double-down"></i></a>
                            <h2 class="list-item pb-5 text-center">{{ __('ui.aboutMe') }}:</h2>
                            <div class="row formCustomProfile2 mx-5  rounded-1">
                                @if ($profile && $profile->info)
                                    <p class="fs-5 text-white p-3 text-center">{{ $profile->info }}</p>
                                @else
                                    <p class="fs-5 text-white p-3 text-center">{{ __('ui.profileEditNot') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div id="articles" class="col-12">
                        <h2 class="text-md-end text-center pe-4 py-5"><i
                                class="mainColor bi bi-house-heart me-1"></i>{{ __('ui.titleProfileCard') }}

                        </h2>

                    </div>


                    @forelse ($houses as $house)
                        <div class="col-12 hCard col-md-5 col-lg-3 mx-3 my-3">
                            <div class="card cardBorder">

                                {{-- <img src="{{Storage::url($image->path)}}" class="card-img-top h-100" alt="Immagine annuncio">  --}}
                                {{-- togliere il commento --}}
                                <div class="cardBg" data-image="{{ Storage::url($house->images()->first()->path) }}">
                                </div>

                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title fw-bold">{{ $house->place }}</h5>
                                        {{-- <p class="btnLike" href=""><i
                                            class=" bi bi-suit-heart fs-5 mainColor"></i></p> --}}
                                    </div>
                                  

                                    <p class="card-text fs-6">
                                        <span class="fw-semibold">
                                            <i class="bi bi-house-heart-fill me-1 mainColor"></i>Location:


                                        </span>
                                        {{-- {{ $house->location->name }} --}}
                                        <x-locationTranslate :house="$house" />



                                    </p>
                                    <p class="card-text fs-6"><span class="fw-semibold fs-6">
                                            <i
                                                class="bi bi-currency-euro me-0 pe-0 mainColor"></i>{{ __('ui.price') }}:
                                        </span>{{ $house->price }}/{{ __('ui.night') }}
                                    </p>

                                    <div class="d-flex justify-content-between">
                                        <span class="d-flex align-items-center flex-md-row flex-column">
                                            <a href="{{ route('show', ['id' => $house->id]) }}"
                                                class="p-0 btn btnCard fs-6 text-center">
                                                <i
                                                    class="bi bi-chevron-compact-right mainColor"></i>{{ __('ui.detail') }}
                                            </a>
                                            @if (Auth::id() == $house->user_id)
                                                <a href="{{ route('edit', compact('house')) }}"
                                                    class="ms-1 p-0 btn btnCard fs-6 text-center">
                                                    <i
                                                        class="bi bi-chevron-compact-right mainColor"></i>{{ __('ui.editArticle') }}
                                                </a>
                                            @endif
                                        </span>
                                        <span class="d-flex align-items-center">
                                            <!-- Button trigger modal -->
                                            @if (Auth::id() == $house->user_id)
                                                <a type="button" class="btn btnCard" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                    <i class="bi bi-trash3 mainColor fs-4"></i>
                                                </a>
                                                <form id="form-delete" class="d-none" method=POST
                                                    action={{ route('deleteInProfile', compact('house')) }}>
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="col-12 my-3 d-flex justify-content-center align-items-center">
                            <div class="p-2 d-flex flex-column justify-content-center align-items-center">
                                <h2 class="mainColor text-center p-5"><i class="bi bi-tag-fill me-1"></i>{{ __('ui.noArticleinProfile') }}</h2>
                    
                            </div>
                        </div>
                    @endforelse
                </div>

            </div>
        </div>

    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content rounded-1">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('ui.deleteArticleModal') }} <i
                            class="fa-solid text-danger fa-triangle-exclamation"></i></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modalCustom">
                    <p class="fs-5">{{ __('ui.areYouSure?') }}</p>
                </div>

                <div class="modal-footer">
                    <a type="button" class="btn btnCard mainColor fs-6 text-uppercase fw-semibold"
                        data-bs-dismiss="modal">{{ __('ui.close') }}</a>
                    <a onclick="event.preventDefault();getElementById('form-delete').submit();"
                        class="btn btnCard text-danger rounded-1 fs-6 text-uppercase fw-semibold">
                        <span>{{ __('ui.deleteArticle') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <x-script-card />

</x-layout>
