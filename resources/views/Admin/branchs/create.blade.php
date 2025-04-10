@extends('Admin.layout')
@section('pagetitle', __('trans.branches'))


@section('content')
<form method="POST" action="{{ route('admin.branches.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="form-group col-md-6">
            <label for="title_ar">@lang('trans.title_ar')</label>
            <input type="text" name="title_ar" id="title_ar" class="form-control" required >
        </div>
        <div class="form-group col-md-6">
            <label for="title_en">@lang('trans.title_en')</label>
            <input type="text" name="title_en" id="title_en" class="form-control" required >
        </div>
        <div class="form-group col-md-6">
            <label for="address_ar">@lang('trans.address_ar')</label>
            <input type="text" name="address_ar" id="address_ar" class="form-control" required >
        </div>
        <div class="form-group col-md-6">
            <label for="address_en">@lang('trans.address_en')</label>
            <input type="text" name="address_en" id="address_en" class="form-control" required >
        </div>

        <div class="form-group col-md-6">
            <label for="phone">@lang('trans.phone')</label>
            <input type="text" name="phone" id="phone" class="form-control"  >
        </div>
        <div class="form-group col-md-6">
            <label for="whatsapp">@lang('trans.whatsapp')</label>
            <input type="text" name="whatsapp" id="whatsapp" class="form-control"  >
        </div>
        <div class="form-group col-md-6">
            <label for="email">@lang('trans.email')</label>
            <input type="text" name="email" id="email" class="form-control"  >
        </div>


        <div class="form-group col-md-6">
            <label for="country_id">@lang('trans.country')</label>
            <select class="form-control"  id="country_id" name="country_id">
                <option disabled hidden selected>@lang('trans.Select')</option>
                @foreach ($countries as $country)
                    <option  value="{{ $country->id }}">{{ $country->title() }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="region_id">@lang('trans.regions')</label>
            <select class="form-control selectpicker border"  data-live-search="true"  id="region_id" name="region_id">
               
            </select>
        </div>
        {{-- <div class="form-group col-md-6">
            <label for="categories">@lang('trans.categories')</label>
            <select class="form-control selectpicker border" id="categories"  multiple name="categories[]">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title() }}</option>
                @endforeach
            </select>
        </div> --}}
        {{--
        <div class="form-group col-md-6">
            <label for="products">@lang('trans.products')</label>
            <select class="form-control selectpicker border" id="products" required multiple name="products[]">
                @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->title() }}</option>
                @endforeach
            </select>
        </div>
        --}}
        {{-- <div class="form-group col-md-6">
            <label for="delivery">@lang('trans.Delivery')</label>
            <select class="form-control" required id="delivery" name="delivery">
                <option value="1">@lang('trans.yes')</option>
                <option value="0">@lang('trans.no')</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="pickup">@lang('trans.Pickup')</label>
            <select class="form-control" required id="pickup" name="pickup">
                <option value="1">@lang('trans.yes')</option>
                <option value="0">@lang('trans.no')</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="dinein">@lang('trans.dinein')</label>
            <select class="form-control" required id="dinein" name="dinein">
                <option value="1">@lang('trans.yes')</option>
                <option value="0">@lang('trans.no')</option>
            </select>
        </div> --}}
        <div class="form-group col-md-6">
            <label for="visibility">@lang('trans.visibility')</label>
            <select class="form-control" required id="visibility" name="status">
                <option value="1">@lang('trans.yes')</option>
                <option value="0">@lang('trans.no')</option>
            </select>
        </div>
        {{-- <input readonly type="hidden" name="lat" id="lat" class="form-control" required>
        <input readonly type="hidden" name="long" id="long" class="form-control" required> --}}


        <div class="clearfix"></div>
        {{-- <div class="text-center col-12 mx-auto  mt-3">
            <label class="control-label text-danger">
                @lang('trans.description')
            </label>
        </div>
        <div class="openclose text-center col-12 mx-auto">
            <div class="row item">
                <div class="form-group  col-md-4 col-sm-12">
                    <label>@lang('trans.day')</label>
                    <select class="form-control border" id="day_id">
                        <option value="" selected hidden disabled>------</option>
                        @foreach ($Days as $Day)
                            <option value="{{ $Day->id }}">{{ $Day->title() }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group  col-md-3 col-sm-12">
                    <label>@lang('trans.open')</label>
                    <input type="time" placeholder="@lang('trans.open')" id="open" class="form-control text-center">
                </div>
                <div class="form-group  col-md-3 col-sm-12">
                    <label>@lang('trans.close')</label>
                    <input type="time" placeholder="@lang('trans.close')" id="close" class="form-control text-center">
                </div>

                <div class="form-group  col-md-2 col-sm-12">
                    <label>@lang('trans.add')</label>
                    <button id="add_desc" class="main-btn waves-effect waves-light w-100" type="button">+</button>
                </div>
            </div>
        </div> --}}

        {{-- <div class="form-group col-12 my-3">
            <div class="col-md-12" id="map" style="height: 500px;width: 100%"></div>
        </div> --}}

        <div class="clearfix"></div>
        <div class="col-12 my-4">
            <div class="button-group">
                <button type="submit" class="main-btn btn-hover w-100 text-center">
                    {{ __('trans.Submit') }}
                </button>
            </div>
        </div>
    </div>
</form>

@include('Admin.MultiSelect')
@endsection



@push('js')
    <script>
        $(document).on("click", "#add_desc", function() {
            if($('#open').val() && $('#close').val()){
                $('<div class="row my-3">' +
                    '<div class="col-md-4 col-sm-12">' +
                        '<label>@lang("trans.day")</label>' +
                        '<input value="' + $('#day_id').children(':selected').val() + '" readonly class="form-control" name="days[]" type="hidden" >' +
                        '<input value="' + $('#day_id').children(':selected').text() + '" readonly class="form-control" type="text" >' +
                    '</div>' +
                    '<div class="col-md-3 col-sm-12">' +
                        '<label>@lang("trans.open")</label>' +
                        '<input value="' + $('#open').val() + '" class="form-control" name="open[]"  type="text" required >' +
                    '</div>' +
                    '<div class="col-md-3 col-sm-12">' +
                        '<label>@lang("trans.close")</label>' +
                        '<input value="' + $('#close').val() + '" class="form-control" name="close[]"  type="text" required >' +
                    '</div>' +
                    '<div class="col-md-2 col-sm-12">' +
                        '<button class="btn btn-dark mt-4 w-100" type="button">-</button>' +
                    '</div>' +
                '</div>').insertAfter(".openclose .item");
                $('#open').val('');
                $('#close').val('');
            }
        });
        $(document).on('click', '.btn-dark', function() {
            $(this).parent().parent().remove();
        });
        $(document).on('click', 'input[type="checkbox"]', function() {
            $(this).parent().parent().find("input[type='text']").val('');
            $(this).parent().parent().find("i").toggleClass('bg-danger-900 bg-success-900');
            $(this).parent().parent().find("i").toggleClass('fa-xmark fa-check');
            $(this).parent().parent().find("input[type='text']").prop('disabled', function(i, v) { return !v; });
        });
    </script>

       <script>
        let map;
        let marker;
        let geocoder;
        let response;
        
        function initMap() {
          var haightAshbury = {lat: 26.0667, lng: 50.5577};
          map = new google.maps.Map(document.getElementById("map"), {
            zoom: 8,
            center: haightAshbury,
            mapTypeControl: false,
          });
          geocoder = new google.maps.Geocoder();
    
          const inputText = document.createElement("input");
          inputText.type = "text";
          inputText.placeholder = "{{ __('trans.pick_your_location') }}";
    
          const submitButton = document.createElement("input");
          submitButton.type = "button";
          submitButton.value = "{{ __('trans.search') }}";
          submitButton.classList.add("button", "button-primary");
    
  
          response = document.createElement("pre");
          response.id = "response";
          response.innerText = "";
    
          map.controls[google.maps.ControlPosition.TOP_LEFT].push(inputText);
          map.controls[google.maps.ControlPosition.TOP_LEFT].push(submitButton);
          marker = new google.maps.Marker({
            map,
            animation: google.maps.Animation.DROP,
            position: haightAshbury
          });
           addYourLocationButton(map, marker);
           map.addListener('click', function(event) {
                geocode({ location: event.latLng });
                var latitude = event.latLng.lat();
                var longitude = event.latLng.lng();
           });
          submitButton.addEventListener("click", () =>
            geocode({ address: inputText.value })
          );
          marker.setMap(null);
        }
        function addYourLocationButton(map, marker){
            var controlDiv = document.createElement('div');
            var firstChild = document.createElement('button');
            firstChild.style.backgroundColor = '#fff';
            firstChild.style.border = 'none';
            firstChild.style.outline = 'none';
            firstChild.style.width = '40px';
            firstChild.style.height = '40px';
            firstChild.style.borderRadius = '2px';
            firstChild.style.boxShadow = '0 1px 4px rgba(0,0,0,0.3)';
            firstChild.style.cursor = 'pointer';
            firstChild.style.marginRight = '10px';
            firstChild.style.padding = '0px';
            firstChild.title = 'Your Location';
            controlDiv.appendChild(firstChild);
    
            var secondChild = document.createElement('div');
            secondChild.style.margin = '10px';
            secondChild.style.width = '18px';
            secondChild.style.height = '18px';
            secondChild.style.backgroundImage = 'url(https://maps.gstatic.com/tactile/mylocation/mylocation-sprite-1x.png)';
            secondChild.style.backgroundSize = '180px 18px';
            secondChild.style.backgroundPosition = '0px 0px';
            secondChild.style.backgroundRepeat = 'no-repeat';
            secondChild.id = 'you_location_img';
            firstChild.appendChild(secondChild);
    
            google.maps.event.addListener(map, 'dragend', function() {
                $('#you_location_img').css('background-position', '0px 0px');
            });
    
            firstChild.addEventListener('click', function(event) {
                event.preventDefault();
                var imgX = '0';
                var animationInterval = setInterval(function(){
                    if(imgX == '-18') imgX = '0';
                    else imgX = '-18';
                    $('#you_location_img').css('background-position', imgX+'px 0px');
                }, 500);
                if(navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                        marker.setPosition(latlng);
                        map.setCenter(latlng);
                        clearInterval(animationInterval);
                        $('#you_location_img').css('background-position', '-144px 0px');
                        if ("geolocation" in navigator){
                			navigator.geolocation.getCurrentPosition(function(position){
                				var currentLatitude = position.coords.latitude;
                				var currentLongitude = position.coords.longitude;
                				var infoWindowHTML = "Latitude: " + currentLatitude + "<br>Longitude: " + currentLongitude;
                				var infoWindow = new google.maps.InfoWindow({map: map, content: infoWindowHTML});
                				var currentLocation = { lat: currentLatitude, lng: currentLongitude };
                				infoWindow.setPosition(currentLocation);
                                geocode({ location: latlng });
                			});
                		}
                    });
                }
                else{
                    clearInterval(animationInterval);
                    $('#you_location_img').css('background-position', '0px 0px');
                }
    
            });
    
            controlDiv.index = 1;
            map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(controlDiv);
        }
        
        window.initMap = initMap;

        function geocode(request) {
          marker.setMap(null);
          geocoder.geocode(request).then((result) => {
              const { results } = result;
              map.setCenter(results[0].geometry.location);
              marker.setPosition(results[0].geometry.location);
              marker.setMap(map);
              response.innerText = JSON.stringify(result, null, 2);
      
              $("#lat").val(results[0].geometry.location.lat());
              $("#long").val(results[0].geometry.location.lng());
              return results;
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_KEY') }}&callback=initMap"></script>
    <script>
        $(document).on("change", "#country_id", function () {
            $.ajax({
                type:'POST',
                url:'/admin/country_regions/'+$('#country_id option:selected').val(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                success:function(data){
                    $('#region_id').empty().append(data);
                    $(".selectpicker").trigger('change');
                },
                error: function (xhr, exception) {
                    var msg = "";
                    if (xhr.status === 0) {
                        msg = "Not connect.\n Verify Network." + xhr.responseText;
                    } else if (xhr.status == 404) {
                        msg = "Requested page not found. [404]" + xhr.responseText;
                    } else if (xhr.status == 500) {
                        msg = "Internal Server Error [500]." +  xhr.responseText;
                    } else if (exception === "parsererror") {
                        msg = "Requested JSON parse failed.";
                    } else if (exception === "timeout") {
                        msg = "Time out error." + xhr.responseText;
                    } else if (exception === "abort") {
                        msg = "Ajax request aborted.";
                    } else {
                        msg = "Error:" + xhr.status + " " + xhr.responseText;
                    }
                }
            });
        });
    </script>

@endpush




@push('css')
    <style>
        #map input[type=text] {
          background-color: #fff;
          border: 0;
          border-radius: 2px;
          box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
          margin: 10px;
          padding: 0 0.5em;
          font: 400 18px Roboto, Arial, sans-serif;
          overflow: hidden;
          line-height: 40px;
          margin-right: 0;
          min-width: 25%;
        }

        #map input[type=button] {
          background-color: #fff;
          border: 0;
          border-radius: 2px;
          box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
          margin: 10px;
          padding: 0 0.5em;
          font: 400 18px Roboto, Arial, sans-serif;
          overflow: hidden;
          height: 40px;
          cursor: pointer;
          margin-left: 5px;
        }

        #map input[type=button]:hover {
          background: rgb(235, 235, 235);
        }

        #map input[type=button].button-primary {
          background-color: #1a73e8;
          color: white;
        }

        #map input[type=button].button-primary:hover {
          background-color: #1765cc;
        }

        #map input[type=button].button-secondary {
          background-color: white;
          color: #1a73e8;
        }

        #map input[type=button].button-secondary:hover {
          background-color: #d2e3fc;
        }
        @media (max-width: 575.98px) {
            #map input{
              top: 50px !important;
            }
        }

        #response-container {
          background-color: #fff;
          border: 0;
          border-radius: 2px;
          box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
          margin: 10px;
          padding: 0 0.5em;
          font: 400 18px Roboto, Arial, sans-serif;
          overflow: hidden;
          overflow: auto;
          max-height: 50%;
          max-width: 90%;
          background-color: rgba(255, 255, 255, 0.95);
          font-size: small;
        }

        #instructions {
          background-color: #fff;
          border: 0;
          border-radius: 2px;
          box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
          margin: 10px;
          padding: 0 0.5em;
          font: 400 18px Roboto, Arial, sans-serif;
          overflow: hidden;
          padding: 1rem;
          font-size: medium;
        }
    </style>
@endpush
