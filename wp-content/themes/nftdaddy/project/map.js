(function ($, root, undefined) {

    $(function () {

        'use strict';

        function new_map($el) {    
            
            console.log($el);
            // var
            var $markers = $el.find('.marker');
            var bounds = new google.maps.LatLngBounds();
            // vars
            var args = {
                zoom: 10,
              //  styles: style,
                center: new google.maps.LatLng(10.799280, 106.746680), // Amsterdam
              //  mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            

            // create map
            var map = new google.maps.Map(document.getElementById("map"), args);
            // add a markers reference
            map.markers = [];
            // add markers
            $markers.each(function () {
                add_marker($(this), map);
                var latlng = new google.maps.LatLng($(this).attr('data-lat'), $(this).attr('data-lng'));
                bounds.extend(latlng);

            });
          //  map.setCenter(bounds.getCenter());
          //  map.fitBounds(bounds);
            map.setZoom(10);
            // center map
           // center_map(map);

            // return
            return map;

        }

        function add_marker($marker, map) {

            var linkIcon = $marker.attr('data-maker');
            // var
            var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));

            // create marker
            var marker = new google.maps.Marker({
                position: latlng,
                map: map,                
            });
            marker['infowindow'] = new google.maps.InfoWindow({
            content: '<b>'+$marker.attr('data-text')+'</b><br>'+ 'Hotline: '+ $marker.attr('data-hotline')
        });
            google.maps.event.addListener(marker, 'click', function() {
                this['infowindow'].open(map, this);
            });
            // add to array
            map.markers.push(marker);
            marker.setIcon(linkIcon);
        }

        function center_map(map) {
            // vars
            var bounds = new google.maps.LatLngBounds();
            // loop through all markers and create bounds
            $.each(map.markers, function (i, marker) {
                var latlng = new google.maps.LatLng(marker.attr('data-lat'), $marker.attr('data-lng'));
                bounds.extend(latlng);
            });
            // fit to bounds
            map.setCenter(bounds.getCenter());
            map.fitBounds(bounds);
            map.setZoom(11);
        }

        var map = null;

        $(document).ready(function () {
            $('.contact-sec').each(function () {              
                new_map($(this));
              
            });           
        });

    });
})(jQuery, this);
