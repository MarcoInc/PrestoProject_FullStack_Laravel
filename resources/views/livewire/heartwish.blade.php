    @if($wishedItems->contains('house_id',$house->id)) {{--  REMOVE --}} 
        <div>
            <button wire:click="remove({{ $house->id }})" class="btnLike">
                <i class="bi {{$heart}} fs-5 mainColor"></i>
            </button>
        </div>

    @else {{--  ADD --}} 
        <div>
            <button wire:click="add({{ $house->id }})" class="btnLike">
                <i class="bi {{$heart}} fs-5 mainColor"></i>
            </button>
        </div>
    @endif
