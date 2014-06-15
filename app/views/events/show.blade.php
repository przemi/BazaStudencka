<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel">Szczegóły lokalizacji</h4>
</div>
<div class="modal-body" style="overflow:hidden;">
    <form class="form-horizontal" role="form">
        <div class="form-group">
            <label class="col-sm-4 control-label">Nazwa wydarzenia:</label>
            <div class="col-sm-8">
                <p class="form-control-static">{{ $event->name }}</p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 control-label">Termin wydarzenia:</label>
            <div class="col-sm-8">
                <p class="form-control-static">{{ substr($event->date, 0, -9) }}</p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 control-label">Opis wydarzenia:</label>
            <div class="col-sm-8">
                <p class="form-control-static">{{ $event->info }}</p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 control-label">Lokalizacja wydarzenia:</label>
            <div class="col-sm-8">
                <p class="form-control-static">{{ $event->localization()->first()->name }} - {{ $event->localization()->first()->city }} {{ $event->localization()->first()->street }}</p>
            </div>

        </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <div id="map-canvas" style="width:100%; height:400px; "></div>
                </div>
            </div>


        {{Form::hidden('lat', $event->localization()->first()->lat , array('id' => 'lat'))}}
        {{Form::hidden('lng', $event->localization()->first()->lng , array('id' => 'lng'))}}

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

                //$('#code').val(kod);

                $("#city").val(adressA[1]);
                $('#street').val(adressA[0]);


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