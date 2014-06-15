@extends('template.main')

@section('content')
<div class="page-header">
    <h1>Nowa lokalizacja</h1>
</div>
<div class="row">
    <div class="col-md-12">
        {{ Form::open(['route' => 'localizations.store', 'method' => 'post']) }}

            <div class="form-group">
                <label for="name">Nazwa lokalizacji:</label>
                <input type="text" class="form-control" id="name" name="name" placeHolder="Tutaj wpisz nazwę nowej lokalizacji">
            </div>

            <div class="form-group">
                <label for="city">Miasto:</label>
                <input type="text" class="form-control" id="city" name="city" placeHolder="miasto">
            </div>
            <div class="form-group">
                <label for="street">Ulica:</label>
                <input type="text" class="form-control" id="street" name="street" placeHolder="ulica">
            </div>

            <div class="form-group">
                <div id="map-canvas" style="width:100%; height:400px; "></div>
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Dodaj lokalizację</button>
            </div>
            {{Form::hidden('lat', '', array('id' => 'lat'))}}
            {{Form::hidden('lng', '', array('id' => 'lng'))}}
        {{ Form::close() }}

    </div>
</div>
@stop

@section('headerJs')
@parent
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

        google.maps.event.addListener(mapa, 'click', function(event) {
            placeMarker(event.latLng);
        });

        var slat = $('#lat').val();
        var slng = $('#lng').val();

        if(slat != ''  && slng != ''){
            latlng = new google.maps.LatLng(slat,slng);
            placeMarker(latlng);
        }

    };

    function initListenerDrag(){
        google.maps.event.addListener(marker, "dragend", function(event) {
            var lat_d = event.latLng.lat();
            var lng_d = event.latLng.lng();
            $('#lat').val(lat_d);
            $('#lng').val(lng_d);
            var latlng = new google.maps.LatLng(lat_d, lng_d);
            geocoder.geocode( {'latLng': latlng}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {

                    infowindow.setContent(results[0].formatted_address);
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

                    //$('#id_kod_pocztowy').val(kod);

                    $("#city").val(adressA[1]);
                    $('#street').val(adressA[0]);

                }
            });
        });
    }

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
        $('#lat').val(location.lat());
        $('#lng').val(location.lng());
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
        initListenerDrag() ;

    }

    function lokalizacja_wyszukiwanie(){
        var slat = 0;
        var slng = 0;
        var address = $("#city").val()+' '+$('#street').val();
        geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                mapa.panTo(results[0].geometry.location);
                slat = results[0].geometry.location.lat();
                slng = results[0].geometry.location.lng();

                $('#lat').val(slat);
                $('#lng').val(slng);

                var latlng = new google.maps.LatLng(slat,slng);
                if(marker == null){
                    marker = new google.maps.Marker({
                        position: latlng,
                        draggable:true,
                        map: mapa,
                    });
                }else{
                    marker.setPosition(latlng);
                }

                infowindow.setContent(results[0].formatted_address);
                infowindow.open(mapa, marker);

                initListenerDrag() ;

                if( $('#street').val() == '')
                    mapa.setZoom(12);
                else
                    mapa.setZoom(16);
            } else {
                //alert("Nie można zlokalizować podanego adresu.");
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






        initialize();
        lokalizacja_wyszukiwanie();
        $('#city, #street').keyup(function() {
            delay( function() {
                lokalizacja_wyszukiwanie();
            }, 500);
        });


    });
</script>
@stop