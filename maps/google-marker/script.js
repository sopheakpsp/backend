$(document).ready(function() {

	var myLatLng = new google.maps.LatLng(11.5796669, 104.750098); //Google map Coordinates
	var map;
	
	map_initialize(); // initialize google map
	
	//############### Google Map Initialize ##############
	function map_initialize()
	{
			var googleMapOptions = 
			{ 
				center: myLatLng, // map center
				zoom: 17, //zoom level, 0 = earth view to higher value
				maxZoom: 20,
				minZoom: 10,
				fullscreenControl: true,
				zoomControlOptions: {
									style: google.maps.ZoomControlStyle.LARGE //zoom control size
									},
				scaleControl: true, // enable scale control
				mapTypeId: google.maps.MapTypeId.ROADMAP // google map type
			};
		
		   	map = new google.maps.Map(document.getElementById("google_map"), googleMapOptions);		
			
			//Load Markers from the XML File, Check (map_process.php)
			$.get("map_process.php", function (data) {
				$(data).find("marker").each(function () {
					  var name 		= $(this).attr('name');
					  var address 	= '<p>'+ $(this).attr('address') +'</p>';
					  var type 		= $(this).attr('type');
					  var point 	= new google.maps.LatLng(parseFloat($(this).attr('lat')),parseFloat($(this).attr('lng')));
					  create_marker(point, name, address, false, false, false, "icons/pin_blue.png");
				});
			});	

			//Right Click to Drop a New Marker
			google.maps.event.addListener(map, 'rightclick', function(event) {
				//Edit form to be displayed with new marker
				var EditForm = '<p><div class="marker-edit">'+
				'<form action="ajax-save.php" method="POST" name="SaveMarker" id="SaveMarker">'+
				'<label for="pName"><span>Place Name :</span><input type="text" name="pName" class="save-name" placeholder="Enter Title" maxlength="40" /></label>'+
				'<label for="pDesc"><span>Description :</span><textarea name="pDesc" class="save-desc" placeholder="Enter Address" maxlength="150"></textarea></label>'+
				'<label for="pType"><span>Type :</span> <select name="pType" class="save-type"><option value="restaurant">Rastaurant</option><option value="bar">Bar</option>'+
				'<option value="house">House</option></select></label>'+
				'</form>'+
				'</div></p><button name="save-marker" class="save-marker">Save Marker Details</button>';

				//Drop a new Marker with our Edit Form
				create_marker(event.latLng, 'New Marker', EditForm, true, true, true, "icons/pin_green.png");
			});			
	}

	
	//############### Create Marker Function ##############
	function create_marker(MapPos, MapTitle, MapDesc,  InfoOpenDefault, DragAble, Removable, iconPath)
	{	  	  		  
		
		//new marker
		var marker = new google.maps.Marker({
			position: MapPos,
			map: map,
			draggable:DragAble,
			animation: google.maps.Animation.DROP,
			title:"Hello World!",
			icon: iconPath
		});
		
		//Content structure of info Window for the Markers
		var contentString = $('<div class="marker-info-win">'+
								'<div class="marker-inner-win">'+
								'<span class="info-content"><h1 class="marker-heading">'+MapTitle+'</h1>'+MapDesc+'</span>'+
								'<button name="remove-marker" class="remove-marker" title="Remove Marker">Remove Marker</button>'+
							  '</div></div>');	

		
		//Create an infoWindow
		var infowindow = new google.maps.InfoWindow();
		//set the content of infoWindow
		infowindow.setContent(contentString[0]);

		//Find remove button in infoWindow
		var removeBtn 	= contentString.find('button.remove-marker')[0];
		var saveBtn 	= contentString.find('button.save-marker')[0];

		//add click listner to remove marker button
		google.maps.event.addDomListener(removeBtn, "click", function(event) {
			remove_marker(marker);
		});


		// =====================================================================
		
		if(typeof saveBtn !== 'undefined') //continue only when save button is present
		{
			//add click listner to save marker button
			google.maps.event.addDomListener(saveBtn, "click", function(event) {
				var mReplace = contentString.find('span.info-content'); //html to be replaced after success
				var mName = contentString.find('input.save-name')[0].value; //name input field value
				var mDesc  = contentString.find('textarea.save-desc')[0].value; //description input field value
				var mType = contentString.find('select.save-type')[0].value; //type of marker
				
				if(mName =='' || mDesc =='')
				{
					alert("Please enter Name and Description!");
				}else{
					save_marker(marker, mName, mDesc, mType, mReplace); //call save marker function
				}
			});
		}
		
		//add click listner to save marker button		 
		google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker); // click on marker opens info window 
	    });
		  
		if(InfoOpenDefault) //whether info window should be open by default
		{
		  infowindow.open(map,marker);
		}
	}
	
	//############### Remove Marker Function ##############
	function remove_marker(Marker)
	{
		
		/* determine whether marker is draggable 
		new markers are draggable and saved markers are fixed */
		if(Marker.getDraggable()) 
		{
			Marker.setMap(null); //just remove new marker
		}
		else
		{
			//Remove saved marker from DB and map using jQuery Ajax
			var mLatLang = Marker.getPosition().toUrlValue(); //get marker position
			var myData = {del : 'true', latlang : mLatLang}; //post variables
			$.ajax({
			  type: "POST",
			  url: "map_process.php",
			  data: myData,
			  success:function(data){
					Marker.setMap(null); 
					alert(data);
				},
				error:function (xhr, ajaxOptions, thrownError){
					alert(thrownError); //throw any errors
				}
			});
		}

	}
	
	//############### Save Marker Function ##############
	function save_marker(Marker, mName, mAddress, mType, replaceWin)
	{
		//Save new marker using jQuery Ajax
		var mLatLang = Marker.getPosition().toUrlValue(); //get marker position
		var myData = {name : mName, address : mAddress, latlang : mLatLang, type : mType }; //post variables
		console.log(replaceWin);		
		$.ajax({
		  type: "POST",
		  url: "map_process.php",
		  data: myData,
		  success:function(data){
				replaceWin.html(data); //replace info window with new html
				Marker.setDraggable(false); //set marker to fixed
				Marker.setIcon('icons/pin_blue.png'); //replace icon
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError); //throw any errors
            }
		});
	}

	// get your location button
	function addYourLocationButton(map, marker) {
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

	var myMarker = new google.maps.Marker({
        map: map,
        animation: google.maps.Animation.DROP,
        icon: 'icons/currentlocation.png'
    });
    addYourLocationButton(map, myMarker);
    // end get your location button
    
});