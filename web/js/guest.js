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

    function _loadjPhotoGrid(){
        $('#usGridGallery').jphotogrid({
            baseCSS: {
                width: '150px',
                height: '90px',
                padding: '0px'
            },
            selectedCSS: {
                top: '65px',
                left: '25px',
                width: '400px',
                height: '225px',
                padding: '0px'
            }
        });
    }

    function _getDaysHoursMinSecFromMilliseconds(returnObj){
        var t = _getMillisecondsTillEnd();

        var cd = 24 * 60 * 60 * 1000,
            ch = 60 * 60 * 1000,
            cm = 60 * 1000,
            d = Math.floor(t / cd),
            h = '0' + Math.floor( (t - d * cd) / ch),
            m = '0' + Math.floor( (t - d * cd - h * ch) / cm),
            s = '0' + Math.round( (t - d * cd - h * ch - m * cm) / 1000);

        if (returnObj) {
            return {
                days: d,
                hours: h.substr(-2),
                minutes: m.substr(-2),
                seconds: s.substr(-2)
            }
        } else {
            return [d, h.substr(-2), m.substr(-2), s.substr(-2)].join(':');
        }
    }

    function _getMillisecondsTillEnd(){
        var firstDate = new Date();
        var secondDate = new Date("September 21, 2012 20:30:00");

        var diffMillisecs = secondDate.getTime() - firstDate.getTime();

        return diffMillisecs;
    }

    function _init(){
        _handleMaps();
        _loadjPhotoGrid();
    }

    return {
        init: _init,
        getDaysHoursMinSecs: _getDaysHoursMinSecFromMilliseconds
    };
})();

$(document).ready(function() {
    guestController.init();
});