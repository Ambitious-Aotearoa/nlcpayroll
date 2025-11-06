<?php
global $section;

$locations = $section['locations'];
$zoom      = $section['zoom'] ? $section['zoom']: 14;
?>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo get_field( 'google_api_key', 'options' ); ?>"></script>
<section <?php acfactory_section(); ?>>
	<div class="container">
		<div class="row">

			<?php $i = 1; ?>
			<?php foreach ( $locations as $item ) { ?>
				<?php
				$location = $item['location'];
				$title    = $item['title'];
				$content  = $item['content'];
				?>
				<div class="col-md-6">
					<div class="map-location__column">
						<div class="map-location">
							<div id="map-<?php echo $i; ?>" class="map-location__map">

							</div>
							<div class="map-location__body">
								<h2 class="map-location__title text-primary"><?php echo $title; ?></h2>
								<div class="map-location__content">
									<?php echo $content; ?>
								</div>
								<div class="map-location__actions">
									<a class="btn btn-arrow" href="http://www.google.com/maps/place/<?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>">view large map</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<?php if ( $location ) { ?>
					<?php $new_lat = floatval( $location['lat'] + 0.003 ); ?>
					<script type="text/javascript">
						google.maps.event.addDomListener(window, 'load', init_<?php echo $i; ?>);
						function init_<?php echo $i; ?>() {

							var locations_<?php echo $i; ?> = [
								[
									"<?php echo $title; ?>", 
									<?php echo $location['lat']; ?>, 
									<?php echo $location['lng']; ?>
								]
							];
							var bounds_<?php echo $i; ?> = new google.maps.LatLngBounds();

							var mapElement_<?php echo $i; ?> = document.getElementById('map-<?php echo $i; ?>');
							var map_<?php echo $i; ?> = new google.maps.Map(mapElement_<?php echo $i; ?>, {
								center: new google.maps.LatLng(<?php echo $new_lat . ', ' . $location['lng']; ?>),
								zoom: <?php echo $zoom; ?>,
								disableDefaultUI: true,
								styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
							});

							if (typeof locations_<?php echo $i; ?> !== 'undefined') {
								for (i = 0; i < locations_<?php echo $i; ?>.length; i++) {
									marker_<?php echo $i; ?> = new google.maps.Marker({
										position: new google.maps.LatLng(locations_<?php echo $i; ?>[i][1], locations_<?php echo $i; ?>[i][2]),
										map: map_<?php echo $i; ?>,
										title: locations_<?php echo $i; ?>[i][0],
										icon: {
											url: '<?php echo get_template_directory_uri(); ?>/dist/images/nlc-pin.png',
											scaledSize: new google.maps.Size(74,89)
										}
									});
								}
							}

						}
					</script>
				<?php } ?>
				<?php $i++; ?>
			<?php } ?>
		</div>
	</div>
</section>
