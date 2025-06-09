<div class="booking-card p-4 p-md-5 shadow-lg rounded-4" data-aos="fade-up"
    style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(5px);">
    <h2 class="text-center mb-4 fw-bold" style="color: #1a4922;">Réservez Votre Séjour</h2>
    <p class="text-center mb-5">Remplissez le formulaire pour réserver votre chambre</p>

    <form action="{{ route('booking.send') }}" method="POST" class="row g-4">
        @csrf

        <!-- Nom -->
        <div class="col-md-6">
            <label for="lastname" class="form-label">Nom</label>
            <div class="input-group">
                <span class="input-group-text bg-success text-white">
                    <i class="bi bi-person-badge"></i>
                </span>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Nom" required>
            </div>
        </div>

        <!-- Prénoms -->
        <div class="col-md-6">
            <label for="firstname" class="form-label">Prénoms</label>
            <div class="input-group">
                <span class="input-group-text bg-success text-white">
                    <i class="bi bi-person"></i>
                </span>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Prénoms" required>
            </div>
        </div>

        <!-- Email -->
        <div class="col-md-6">
            <label for="email" class="form-label">Adresse email</label>
            <div class="input-group">
                <span class="input-group-text bg-success text-white">
                    <i class="bi bi-envelope"></i>
                </span>
                <input type="email" class="form-control" id="email" name="email" placeholder="exemple@adresse.com" required>
            </div>
        </div>

        <!-- Téléphone -->
        <div class="col-md-6">
            <label for="phone" class="form-label">Téléphone</label>
            <div class="input-group">
                <span class="input-group-text bg-success text-white">
                    <i class="bi bi-telephone"></i>
                </span>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="2289xxxxxxx" required>
            </div>
        </div>

        <!-- Chambre -->
        <div class="col-md-12">
            <label for="room_id" class="form-label">Nom de la chambre à louer</label>
            <div class="input-group">
                <span class="input-group-text bg-success text-white">
                    <i class="bi bi-door-closed"></i>
                </span>
                <select class="form-select" id="room_id" name="room_id" required>
                    <option selected disabled>Choisissez une chambre...</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->title }} -
                            {{ number_format($room->price, 0, ',', ' ') }} FCFA</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Bouton -->
        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-success w-100 py-3 fw-bold">
                <i class="bi bi-send-check me-2"></i> Envoyer la réservation
            </button>
        </div>
    </form>

    <div class="text-center mt-4">
        <p class="small text-muted mb-0">
            <i class="fas fa-phone-alt me-2"></i> Réservation rapide :
            <a href="tel:+{{ setting('site.contact') }}" class="text-success">{{ setting('site.contact') }}</a>
        </p>
    </div>
</div>
