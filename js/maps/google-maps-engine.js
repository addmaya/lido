(function($){
	function new_map( $el ) {
		var $markers = $el.find('.marker');
		var args = {
			zoom		: 8,
			center		: new google.maps.LatLng(0, 0),
			mapTypeId	: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
			scaleControl: false,
			draggable: false,
			mapTypeControl: false,
			streetViewControl: false,
			disableDefaultUI: true,
			styles: mapStyles
		}
		var map = new google.maps.Map( $el[0], args);	
		map.markers = [];
		$markers.each(function(){					
	    	add_marker( $(this), map );					
		});
		center_map( map );
		return map;	
	}

	function add_marker( $marker, map ) {
		var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
		var marker = new google.maps.Marker({
			position	: latlng,
			map			: map,
			icon: themeURL + '/images/map-marker-small.png'
		});

		map.markers.push( marker );
		if( $marker.html() )
		{
			var infowindow = new google.maps.InfoWindow({
				content		: $marker.html()
			});

			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open( map, marker );
			});
		}

	}

	function center_map( map ) {
		var bounds = new google.maps.LatLngBounds();
		$.each( map.markers, function( i, marker ){

			var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
			bounds.extend( latlng );
		});

		map.setZoom( 5 );

	}
})(jQuery);