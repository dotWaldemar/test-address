@extends('main')

@section('form')

@if ($message = Session::get('message'))
    <p style="color: green">{{ $message }}</p>
@endif

@if ($errors->any())
    <strong style="color: red">Whoops!</strong> There were some problems with your input.<br>
    <ul>
        @foreach ($errors->all() as $error)
            <li style="color: red">{{ $error }}</li>
        @endforeach
    </ul>
    <br>
@endif

<form action="/create" method="POST">
    {{ csrf_field() }}
    <div class="field">
        <label>Name *</label>
        <input type="text" name="name" value="{{ old('name') }}" palceholder="" class="vl_empty" />
    </div>

    <div class="field">
        <label>Street</label>
        <input type="text" id="route" name="street" value="{{ old('route') }}" palceholder="" onFocus="geolocate()" class="vl_empty" />
    </div>

    <div class="field">
        <label>Your city *</label>
        <input type="text" name="city" value="{{ old('city') }}" placeholder="" class="vl_empty" id="locality" />
    </div>
    
    <div class="field">
        <label>Your area *</label>
        <input type="text" value="{{ old('area') }}" name="area" id="administrative_area_level_1" />
    </div>
    
    <div class="field">
        <label>House # </label>
        <input type="text" name="house" value="{{ old('house') }}" palceholder="House Name / Number" id="street_number" />
    </div>
    
    <div class="field">
        <label name="additional_information" class="pos_top">Additional information</label>
        <textarea name="additional_information">{{ old('additional_information') }}</textarea>
    </div>
    
    <div class="field">
        <input type="submit" value="add address" class="green_btn" />
    </div>
</form>

<script>

    var placeSearch, autocomplete;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
    };

    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('route')),
            {types: ['geocode']});

        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {

        var place = autocomplete.getPlace();

        for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
        }

        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
            }
        }
    }

    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }
</script>

<script src="///maps.googleapis.com/maps/api/js?key=AIzaSyCDlwSdZDNFS-QRo7mIeJOewvTJFJcve4s&libraries=places&callback=initAutocomplete" async defer></script>
@endsection

@section('addresses')
<div class="uo_adr_list">
    @foreach($addresses as $address)
        <div class="item">
            <h3>{{ $address->name }} Address</h3>
            <p>
                {{ $address->city . ', ' }}
                {{ $address->area . ', ' }}
                {{ $address->street }}
                {{ $address->house }}
            </p>
            <p>
                {{ $address->additional_information }}
            </p> 
            <div class="actbox">
                <a href="/destroy/{{ $address->id }}" class="bcross"></a>
            </div>
        </div>
    @endforeach
</div>
@endsection