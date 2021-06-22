<script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/jquery.ui.map.js" type="text/javascript"></script>
	
<script type="text/javascript">
    $(function() {
        var latlng = new google.maps.LatLng(59.3426606750, 18.0736160278);
        $('#map_canvas').gmap({'center': latlng, 'callback': function () {
                $('#map_canvas').gmap('addMarker', {'position': latlng, 'title': 'Hello world!'});
            }
        });
    });
</script>

<div id="map_canvas" style="height:196px; width:260px;"></div>