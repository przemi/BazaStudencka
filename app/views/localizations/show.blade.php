<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel">Szczegóły lokalizacji</h4>
</div>
<div class="modal-body" style="overflow:hidden;">
    <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-sm-4 control-label">Nazwa lokalizacji:</label>
                <div class="col-sm-8">
                    <p class="form-control-static">{{ $localization->name }}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label">Miasto:</label>
                <div class="col-sm-8">
                    <p class="form-control-static">{{ $localization->city }}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Ulica:</label>
                <div class="col-sm-8">
                    <p class="form-control-static">{{ $localization->street }}</p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <div id="map-canvas" style="width:100%; height:400px; "></div>
                </div>
            </div>

            {{Form::hidden('lat', $localization->lat , array('id' => 'lat'))}}
            {{Form::hidden('lng', $localization->lng , array('id' => 'lng'))}}
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
</div>



<script type="text/javascript" >

    var mapa;
    var geocoder = new google.maps.Geocoder();
    var marker ;
    var infowindow = new google.maps.InfoWindow();

    function initialize() {

        var myOptions = {
            zoom: 7,
            scrollwheel: true,
            navigationControl: false,
            mapTypeControl: false,
            center: new google.maps.LatLng(52.528846,17.071874),
        };

        mapa = new google.maps.Map(document.getElementById('map-canvas'), myOptions);



        var slat = $('#lat').val();
        var slng = $('#lng').val();

        if(slat != ''  && slng != ''){
            latlng = new google.maps.LatLng(slat,slng);
            placeMarker(latlng);
            console.log(latlng);
        }

    };


    function placeMarker(location) {
        if ( marker ) {
            marker.setPosition(location);
        } else {
            marker = new google.maps.Marker({
                position: location,
                draggable:true,
                map: mapa
            });
        }
        geocoder.geocode( {'latLng': location}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {

                infowindow.setContent('<div style="height:30px;">'+results[0].formatted_address+'</div>');
                infowindow.open(mapa, marker);

                var adressA = results[0].formatted_address.split(', ');

                var kod = adressA[1];
                var rx = /\d\d-\d\d\d/;
                var wynik = rx.exec(kod);
                if (wynik)
                {
                    kod = wynik[0];
                    adressA[1] = adressA[1].replace(rx, '');
                    adressA[1] = $.trim(adressA[1]);
                }
                else
                {
                    kod = '';
                }
            }
        });

    }

    var delay = ( function() {
        var timer = 0;
        return function(callback, ms) {
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
        };
    })();

    $(document).ready(function(){
        $('form').bind("keyup keypress", function(e) {
            return e.which !== 13
        });

        setTimeout(function(){
            initialize();
        }, 500);



    });
</script>