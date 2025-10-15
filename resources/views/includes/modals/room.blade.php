<!-- Modal -->
<div class="modal fade" id="room{{ $room->id }}" tabindex="-1" aria-labelledby="roomModalLabel{{ $room->id }}"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content border-0 shadow-lg">
            
            <div class="modal-header bg-white">
                <h1 class="modal-title fs-4 fw-bold" id="roomModalLabel{{ $room->id }}">{{ $room->title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body p-4">
                @php
                    $mainImage = $room->image; // Image principale
                    $images = json_decode($room->images); // Galerie d’images
                    $videos = json_decode($room->video); // Liste des vidéos (ou images ajoutées en champ vidéo)
                @endphp

                {{-- Image principale --}}
                @if ($mainImage)
                    <div class="main-image-container rounded-3 overflow-hidden shadow-sm mb-4" style="height: 450px;">
                        <img src="{{ asset(Voyager::image($mainImage)) }}" 
                             alt="{{ $room->title }}" 
                             class="w-100 h-100 object-fit-cover rounded">
                    </div>
                @endif

                {{-- Description --}}
                <div class="room-description mb-5">
                    <h5 class="fw-bold mb-3">Description</h5>
                    <div class="text-muted">{!! $room->content !!}</div>
                </div>

                {{-- Galerie d’images en colonnes --}}
                @if (!empty($images) && is_array($images))
                    <h5 class="fw-bold mb-3">Galerie</h5>
                    <div class="row g-3 mb-5">
                        @foreach ($images as $img)
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="rounded-3 overflow-hidden shadow-sm">
                                    <img src="{{ asset(Voyager::image($img)) }}" 
                                         alt="Image chambre" 
                                         class="w-100 h-100 object-fit-cover" 
                                         style="height: 180px;">
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- Vidéo --}}
                @if (!empty($videos) && is_array($videos))
                    <div class="room-video mt-4">
                        <h5 class="fw-bold mb-3">Vidéo de présentation</h5>
                        @foreach ($videos as $vid)
                            @php
                                $videoPath = $vid->download_link ?? null;
                            @endphp
                            @if ($videoPath)
                                <div class="ratio ratio-16x9 mb-4 rounded shadow-sm">
                                    <video controls class="w-100 rounded">
                                        <source src="{{ asset('storage/' . $videoPath) }}" type="video/mp4">
                                        Votre navigateur ne supporte pas la lecture vidéo.
                                    </video>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Fermer
                </button>
                <a href="#" class="btn btn-success px-4" onclick="handleReservationClick(event)">
                    <i class="fas fa-calendar-check me-2"></i>Réserver maintenant
                </a>
            </div>
        </div>
    </div>
</div>
