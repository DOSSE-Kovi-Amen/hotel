<!-- Modal -->
<div class="modal fade" id="room{{ $room->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog .modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $room->title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container my-4">
                    <div class="row g-3">
                        @php
                            $images = json_decode($room->images); // Utilisez json_decode() ou explode(',', ...) selon votre format
                        @endphp

                        @if(!empty($images) && is_array($images))
                            @foreach($images as $image)
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                    <div class="card border-0">
                                        <img style="object-fit: cover; width:100%; height:200px"
                                             src="{{ asset(Voyager::image($image)) }}"
                                             alt="{{ $room->title }}"
                                             class="card-img-top">
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-center">Aucune image disponible</p>
                        @endif
                    </div>
                </div>

                <p style="color: black;font-weight: bold">Prix: {{ $room->price }}</p>


                {!! $room->content !!}
            </div>
            <div class="modal-footer">
                <a href="mailto:hotelchicpalace@gmail.com" class="btn btn-success" class="btn btn-secondary">Réserver</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>
