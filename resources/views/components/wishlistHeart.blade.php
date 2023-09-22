    @if($wishedItems->contains('house_id',$house->id)) {{--  ADD --}}
        <a onclick="event.preventDefault();getElementById('#{{$house->id}}').submit()"
            class="btn form-reject fs-6" type='submit'>
        <p class="btnLike" href=""><i class=" bi bi-suit-heart-fill fs-5 mainColor"></i></p>
        <form id="#{{$house->id}}" class="d-none" method=POST
            action={{ route('removeWishlist', compact('house')) }}>
            @csrf
            @method('delete')
        </form>
    @else {{--  REMOVE --}}
        <a onclick="event.preventDefault();getElementById('#{{$house->id}}').submit()"
            class="btn form-reject fs-6" type='submit'>
        <p class="btnLike" href=""><i class=" bi bi-suit-heart fs-5 mainColor"></i></p>
        <form id="#{{$house->id}}" class="d-none" method=POST
            action={{ route('addWishlist', compact('house')) }}>
            @csrf
            @method('patch')
        </form>
    @endif
