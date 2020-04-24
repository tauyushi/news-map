<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Map</title>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
</head>
<script type="text/javascript">
    function initialize() {
    var latlng = new google.maps.LatLng(35.1750255,136.8860834);/*表示したい場所の経度、緯度*/
    var myOptions = {
    zoom: 18, /*拡大比率*/
    center: latlng, /*表示枠内の中心点*/
    mapTypeControlOptions: { mapTypeIds: ['noText', google.maps.MapTypeId.ROADMAP] }/*表示タイプの指定*/
    };
    var map = new google.maps.Map(document.getElementById('map_custmomize'), myOptions);/*マップのID取得*/
    /*スタイルのカスタマイズ*/
    var styleOptions =
    [
    {
    "featureType": "landscape.natural",
    "stylers": [
    { "color": "#fff2c2" }
    ]
    },{
    "featureType": "road",
    "stylers": [
    { "gamma": 2.61 },
    { "color": "#ffffff" }
    ]
    },{
    "featureType": "transit.line",
    "stylers": [
    { "invert_lightness": true },
    { "visibility": "simplified" },
    { "color": "#ffbe00" }
    ]
    },{
    "elementType": "labels.icon",
    "stylers": [
    { "visibility": "off" }
    ]
    },{
    "featureType": "landscape.man_made",
    "elementType": "geometry",
    "stylers": [
    { "visibility": "simplified" },
    { "color": "#ffce5f" }
    ]
    },{
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
    { "color": "#ffde5b" }
    ]
    },{
    "featureType": "water",
    "stylers": [
    { "color": "#dfe8ff" }
    ]
    },{
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
    { "color": "#fab022" }
    ]
    }
    ];
    var styledMapOptions = { name: '株式会社WEB企画' }
    var sampleType = new google.maps.StyledMapType(styleOptions, styledMapOptions);
    map.mapTypes.set('sample', sampleType);
    map.setMapTypeId('sample');
    /*WEB企画アイコンの取得*/
    var icon = new google.maps.MarkerImage('images/icon_webkikaku.png',/*アイコンの場所*/
    new google.maps.Size(53,64),/*アイコンのサイズ*/
    new google.maps.Point(0,0)/*アイコンの位置*/
    );
    /*マーカーの設置*/
    var markerOptions = {
    position: latlng,/*表示場所と同じ位置に設置*/
    map: map,
    icon: icon,
    title: '株式会社WEB企画'/*マーカーのtitle*/
    };
    var marker = new google.maps.Marker(markerOptions);
    }
</script>
<body onload="initialize();">
<div id="map_custmomize" style="width:100%;height:640px;"></div>

</body>
</html>
