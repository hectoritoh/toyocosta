var map;
function initialize() {
    var myLatlng = new google.maps.LatLng(-0.223026, -78.506051);
  var mapOptions = {
    zoom: 15,
    center: new google.maps.LatLng(-0.223026, -78.506051),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Calderon Cevallos Edwin'
  });
}

google.maps.event.addDomListener(window, 'load', initialize);


