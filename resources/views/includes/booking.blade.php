<!-- Booking Section -->
<section id="booking" class="py-5" style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url({{ asset('pexels-pixabay-164595.jpg') }});
 background-size: cover; background-position: center; background-attachment:fixed">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="booking-card p-4 p-md-5 shadow-lg rounded-4" data-aos="fade-up" style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(5px);">
                    <h2 class="text-center mb-4 fw-bold" style="color: #1a4922;">Réservez Votre Séjour</h2>
                    <p class="text-center mb-5">Découvrez le luxe et le confort de nos chambres exceptionnelles</p>
                    
                    <form class="row g-4">
                        <div class="col-md-6">
                            <label for="check-in" class="form-label">Arrivée</label>
                            <div class="input-group">
                                <span class="input-group-text bg-success text-white"><i class="fas fa-calendar-day"></i></span>
                                <input type="date" class="form-control" id="check-in" required>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="check-out" class="form-label">Départ</label>
                            <div class="input-group">
                                <span class="input-group-text bg-success text-white"><i class="fas fa-calendar-times"></i></span>
                                <input type="date" class="form-control" id="check-out" required>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <label for="adults" class="form-label">Adultes</label>
                            <select class="form-select" id="adults">
                                <option value="1">1 Adulte</option>
                                <option value="2" selected>2 Adultes</option>
                                <option value="3">3 Adultes</option>
                                <option value="4">4 Adultes</option>
                            </select>
                        </div>
                        
                        <div class="col-md-4">
                            <label for="children" class="form-label">Enfants</label>
                            <select class="form-select" id="children">
                                <option value="0" selected>Aucun</option>
                                <option value="1">1 Enfant</option>
                                <option value="2">2 Enfants</option>
                            </select>
                        </div>
                        
                        <div class="col-md-4">
                            <label for="room-type" class="form-label">Type de Chambre</label>
                            <select class="form-select" id="room-type">
                                <option selected>Choisissez...</option>
                                @foreach($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->title }} - {{ number_format($room->price, 0, ',', ' ') }} FCFA</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-success w-100 py-3 fw-bold">
                                <i class="fas fa-search me-2"></i> Vérifier la Disponibilité
                            </button>
                        </div>
                    </form>
                    
                    <div class="text-center mt-4">
                        <p class="small text-muted mb-0">
                            <i class="fas fa-phone-alt me-2"></i> Pour les réservations immédiates : 
                            <a href="tel:+{{setting('site.contact')}}" class="text-success">{{setting('site.contact')}}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
