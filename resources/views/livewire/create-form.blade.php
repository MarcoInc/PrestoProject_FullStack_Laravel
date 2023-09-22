<form wire:submit.prevent="store" enctype="multipart/form-data">
    @if (session('messageProductCreate'))
        <div>
            <p class="alert alert-warning">{{ session('messageProductCreate') }}</p>
        </div>
    @endif

    <div class="row">

        <div class="col-md-4 col-12">
            <div class="mb-3">
                <label for="place" class="form-label text-white fw-bold">{{ __('ui.place') }}</label>
                <input class="form-control @error('place') is-invalid @enderror" placeholder="{{ __('ui.whereIsIt') }}"
                    wire:model.lazy="place" type="text" id="place">
                @error('place')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label text-white fw-bold">{{ __('ui.description') }}</label>
                <textarea placeholder="{{ __('ui.smallDescription') }}" class="form-control @error('description') is-invalid @enderror"
                    wire:model.debounce.500ms="description" id="description" cols="30" rows="10"></textarea>
                @error('description')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label text-white fw-bold">{{ __('ui.priceNight') }}</label>
                <input placeholder="&euro;" type="number" step="0.01"
                    class="form-control @error('price') is-invalid  @enderror" wire:model.lazy="price" id="price">
                @error('price')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-check-label text-white fw-bold" for="location_id">{{ __('ui.location') }}</label>
                <select wire:model="location_id" id="location_id"
                    class="form-control @error('location_id') is-invalid  @enderror">
                    <option value="">{{ __('ui.locationChoice') }}</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}">
                            {{ __(sprintf('locations.%s', $location->id)) }}
                        </option>
                       
                    @endforeach
                </select>
                @error('location_id')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="beds" class="form-label text-white fw-bold">{{ __('ui.bedsPlace') }}</label>
                <input placeholder="{{ __('ui.howManyPeople') }}" wire:model.lazy="beds" type="number"
                    step="1" class="form-control @error('beds') is-invalid  @enderror" id="beds">
                @error('beds')
                    <p>{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="col-md-8 col-12">

            <div class="mb-3">
                <label for="images" class="text-white fw-bold fs-5 pt-4">{{ __('ui.uploadImg') }}</label>
                <input id="images" wire:model='temporary_images' type="file" name='images' multiple
                    class="d-none form-control shadow">

                @error('temporary_images.*')
                    <p class="text-danger mt-2">{{ $message }}</p>
                @enderror
              
                @error('images')
                    <p class="text-danger mt-2">{{ $message }}</p>
                @enderror
            </div>
            @if (!empty($images))
                <div class="row justify-content-center">
                    <div class="col-md-8 col-12">
                        <p class="text-white fw-bold">Preview:</p>
                        <div class="row border border-4 border-white py-4">
                            @foreach ($images as $key => $image)
                                <div class="col my-3">
                                    <div class="img-preview mx-auto rounded"
                                        style="background-image: url({{ $image->temporaryUrl() }});"></div>
                                    <button type="button"
                                        class="btn btn-danger btn-small d-block text-center mt-2 mx-auto "
                                        wire:click="removeImage({{ $key }})">{{__('ui.deleteArticle')}}</button>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            @else
                <div class="row vhCustom">
                    <div class="col-12 d-flex justify-content-center align-items-center">
                        <button class="btn border border-white display-1"
                            onclick="event.preventDefault();document.getElementById('images').click()">

                            <i class="bi bi-file-earmark-plus-fill display-1 text-white"></i>
                        </button>

                    </div>


                </div>
            @endif

        </div>

        <div class="col-12 text-center m-1">
            <button id="scrollUpBtn" type="submit" class="btn btnCustom">{{ __('ui.createArticle') }}</button>
        </div>

    </div>

    <script>
        let scrollUpButton = document.getElementById("scrollUpBtn");

        scrollUpButton.addEventListener("click", function() {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>


</form>
