(function(window, google, mapster){
    mapster.MAP_OPTIONS = {
        center: {
          lat: 11.5263987,
          lng: 104.8221165
        },
        zoom: 10,
        disableDefaultUI: false,
        scrollWheel: true,
          draggable: true,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          maxZoom: 19,
          minZoom: 7,
          fullscreenControl: true,
          panControlOptions: true,
          zoomControlOptions: {
              position: google.maps.ControlPosition.TOP_RIGHT,
              style: google.maps.ZoomControlStyle.DEFAULT,
          },
          panControlOptions: {
              position: google.maps.ControlPosition.TOP_RIGHT
          },
          streetViewControlOptions: {
              position: google.maps.ControlPosition.TOP_RIGHT
          },
          mapTypeControl: true,
          mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            position: google.maps.ControlPosition.TOP_LEFT
          },
          scaleControl: true,
    };
}(window, google, window.Mapster || (window.Mapster = {})));