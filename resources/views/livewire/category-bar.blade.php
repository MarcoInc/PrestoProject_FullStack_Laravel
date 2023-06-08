<div class="row bg-white">
    <div class="col-12">
        <div class="row justify-content-around py-2">
            @foreach ($locations as $location)
            <div class="col-1">
                <a class="text-decoration-none" href="{{route('categoryShow', compact('location'))}}">
                    <div class="borderCategory card " onmouseover="changeBorderColor(this)" onmouseout="resetBorderColor(this)" id="{{$location->id}}" >
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <div class=""><i class="fa-solid  {{$icons[$loop->index]}} fs-3"></i></div>
                            <p class="card-text fs-5">{{$location->name}}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>