var guestController = (function (){
    "use strict";

    // Google maps
    function _handleMaps(){
        var plautoLatlng = new google.maps.LatLng(-34.62175440, -58.43750780);
        var mapOptions = {
            center: plautoLatlng,
            zoom: 16,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

        var marker = new google.maps.Marker({
            position: plautoLatlng,
            map: map,
            title:"Entrada Plauto"
        });

        var churchLatlng = new google.maps.LatLng(-34.61473980, -58.42288020);
        var mapOptions = {
            center: churchLatlng,
            zoom: 16,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById('map_canvas2'), mapOptions);

        var marker = new google.maps.Marker({
            position: churchLatlng,
            map: map,
            title:"Iglesia"
        });
    }

    function _init(){
        _handleMaps();
    }

    return {
        init: _init
    };
})();

$(document).ready(function() {
    guestController.init();
});