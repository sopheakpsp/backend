function getid($e){
	return document.getElementById($e);
}

var map;
var marker;

initialize();

function initialize(){
	var myLatlng = new google.maps.LatLng(11.5520558,104.9233717);
	var option = {
					zoom: 13,
					center: myLatlng,
					maxZoom: 20,
					minZoom: 8,
					mapTypeId: google.maps.MapTypeId.HYBRID,
          mapTypeControlOptions:{
            position: google.maps.ControlPosition.BOTTOM_CENTER
          },
					scrollwheel: true,
					fullscreenControl: true,
					disableDoubleClickZoom: true,
					scaleControl: true,
          zoomControl: true,
          zoomControlOptions: {
              position: google.maps.ControlPosition.RIGHT_CENTER
          },
	};

	map = new google.maps.Map(getid('maps'), option);

	// Create the search box and link it to the UI element.
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
      searchBox.setBounds(map.getBounds());
    });

    var markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function() {
      var places = searchBox.getPlaces();

      if (places.length == 0) {
        return;
      }

      // Clear out the old markers.
      markers.forEach(function(marker) {
        marker.setMap(null);
      });
      markers = [];

      // For each place, get the icon, name and location.
      var bounds = new google.maps.LatLngBounds();
      places.forEach(function(place) {
        var icon = {
          url: place.icon,
          size: new google.maps.Size(71, 71),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(25, 25)
        };

        // Create a marker for each place.
        markers.push(new google.maps.Marker({
          map: map,
          icon: icon,
          title: place.name,
          position: place.geometry.location
        }));

        if (place.geometry.viewport) {
          // Only geocodes have viewport.
          bounds.union(place.geometry.viewport);
        } else {
          bounds.extend(place.geometry.location);
        }
      });
      map.fitBounds(bounds);
    });
	// #End Search Box

  //Load Markers from the XML File, Check (map_process.php)
  $.get("js/googlemaps_process.php", function (data) {
    $(data).find("marker").each(function () {
        var id    = $(this).attr('id');
        var thumbnail   = $(this).attr('thumbnail');
        var code    = $(this).attr('code');
        var type    = $(this).attr('type');
        var content    = $(this).attr('content');
        var point   = new google.maps.LatLng(parseFloat($(this).attr('lat')),parseFloat($(this).attr('lng')));
        create_marker(point, id, thumbnail, code, type, content, false, false, false, "icons/house.png");
    });
  }); 

  //right click to create marker
  google.maps.event.addListener(map, 'dblclick', function(event){
    var marker = new google.maps.Marker({
      position: event.latLng,
      map:map,
      draggable: true,
      animation: google.maps.Animation.DROP,
      icon: 'icons/maps.png'
    });

    var contentInfo = $('<div class="info-marker">'+
                        '<div class="info-title">Subject Property</div>'+
                        '<button name="save-marker" class="save-marker" title="">Detail required</button>'+
                        '<button name="remove-marker" class="remove-marker" title="">Remove</button>'+
                        '</div>');
    var iw = new google.maps.InfoWindow(); 
    iw.setContent(contentInfo[0]);
    iw.open(map, marker);

    google.maps.event.addListener(marker, 'click', function(){
      iw.open(map, marker);
    });

    var removeBtn = contentInfo.find('button.remove-marker')[0];
    var saveBtn = contentInfo.find('button.save-marker')[0];
    // add event to remove btn
    google.maps.event.addDomListener(removeBtn, 'click', function(event){
      marker.setMap(null);
    });

    // add event to saveBtn 
    google.maps.event.addDomListener(saveBtn, 'click', function(event){
      var LatLng = marker.getPosition().toUrlValue();
      console.log(LatLng);
      window.open('property.php?latlng='+LatLng);
    });
  });

  //get current location button
  var myMarker = new google.maps.Marker({
        map: map,
        animation: google.maps.Animation.DROP,
        icon: 'icons/currentlocation.png'
  });

  addYourLocationButton(map, myMarker);
}

  //############### Create Marker Function ##############
  function create_marker(MapPos, id, thumbnail, code, type, content, InfoOpenDefault, DragAble, Removable, iconPath)
  {             
    
    //new marker
    var marker = new google.maps.Marker({
      position: MapPos,
      map: map,
      draggable:DragAble,
      animation: google.maps.Animation.DROP,
      icon: iconPath
    });
    
    //Content structure of info Window for the Markers
    var contentString = $("<div class='info-marker'>"+
                          "<div class='info-img' style='height:120px; background:url("+ thumbnail +") no-repeat left; background-size: 100% 100%;'></div>"+ 
                          "<div class='info-code'>"+ code +"</div>"+
                          "<div class='info-title'>"+ type +"</div>"+
                          "<p class='info-p'>"+ content +"</p>"+
                          "<a href='property_view.php?id="+ id +"' target='_blank'>View detail</a>"+
                          "</div>");  

    //Create an infoWindow
    var infowindow = new google.maps.InfoWindow();
    //set the content of infoWindow
    infowindow.setContent(contentString[0]);

    //Find remove button in infoWindow
    // var saveBtn   = contentString.find('button.save-marker')[0];

    //add click listner to remove marker button
    // google.maps.event.addDomListener(removeBtn, "click", function(event) {
    //   remove_marker(marker);
    // });


    // =====================================================================
    
    // if(typeof saveBtn !== 'undefined') //continue only when save button is present
    // {
    //   //add click listner to save marker button
    //   google.maps.event.addDomListener(saveBtn, "click", function(event) {
    //     var mReplace = contentString.find('span.info-content'); //html to be replaced after success
    //     var mName = contentString.find('input.save-name')[0].value; //name input field value
    //     var mDesc  = contentString.find('textarea.save-desc')[0].value; //description input field value
    //     var mType = contentString.find('select.save-type')[0].value; //type of marker
        
    //     if(mName =='' || mDesc =='')
    //     {
    //       alert("Please enter Name and Description!");
    //     }else{
    //       save_marker(marker, mName, mDesc, mType, mReplace); //call save marker function
    //     }
    //   });
    // }
    
    //add click listner to save marker button    
    google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map,marker); // click on marker opens info window 
      });
      
    if(InfoOpenDefault) //whether info window should be open by default
    {
      infowindow.open(map,marker);
    }
  }

function addYourLocationButton(map, marker) 
{
    var controlDiv = document.createElement('div');

    var firstChild = document.createElement('button');
    firstChild.style.backgroundColor = '#fff';
    firstChild.style.border = 'none';
    firstChild.style.outline = 'none';
    firstChild.style.width = '28px';
    firstChild.style.height = '28px';
    firstChild.style.borderRadius = '2px';
    firstChild.style.boxShadow = '0 1px 4px rgba(0,0,0,0.3)';
    firstChild.style.cursor = 'pointer';
    firstChild.style.marginRight = '10px';
    firstChild.style.padding = '0px';
    firstChild.title = 'Your Location';
    controlDiv.appendChild(firstChild);

    var secondChild = document.createElement('div');
    secondChild.style.margin = '5px';
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

    firstChild.addEventListener('click', function() {
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
                map.setZoom(16);
                clearInterval(animationInterval);
                $('#you_location_img').css('background-position', '-144px 0px');
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