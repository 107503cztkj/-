// JavaScript Documentvar map = null;
var geocoder = null;
function initialize() {
  if (GBrowserIsCompatible()) {
	  map = new GMap2(document.getElementById("map_canvas"));
	  map.setCenter(new GLatLng(24.994459, 121.305843), 17);
	  // 預設顯示地圖的座標與放大比例
	  geocoder = new GClientGeocoder();
	  var bounds = map.getBounds();
	  var southWest = bounds.getSouthWest();
	  var northEast = bounds.getNorthEast();
	  var lngSpan = northEast.lng() - southWest.lng();
	  var latSpan = northEast.lat() - southWest.lat();
	  var myLayer = new GLayer("org.wikipedia.en");
	  map.addOverlay(myLayer);
//                for (var i = 0; i < 10; i++) {
//                    var point = new GLatLng(southWest.lat() + latSpan * Math.random(),
//        southWest.lng() + lngSpan * Math.random());
//                    map.addOverlay(new GMarker(point));
//                }
  }
}
function showAddress(address) {
  if (geocoder) {
	  geocoder.getLatLng(address,
	  function(point) {
		  if (!point) {
			  alert(address + " not found");
		  } else {
		  map.setCenter(point, 13);
		  // 依搜尋地址找到地圖位置與放大比例
			  var marker = new GMarker(point);
			  map.addOverlay(marker);
			  marker.openInfoWindowHtml(address);
		  }
	  }
	  );
  }
}