<x-layout title="{{ __('ui.homeTitle') }}">


    <div class="container-fluid px-0">

        <div class="row p-0">
            <div class="col-12 pe-0 me-0">
                <!-- carosel -->
                <x-carousel />
                {{-- midlleware revisore --}}
                @if (session('access.denied'))
                    <div>
                        <p class="alert alert-warning mt-3 text-center"> {{ __('ui.accessDenied') }} </p>
                    </div>
                @endif

                @if (session('messageRevisorOK'))
                    <div>
                        <p class="alert alert-warning mt-3 text-center"> {{ session('messageRevisorOK') }} </p>
                    </div>
                @endif

                @if (session('messageNotFound'))
                    <div>
                        <p class="alert alert-warning mt-3 text-center"> {{ session('messageNotFound') }} </p>
                    </div>
                @endif

                @if (session('messageRevisor'))
                    <div>
                        <p class="alert alert-warning mt-3 text-center"> {{ session('messageRevisor') }} </p>
                    </div>
                @endif

                @if (session('messageBecomeRevisor'))
                    <div>
                        <p class="alert alert-warning mt-3 text-center"> {{ session('messageBecomeRevisor') }} </p>
                    </div>
                @endif

            </div>
        </div>


        <div id="scrollAnnunci" class="row transition me-0 mt-0 pt-0 position-sticky sticky-top borderRowHome">
            @livewire('category-bar')
        </div>

        <div class="row justify-content-center pt-5 pe-0 me-0">

            <!-- Swiper -->
            <div class="col-md-10 col-12 p-0">
                <div class="swiper">
                    <div class="swiper-wrapper">

                        @foreach ($guest_houses as $house)
                            <div class="swiper-slide mb-2">
                                <div class=" bg-light p-2 mx-2">

                                    <img src="{{ $house->images()->first()->getUrl(400, 300) }}" class="card-img-top"
                                        alt="">

                                    <div class="card-body  borderCardHome">
                                        <div class="text-start py-3">
                                            <h5 class="card-title fs-5 fw-semibold text-uppercase">{{ $house->place }}
                                            </h5>
                                        </div>

                                        <div class="d-flex">
                                            <p class="card-text mainColor fs-6 fw-semibold"><i
                                                    class="bi bi-house-heart-fill mainColor"></i>{{ __('ui.location') }}:
                                            </p>
                                            
                                            <p class="card-text fs-6">&nbsp;
                                                <x-locationTranslate :house="$house"/>         

                                            </p>


                                        </div>
                                        <div class="d-flex">
                                            <p class="fs-6 card-text mainColor fw-semibold"><i
                                                    class="bi bi-currency-euro mainColor"></i>{{ __('ui.price') }}:</p>
                                            <p class="card-text fs-6">{{ $house->price }}&euro;/{{ __('ui.night') }}
                                            </p>
                                        </div>
                                        <div class=" d-flex flex-md-row flex-column justify-content-between w-100">

                                            <p class="card-footer fs-6 mb-0 text-start"><span class="me-1"><i
                                                        class="bi bi-calendar-check mainColor"></i></span>{{ __('ui.publishAt') }}:
                                                {{ $house->created_at->format('d/m/Y') }}
                                            </p>

                                            <!--Detail-->
                                            <a href="{{ route('show', ['id' => $house->id]) }}"
                                                class="p-md-0 pt-3 ps-0 btn btnCard fs-6 text-start"><i
                                                    class="bi bi-chevron-compact-right mainColor"></i>{{ __('ui.detail') }}
                                            </a>
                                            <!--End Detail-->
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach

                    </div>


                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>


                </div>

            </div>


        </div>
    </div>


    <script>
        window.addEventListener('DOMContentLoaded', function() {
            let carousel = document.querySelector('.vhCarousel');
            let images = carousel.querySelectorAll('.fotoCarousel');

            function adjustImageHeight() {
                let carouselHeight = carousel.clientHeight;
                images.forEach(function(image) {
                    image.style.height = carouselHeight + 'px';
                });
            }

            adjustImageHeight();
            window.addEventListener('resize', adjustImageHeight);
        });
    </script>


</x-layout>
