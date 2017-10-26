<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Location Track - Laravelcode</title>
    <style>
		#map {height: 100%;}
		html, body {
			height: 100%;
			margin: 0;
			padding: 0;
		}
		#floating-panel {
			position: absolute;
			top: 10px;
			right: 1%;
			z-index: 5;
			background-color: #fff;
			border: 1px solid #999;
			text-align: center;
		}
    </style>
</head>
<body>
    <div id="floating-panel">
    <b>Start1: </b>
    <input tye="text" id="start1" value="Mumbai"><!-- Starting Location -->
    <b>End1: </b>
    <input type="text" id="end1" value="Delhi"><!-- Ending Location -->
    </div>
    <div id="map"></div>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=GOOGLE_MAP_API_KEY&callback=initMap&libraries=places,geometry"></script>
 </body>
</html>
