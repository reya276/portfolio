// Init Google map
var THEME_googlemap_init_obj = {};
var THEME_googlemap_styles = {
	'new1': [
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#e9e9e9"
            },
            {
                "lightness": 17
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f5f5f5"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 17
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 29
            },
            {
                "weight": 0.2
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 18
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f5f5f5"
            },
            {
                "lightness": 21
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#dedede"
            },
            {
                "lightness": 21
            }
        ]
    },
    {
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#ffffff"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "saturation": 36
            },
            {
                "color": "#333333"
            },
            {
                "lightness": 40
            }
        ]
    },
    {
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f2f2f2"
            },
            {
                "lightness": 19
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#fefefe"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#fefefe"
            },
            {
                "lightness": 17
            },
            {
                "weight": 1.2
            }
        ]
    }
]
};

function googlemap_init(dom_obj, coords) {
	"use strict";
	try {
		if (coords.latlng!=='') {
			var latlngStr = coords.latlng.split(',');
			var lat = latlngStr[0];//parseFloat(latlngStr[0]);
			var lng = latlngStr[1];//parseFloat(latlngStr[1]);
			var latlng = new google.maps.LatLng(lat, lng);
		} else
			var latlng = new google.maps.LatLng(0, 0);
		var id = dom_obj.id;
		THEME_googlemap_init_obj[id] = {};
		THEME_googlemap_init_obj[id].dom = dom_obj;
		THEME_googlemap_init_obj[id].point = coords.point;
		THEME_googlemap_init_obj[id].description = coords.description;
		THEME_googlemap_init_obj[id].title = coords.title;
		THEME_googlemap_init_obj[id].opt = {
			zoom: coords.zoom,
			center: latlng,
			scrollwheel: false,
			scaleControl: false,
			disableDefaultUI: false,
			panControl: true,
			zoomControl: true, //zoom
			mapTypeControl: false,
			streetViewControl: false,
			overviewMapControl: false,
			styles: THEME_googlemap_styles[coords.style ? coords.style : 'default'],
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};

		var custom_map = new google.maps.Geocoder();
		custom_map.geocode(coords.latlng!=='' ? {'latLng': latlng} : {"address": coords.address}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				THEME_googlemap_init_obj[id].address = results[0].geometry.location;
				googlemap_create(id);
			} else
				alert(THEMEREX_GEOCODE_ERROR + ' ' + status);
		});

		jQuery(window).resize(function() {
			if (THEME_googlemap_init_obj[id].map) THEME_googlemap_init_obj[id].map.setCenter(THEME_googlemap_init_obj[id].address);
		});

	} catch (e) {
		//alert(THEMEREX_GOOGLE_MAP_NOT_AVAIL);
	}
}

function googlemap_create(id) {
	"use strict";
	if (!THEME_googlemap_init_obj[id].address) return false;
	THEME_googlemap_init_obj[id].map = new google.maps.Map(THEME_googlemap_init_obj[id].dom, THEME_googlemap_init_obj[id].opt);
	THEME_googlemap_init_obj[id].map.setCenter(THEME_googlemap_init_obj[id].address);
	var markerInit = {
		map: THEME_googlemap_init_obj[id].map,
		position: THEME_googlemap_init_obj[id].address	//THEME_googlemap_init_obj[id].map.getCenter()
	};
	if (THEME_googlemap_init_obj[id].point) markerInit.icon = THEME_googlemap_init_obj[id].point;
	if (THEME_googlemap_init_obj[id].title) markerInit.title = THEME_googlemap_init_obj[id].title;
	var marker = new google.maps.Marker(markerInit);
	var infowindow = new google.maps.InfoWindow({
		content: THEME_googlemap_init_obj[id].description
	});
	google.maps.event.addListener(marker, "click", function() {
		infowindow.open(THEME_googlemap_init_obj[id].map, marker);
	});
}


function googlemap_refresh(){
    for(id in THEME_googlemap_init_obj){
        googlemap_create(id)
    }
}

jQuery(document).ready(function() {
	jQuery('.googlemap').each(function(){
		var map_address = jQuery(this).data('address');
		var map_latlng = jQuery(this).data('latlng');
	 	var map_id = jQuery(this).attr('id');
 		var map_zoom = jQuery(this).data('zoom');
 		var map_style = jQuery(this).data('style');
		var map_descr = jQuery(this).data('description');
		var map_title = jQuery(this).data('title');
 		var map_point = jQuery(this).data('point');
		googlemap_init( jQuery('#'+map_id).get(0), {address: map_address , latlng: map_latlng, style: map_style, zoom: map_zoom, description: map_descr, title: map_title, point: map_point});
	});
});