<x-layout title="{{Auth::user()->name}}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row justify-content-md-center ">
                        @forelse ($houses as $house)
                        <div class="col-12 hCard col-md-6 col-lg-3 mx-3 my-3">
                            <div class="card h-100 cardBorder">

                                {{-- <img src="{{Storage::url($image->path)}}" class="card-img-top h-100" alt="Immagine annuncio">  --}}
                            {{-- togliere il commento --}}
                                <div class="cardBg" data-image="{{Storage::url($house->images()->first()->path)}}"></div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title fw-bold">{{ $house->place }}</h5>
                                        {{-- <p class="btnLike" href=""><i
                                                class=" bi bi-suit-heart fs-5 mainColor"></i></p> --}}
                                    </div>
                                    @if($house->is_accepted === 0)
                                        <h5> <span class="badge bg-danger">{{__('ui.notApproved')}}</span></h5>
                                    @elseif($house->is_accepted === null)
                                        <h5> <span class="badge bg-warning">{{__('ui.inApprovation')}}</span></h5>
                                    @endif

                                <p class="card-text fs-5">
                                    <span class="fw-semibold">
                                        <i class="bi bi-house-heart-fill me-1 mainColor"></i>Location:
                                    </span>{{ $house->location->name }}</p>
                                <p class="card-text fs-5"><span class="fw-semibold fs-5">
                                    <i class="bi bi-currency-euro me-0 pe-0 mainColor"></i>{{__('ui.price')}}:
                                    </span>{{ $house->price }}/{{__('ui.night')}}
                                </p>

                                <div class="d-flex justify-content-between">
                                    <span class="d-flex align-items-center flex-md-row flex-column">
                                        <a href="{{ route('show', ['id' => $house->id]) }}"
                                                class="p-0 btn btnCard fs-5 text-center">
                                        <i class="bi bi-chevron-compact-right mainColor"></i>{{__('ui.detail')}}
                                        </a>
                                        @if (Auth::id() == $house->user_id)
                                            <a href="{{ route('edit', compact('house')) }}"
                                                class="ms-1 p-0 btn btnCard fs-5 text-center">
                                                <i class="bi bi-chevron-compact-right mainColor"></i>{{__('ui.editArticle')}}
                                            </a>
                                    </span>
                                            <span class="d-flex align-items-center">
                                                    <a onclick="event.preventDefault();getElementById('form-delete').submit();"
                                                        class="btn btnCard fs-5 fw-semibold">
                                                            <span><i class="bi bi-trash3 fs-3"></i>{{__('ui.deleteArticle')}}</span>
                                                    </a>
                                                <form id="form-delete" class="d-none" method=POST
                                                    action={{ route('delete', compact('house')) }}>
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
                        <div class="col-12">
                            <p>{{__('ui.notYetAnnouncements')}}</p>
                        </div>
                    @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    <x-script-card />
        
</x-layout>
    