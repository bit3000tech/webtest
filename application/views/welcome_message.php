<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		html, body { height: 100%; margin: 0; padding: 0; }
		#map { height: 100%; }
	</style>
</head>
<body>
<div id="map"></div>
<script type="text/javascript">

	var map;
	function initMap() {
		<?php
			if($ubicacion == null)
		 	{
		 ?>
		 		var centro = {lat: -1.6983978, lng: -78.5375932};
		 <?php
		 	}
		 	else
		 	{
		 ?>

				var centro = {lat: <?php echo $ubicacion->latitud ?>, lng: <?php echo $ubicacion->longitud ?>};
		<?php
			}
		?>


		map = new google.maps.Map(document.getElementById('map'),
		{
			center: centro,
			zoom: 8
		});
	}

</script>
<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcR6dAFJInE2K3JGEfWWVc5sIsrVPVQR8&callback=initMap">
</script>
</body>
</html>