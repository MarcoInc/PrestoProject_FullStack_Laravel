<x-layout title="{{ __('ui.wishlist') }}">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        {{-- Scritta sopra la tabella --}}
                        <h1 class="py-4 text-md-start text-center">
                            {{ $wishedItems ? __('ui.anyWishlist') : __('ui.noneWishlist') }}
                        </h1>
                    </div>

                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table   table-bordered borderRevisor shadow">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col"><i class="bi bi-card-list mainColor"></i></th>
                                        <th class="text-center" scope="col"><i class="bi bi-card-image mainColor"></th>
                                        <th class="text-center" scope="col"><i class="bi bi-heart-half mainColor"></th>
                                    </tr>
                                </thead>

                                <tbody class="table-group-divider mainColor">
                                    @foreach ($wishedItems as $item)
                                        <tr>
                                            <th class="text-center align-middle col-3" scope="row">
                                                <div>
                                                    <a href="{{ route('show', ['id' => App\Models\GuestHouse::find($item->house_id)->id]) }}"
                                                        class="btn pb-2">
                                                        <p class="fw-semibold mainColor">{{__("ui.place")}}</p>
                                                        {{App\Models\GuestHouse::find($item->house_id)->place}}
                                                    </a>
                                                </div>
                                                <p>{{App\Models\GuestHouse::find($item->house_id)->price}} €/{{__('ui.night')}}</p>
                                                <div>
                                                <a href="{{ route('userProfile', ['id' => App\Models\User::find($item->wishlist_id)->id]) }}"
                                                    class="btn pb-2">
                                                    <p class="fw-semibold mainColor">{{__("ui.createdBy")}}</p>
                                                   {{App\Models\User::find($item->wishlist_id)->name}}
                                                </div>
                                                </a>
                                                <div>
                                                    <p class="fw-semibold mainColor">{{ __('ui.addedWish') }}:</p>
                                                    <p class="fw-normal">
                                                        {{ $item->created_at->format('d/m/Y H:i') }}
                                                    </p>
                                                </div>                                        
                                            </th>

                                            <td class="text-center align-middle sizeTd">

                                                <div id="{{App\Models\GuestHouse::find($item->house_id)->id }}" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                    {{-- Immagini --}}
                                                    @foreach (App\Models\GuestHouse::find($item->house_id)->images as $image)
                                                        <div class="carousel-item  @if ($loop->first) active @endif">
                                                            <div class="row">
                                                                <div class="col-12 py-2">
                                                                    <img src="{{ $image->getUrl(400, 300) }}"
                                                                        class="img-fluid" alt="Immagini">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                        
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#{{ $item->id }}" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                            aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#{{ $item->id }}" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                            aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
                                            </td>    
                                            <td>
                                                <a onclick="event.preventDefault();getElementById('#{{$item->id}}').submit()"
                                                    class="btn form-reject fs-6" type='submit'>
                                                <h2 class="text-danger bi bi-x-lg mainColor"></h2>
                                                <form id="#{{$item->id}}" class="d-none" method=POST
                                                    action={{ route('removeWishlist', ['house'=>App\Models\GuestHouse::find($item->house_id)->id]) }}>
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </td>
                                                          
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
                function changeBorderColor(element) {
                    element.classList.add('hovered');
                }
                
                function resetBorderColor(element) {
                    element.classList.remove('hovered');
                }
                
                document.addEventListener("DOMContentLoaded", function() {
                    let cards = document.querySelectorAll(".cardBg");
                    
                    cards.forEach(function(card) {
                        let imgUrl = card.dataset.image;
                        card.style.backgroundImage = "url('" + imgUrl + "')";
                    });
                });
            </script> --}}
</x-layout>
