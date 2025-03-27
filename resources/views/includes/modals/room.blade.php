<!-- Modal -->
<div class="modal fade" id="room{{ $room->id }}" tabindex="-1" aria-labelledby="roomModalLabel{{ $room->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-white text-white">
                <h1 class="modal-title fs-4 fw-bold" id="roomModalLabel{{ $room->id }}">{{ $room->title }}</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <!-- Gallery with Thumbnails -->
                <div class="row g-4">
                    @php
                        $images = json_decode($room->images);
                        $mainImage = $images[0] ?? null;
                    @endphp

                    @if(!empty($images) && is_array($images))
                        <!-- Main Image -->
                        <div class="col-lg-8">
                            <div class="main-image-container rounded-3 overflow-hidden shadow-sm" style="height: 400px;">
                                <img src="{{ asset(Voyager::image($mainImage)) }}" 
                                     alt="{{ $room->title }}"
                                     class="w-100 h-100 object-fit-cover"
                                     id="mainRoomImage{{ $room->id }}">
                            </div>
                        </div>

                        <!-- Thumbnails and Details -->
                        <div class="col-lg-4">
                            <!-- Thumbnail Gallery -->
                            <div class="thumbnail-gallery mb-4">
                                <div class="row g-2">
                                    @foreach($images as $key => $image)
                                        <div class="col-4 col-md-3 col-lg-6">
                                            <img src="{{ asset(Voyager::image($image)) }}" 
                                                 alt="Thumbnail {{ $key+1 }}"
                                                 class="img-thumbnail cursor-pointer"
                                                 style="height: 80px; width: 100%; object-fit: cover;"
                                                 onclick="document.getElementById('mainRoomImage{{ $room->id }}').src = this.src">
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Room Details -->
                            <div class="room-details">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="badge bg-success fs-6">{{ number_format($room->price, 0, ',', ' ') }} FCFA /nuit</span>
                                    @if($room->is_featured)
                                        <span class="badge bg-warning text-dark fs-6">Recommandé</span>
                                    @endif
                                </div>

                                <div class="amenities mb-4">
                                    <h5 class="fw-bold mb-3">Équipements</h5>
                                    <div class="d-flex flex-wrap gap-2">
                                        <span class="badge bg-light text-dark border"><i class="fas fa-wifi me-1"></i> WiFi</span>
                                        <span class="badge bg-light text-dark border"><i class="fas fa-tv me-1"></i> TV</span>
                                        <span class="badge bg-light text-dark border"><i class="fas fa-snowflake me-1"></i> Climatisation</span>
                                        <span class="badge bg-light text-dark border"><i class="fas fa-shower me-1"></i> Douche</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @else
                        <div class="col-12 text-center py-5">
                            <i class="fas fa-image fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Aucune image disponible</p>
                        </div>
                    @endif
                </div>
                <div class="room-description">
                    <h5 class="fw-bold mb-3">Description</h5>
                    <div class="text-muted">{!! $room->content !!}</div>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Fermer
                </button>
                <a href="mailto:hotelchicpalace@gmail.com?subject=Réservation - {{ $room->title }}" 
                   class="btn btn-success px-4">
                   <i class="fas fa-calendar-check me-2"></i>Réserver maintenant
                </a>
            </div>
        </div>
    </div>
</div>
