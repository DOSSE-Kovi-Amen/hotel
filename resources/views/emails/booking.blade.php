<h2>Nouvelle demande de réservation</h2>

<p><strong>Nom :</strong> {{ $booking['lastname'] }}</p>
<p><strong>Prénoms :</strong> {{ $booking['firstname'] }}</p>
<p><strong>Email :</strong> {{ $booking['email'] }}</p>
<p><strong>Téléphone :</strong> {{ $booking['phone'] }}</p>
<p><strong>ID Chambre :</strong> {{ $booking['room_id'] }}</p>
<p><a href="{{url('/admin/rooms/'.$booking['room_id'])}}">{{url('/admin/rooms/'.$booking['room_id'])}}</a></p>