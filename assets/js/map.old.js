var map;
var drawMngt;
var drawStatus=false;
var currentShap=0;

function initialize() {
	map = new GMaps({
		div: '#map',
		lat: 48.1057987,
		lng: -1.6131401,
		zoom: 12,
	});

	formOption = {
		fillColor: '#ff0000',
		fillOpacity: 0.2,
		strokeColor: '#ff0000',
		strokeOpacity: 0.2,
		strokeWeight: 2,
		clickable: true,
		editable: true,
		draggable: true,
		zIndex: 1
	};
	
	drawMngt = new google.maps.drawing.DrawingManager({
		drawingControl: true,
		drawingControlOptions: {
			position: google.maps.ControlPosition.BOTTOM_LEFT,
			drawingModes: [
				google.maps.drawing.OverlayType.CIRCLE,
				google.maps.drawing.OverlayType.POLYGON,
			]
		},
		circleOptions: formOption,
		polygonOptions: formOption
	});

	drawMngt.setMap(map.map);
	drawStatus=true;

	edit_circle(drawMngt);

	edit_polygon(drawMngt)

	google.maps.event.addListener(drawMngt, 'drawingmode_changed', function() {
		// console.log("====================> Mode Changed ");
	});
}

google.maps.event.addDomListener(window, 'load', initialize);

function drawing() {
	drawStatus = drawStatus?false:true;
	drawMngt.setOptions({
	  drawingControl: drawStatus
	});
}

function store() {
	if(!currentShap) return;

	if(!currentShap.utd) {
		console.log("Store ", currentShap.type);	
		console.log("currentShap", currentShap.bounds);
	}
	currentShap.utd = true;
	// console.log("currentShap Up To Date", currentShap.utd);
}

function routes(id) {
	// http://www.sentinel.com/tracker/1
	var icon = {
		// path: fontawesome.markers.MAP_MARKER,
		// path: fontawesome.markers.MOBILE_PHONE,
		path: fontawesome.markers.CLOCK_O,
		// origin: new google.maps.Point(0, 0),
        // anchor: new google.maps.Point(0, 0),
		scale: 0.3,
		strokeWeight: 0.2,
		strokeColor: 'black',
		strokeOpacity: 1,
		fillColor: 'black',
		fillOpacity: 0.7
	};
	start = 0;
	$.getJSON( "tracker/"+id, function( data ) {
		$.each( data, function( key, val ) {
			$('#instructions').append('<li>clieck on device '+id+' => '+key+'</li>');
			map.addMarker({
				lat: val.latitude,
				lng: val.longitude,
				icon: icon,
				title: 'TS'+start+': ' + val.timestamp
			});
			if(start) {
				map.setCenter(val.latitude, val.longitude);
				map.drawRoute({
					origin: [prv_latitude, prv_longitude],
					destination: [val.latitude, val.longitude],
					travelMode: 'driving',
					strokeColor: 'red',
					strokeOpacity: 0.6,
					strokeWeight: 6
				});
			}
			start += 1;
			prv_latitude = val.latitude;
			prv_longitude = val.longitude;
		});
	});
}

function zones(id) {
	
	$.getJSON( "zones/"+id, function( data ) {
		$.each( data, function( key, val ) {
			$('#instructions').append('Zone '+id+' => '+key+'<br/>');

			if(key == 'circle') {
				$('#instructions').append('Radius: ' + val.radius + '<br/>');
				$('#instructions').append('latitude: ' + val.latitude + '<br/>')
				$('#instructions').append('longitude: ' + val.longitude + '<br/>');

				console.log('circle: ',  val );
				show_circle(val);

			} else if (key == 'polygon') {
				console.log('polygon: ',  val);
				path = [];
				$.each( val, function( ikey, point ) {
					console.log('point('+ikey+'): ',  point);
					path[ikey] = [point.latitude, point.longitude];
				});
				console.log('polygon: ',  path );
				show_polygon(path);
			}

		});
	});
}

function edit_circle(drawMngt)
{
	var bounds_circle = {radius: 0, latitude: 0, longitude: 0 };

	google.maps.event.addListener(drawMngt, 'circlecomplete', function(circle) {
		console.log("====================> Circle Complete <====================");
		drawMngt.setDrawingMode(null);
		if(currentShap) currentShap.setMap(null);
		circle.type   = 'circle';
		circle.bounds = bounds_circle;
		circle.utd    = false;
		currentShap   = circle;

		bounds_circle.radius    = circle.getRadius();
		bounds_circle.latitude  = circle.getCenter().lat();
		bounds_circle.longitude = circle.getCenter().lng();
		// console.log("Circle :  ", bounds_circle);

		// observe click
		google.maps.event.addListener(circle,'click',function(){
			// console.log("====================> Circle Click: ");
		});

		//observe radius_changed
		google.maps.event.addListener(circle,'radius_changed',function(){
			// console.log("====================> Circle Radius Change: ");
			circle.utd  = false;
			bounds_circle.radius = circle.getRadius();
			// console.log("Circle :  ", bounds_circle);
		});

		//observe center_changed
		google.maps.event.addListener(circle,'center_changed',function(){
			// console.log("====================> Circle Center Change: ");
			circle.utd  = false;
			bounds_circle.latitude  = circle.getCenter().lat();
			bounds_circle.longitude = circle.getCenter().lng();
			// console.log("Circle :  ", bounds_circle);
		});
	});
}

function edit_polygon(drawMngt)
{
	var bounds_polygon =[];

	google.maps.event.addListener(drawMngt, 'polygoncomplete', function(polygon) {
		console.log("====================> Polygon Complete <====================");
		drawMngt.setDrawingMode(null);
		if(currentShap) currentShap.setMap(null);
		polygon.type   = 'polygon';
		polygon.bounds = bounds_polygon;
		polygon.utd    = false;
		currentShap    = polygon;

		// var bounds = polygon.getBounds();
		var len = polygon.getPath().getLength();
		for (var i = 0; i < len; i++) {
			bounds_polygon[i] = [
				polygon.getPath().getAt(i).lat(), 
				polygon.getPath().getAt(i).lng()
			];
		}
		// console.log("Polygon : ", bounds_polygon);

		// observe click
		google.maps.event.addListener(polygon, 'click', function(){
			// console.log("====================> Polygon Click: ");
		});

		// observe set at
		google.maps.event.addListener(polygon.getPath(), 'set_at', function(){
			// console.log("====================> Polygon Set At: ");
			polygon.utd  = false;
			// var bounds = polygon.getBounds();
			var len = polygon.getPath().getLength();
			for (var i = 0; i < len; i++) {
				bounds_polygon[i] = [
					polygon.getPath().getAt(i).lat(), 
					polygon.getPath().getAt(i).lng()
				];
			}
			// console.log("Polygon : ", bounds_polygon);
		});
		// observe insert at
		google.maps.event.addListener(polygon.getPath(), 'insert_at', function(){
			// console.log("====================> Polygon Insert At: ");
			polygon.utd  = false;
			// var bounds = polygon.getBounds();
			var len = polygon.getPath().getLength();
			for (var i = 0; i < len; i++) {
				bounds_polygon[i] = [
					polygon.getPath().getAt(i).lat(), 
					polygon.getPath().getAt(i).lng()
				];
			}
			// console.log("Polygon : ", bounds_polygon);
		});
	});
}

function show_circle(bound)
{
	var circle = map.drawCircle({
					lat: bound.latitude,
					lng: bound.longitude,
					radius: bound.radius,
					strokeColor: '#ff0000',
					strokeOpacity: 0.2,
					strokeWeight: 2,
					fillColor: '#ff0000',
					fillOpacity: 0.2,
					// clickable: true,
					// editable: true,
					// draggable: true,
					// zIndex: 1
				});
	center = circle.getBounds().getCenter();
	// console.log('circle center: ',  center);
	map.setCenter(center.A, center.F);
}

function show_polygon(path)
{
	var polygon = map.drawPolygon({
					paths: path,
					strokeColor: '#ff0000',
					strokeOpacity: 0.2,
					strokeWeight: 2,
					fillColor: '#ff0000',
					fillOpacity: 0.2,
					// clickable: true,
					// editable: true,
					// draggable: true,
					// zIndex: 1
				});
	center = polygon.getBounds().getCenter();
	// console.log('polygon center: ',  center);
	map.setCenter(center.A, center.F);
}
