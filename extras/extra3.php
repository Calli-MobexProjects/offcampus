<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}																																												
</style>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/ammap.js"></script>
<script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

<!-- Chart code -->
<script>
// svg path for target icon
var targetSVG = "M9,0C4.029,0,0,4.029,0,9s4.029,9,9,9s9-4.029,9-9S13.971,0,9,0z M9,15.93 c-3.83,0-6.93-3.1-6.93-6.93S5.17,2.07,9,2.07s6.93,3.1,6.93,6.93S12.83,15.93,9,15.93 M12.5,9c0,1.933-1.567,3.5-3.5,3.5S5.5,10.933,5.5,9S7.067,5.5,9,5.5 S12.5,7.067,12.5,9z";
// svg path for plane icon
var planeSVG = "M19.671,8.11l-2.777,2.777l-3.837-0.861c0.362-0.505,0.916-1.683,0.464-2.135c-0.518-0.517-1.979,0.278-2.305,0.604l-0.913,0.913L7.614,8.804l-2.021,2.021l2.232,1.061l-0.082,0.082l1.701,1.701l0.688-0.687l3.164,1.504L9.571,18.21H6.413l-1.137,1.138l3.6,0.948l1.83,1.83l0.947,3.598l1.137-1.137V21.43l3.725-3.725l1.504,3.164l-0.687,0.687l1.702,1.701l0.081-0.081l1.062,2.231l2.02-2.02l-0.604-2.689l0.912-0.912c0.326-0.326,1.121-1.789,0.604-2.306c-0.452-0.452-1.63,0.101-2.135,0.464l-0.861-3.838l2.777-2.777c0.947-0.947,3.599-4.862,2.62-5.839C24.533,4.512,20.618,7.163,19.671,8.11z";

var map = AmCharts.makeChart( "chartdiv", {
  "type": "map",
  "theme": "light",
  "dataProvider": {
    "map": "worldLow",
    "zoomLevel": 3.5,
    "zoomLongitude": -20.1341,
    "zoomLatitude": 49.1712,

    "lines": [ {
      "latitudes": [ 51.5002, 50.4422 ],
      "longitudes": [ -0.1262, 30.5367 ]
    }, {
      "latitudes": [ 51.5002, 46.9480 ],
      "longitudes": [ -0.1262, 7.4481 ]
    }, {
      "latitudes": [ 51.5002, 59.3328 ],
      "longitudes": [ -0.1262, 18.0645 ]
    }, {
      "latitudes": [ 51.5002, 40.4167 ],
      "longitudes": [ -0.1262, -3.7033 ]
    }, {
      "latitudes": [ 51.5002, 46.0514 ],
      "longitudes": [ -0.1262, 14.5060 ]
    }, {
      "latitudes": [ 51.5002, 48.2116 ],
      "longitudes": [ -0.1262, 17.1547 ]
    }, {
      "latitudes": [ 51.5002, 44.8048 ],
      "longitudes": [ -0.1262, 20.4781 ]
    }, {
      "latitudes": [ 51.5002, 55.7558 ],
      "longitudes": [ -0.1262, 37.6176 ]
    }, {
      "latitudes": [ 51.5002, 38.7072 ],
      "longitudes": [ -0.1262, -9.1355 ]
    }, {
      "latitudes": [ 51.5002, 54.6896 ],
      "longitudes": [ -0.1262, 25.2799 ]
    }, {
      "latitudes": [ 51.5002, 64.1353 ],
      "longitudes": [ -0.1262, -21.8952 ]
    }, {
      "latitudes": [ 51.5002, 40.4300 ],
      "longitudes": [ -0.1262, -74.0000 ]
    } ],
    "images": [ {
      "id": "london",
      "svgPath": targetSVG,
      "title": "London",
      "latitude": 51.5002,
      "longitude": -0.1262,
      "scale": 1
    }, {
      "svgPath": targetSVG,
      "title": "Brussels",
      "latitude": 50.8371,
      "longitude": 4.3676,
      "scale": 0.5
    }, {
      "svgPath": targetSVG,
      "title": "Prague",
      "latitude": 50.0878,
      "longitude": 14.4205,
      "scale": 0.5
    }, {
      "svgPath": targetSVG,
      "title": "Athens",
      "latitude": 37.9792,
      "longitude": 23.7166,
      "scale": 0.5
    }, {
      "svgPath": targetSVG,
      "title": "Reykjavik",
      "latitude": 64.1353,
      "longitude": -21.8952,
      "scale": 0.5
    }, {
      "svgPath": targetSVG,
      "title": "Dublin",
      "latitude": 53.3441,
      "longitude": -6.2675,
      "scale": 0.5
    }, {
      "svgPath": targetSVG,
      "title": "Oslo",
      "latitude": 59.9138,
      "longitude": 10.7387,
      "scale": 0.5
    }, {
      "svgPath": targetSVG,
      "title": "Lisbon",
      "latitude": 38.7072,
      "longitude": -9.1355,
      "scale": 0.5
    }, {
      "svgPath": targetSVG,
      "title": "Moscow",
      "latitude": 55.7558,
      "longitude": 37.6176,
      "scale": 0.5
    }, {
      "svgPath": targetSVG,
      "title": "Belgrade",
      "latitude": 44.8048,
      "longitude": 20.4781,
      "scale": 0.5
    }, {
      "svgPath": targetSVG,
      "title": "Bratislava",
      "latitude": 48.2116,
      "longitude": 17.1547,
      "scale": 0.5
    }, {
      "svgPath": targetSVG,
      "title": "Ljubljana",
      "latitude": 46.0514,
      "longitude": 14.5060,
      "scale": 0.5
    }, {
      "svgPath": targetSVG,
      "title": "Madrid",
      "latitude": 40.4167,
      "longitude": -3.7033,
      "scale": 0.5
    }, {
      "svgPath": targetSVG,
      "title": "Stockholm",
      "latitude": 59.3328,
      "longitude": 18.0645,
      "scale": 0.5
    }, {
      "svgPath": targetSVG,
      "title": "Bern",
      "latitude": 46.9480,
      "longitude": 7.4481,
      "scale": 0.5
    }, {
      "svgPath": targetSVG,
      "title": "Kiev",
      "latitude": 50.4422,
      "longitude": 30.5367,
      "scale": 0.5
    }, {
      "svgPath": targetSVG,
      "title": "Paris",
      "latitude": 48.8567,
      "longitude": 2.3510,
      "scale": 0.5
    }, {
      "svgPath": targetSVG,
      "title": "New York",
      "latitude": 40.43,
      "longitude": -74,
      "scale": 0.5
    } ]
  },

  "areasSettings": {
    "unlistedAreasColor": "#FFCC00",
    "unlistedAreasAlpha": 0.9
  },

  "imagesSettings": {
    "color": "#CC0000",
    "rollOverColor": "#CC0000",
    "selectedColor": "#000000"
  },

  "linesSettings": {
    "arc": -0.7, // this makes lines curved. Use value from -1 to 1
    "arrow": "middle",
    "color": "#CC0000",
    "alpha": 0.4,
    "arrowAlpha": 1,
    "arrowSize": 4
  },
  "zoomControl": {
    "gridHeight": 100,
    "draggerAlpha": 1,
    "gridAlpha": 0.2
  },

  "backgroundZoomsToTop": true,
  "linesAboveImages": true,
  
  "export": {
    "enabled": true
  }
} );
</script>

<!-- HTML -->
<div id="chartdiv"></div>


<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}

.map-marker {
    /* adjusting for the marker dimensions
    so that it is centered on coordinates */
    margin-left: -8px;
    margin-top: -8px;
}
.map-marker.map-clickable {
    cursor: pointer;
}
.pulse {
    width: 10px;
    height: 10px;
    border: 5px solid #f7f14c;
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    border-radius: 30px;
    background-color: #716f42;
    z-index: 10;
    position: absolute;
  }
.map-marker .dot {
    border: 10px solid #fff601;
    background: transparent;
    -webkit-border-radius: 60px;
    -moz-border-radius: 60px;
    border-radius: 60px;
    height: 50px;
    width: 50px;
    -webkit-animation: pulse 3s ease-out;
    -moz-animation: pulse 3s ease-out;
    animation: pulse 3s ease-out;
    -webkit-animation-iteration-count: infinite;
    -moz-animation-iteration-count: infinite;
    animation-iteration-count: infinite;
    position: absolute;
    top: -20px;
    left: -20px;
    z-index: 1;
    opacity: 0;
  }
  @-moz-keyframes pulse {
   0% {
      -moz-transform: scale(0);
      opacity: 0.0;
   }
   25% {
      -moz-transform: scale(0);
      opacity: 0.1;
   }
   50% {
      -moz-transform: scale(0.1);
      opacity: 0.3;
   }
   75% {
      -moz-transform: scale(0.5);
      opacity: 0.5;
   }
   100% {
      -moz-transform: scale(1);
      opacity: 0.0;
   }
  }
  @-webkit-keyframes "pulse" {
   0% {
      -webkit-transform: scale(0);
      opacity: 0.0;
   }
   25% {
      -webkit-transform: scale(0);
      opacity: 0.1;
   }
   50% {
      -webkit-transform: scale(0.1);
      opacity: 0.3;
   }
   75% {
      -webkit-transform: scale(0.5);
      opacity: 0.5;
   }
   100% {
      -webkit-transform: scale(1);
      opacity: 0.0;
   }
  }
</style>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/ammap.js"></script>
<script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

<!-- Chart code -->
<script>
/**
 * This example uses pulsating circles CSS by Kevin Urrutia
 * http://kevinurrutia.tumblr.com/post/16411271583/creating-a-css3-pulsating-circle
 */

var map = AmCharts.makeChart( "chartdiv", {
  "type": "map",
  "theme": "light",
  "projection": "miller",

  "imagesSettings": {
    "rollOverColor": "#089282",
    "rollOverScale": 3,
    "selectedScale": 3,
    "selectedColor": "#089282",
    "color": "#13564e"
  },

  "areasSettings": {
    "unlistedAreasColor": "#15A892"
  },

  "dataProvider": {
    "map": "worldLow",
    "images": [ {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Brussels",
      "latitude": 50.8371,
      "longitude": 4.3676
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Copenhagen",
      "latitude": 55.6763,
      "longitude": 12.5681
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Paris",
      "latitude": 48.8567,
      "longitude": 2.3510
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Reykjavik",
      "latitude": 64.1353,
      "longitude": -21.8952
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Moscow",
      "latitude": 55.7558,
      "longitude": 37.6176
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Madrid",
      "latitude": 40.4167,
      "longitude": -3.7033
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "London",
      "latitude": 51.5002,
      "longitude": -0.1262,
      "url": "http://www.google.co.uk"
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Peking",
      "latitude": 39.9056,
      "longitude": 116.3958
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "New Delhi",
      "latitude": 28.6353,
      "longitude": 77.2250
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Tokyo",
      "latitude": 35.6785,
      "longitude": 139.6823,
      "url": "http://www.google.co.jp"
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Ankara",
      "latitude": 39.9439,
      "longitude": 32.8560
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Buenos Aires",
      "latitude": -34.6118,
      "longitude": -58.4173
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Brasilia",
      "latitude": -15.7801,
      "longitude": -47.9292
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Ottawa",
      "latitude": 45.4235,
      "longitude": -75.6979
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Washington",
      "latitude": 38.8921,
      "longitude": -77.0241
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Kinshasa",
      "latitude": -4.3369,
      "longitude": 15.3271
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Cairo",
      "latitude": 30.0571,
      "longitude": 31.2272
    }, {
      "zoomLevel": 5,
      "scale": 0.5,
      "title": "Pretoria",
      "latitude": -25.7463,
      "longitude": 28.1876
    } ]
  }
} );

// add events to recalculate map position when the map is moved or zoomed
map.addListener( "positionChanged", updateCustomMarkers );

// this function will take current images on the map and create HTML elements for them
function updateCustomMarkers( event ) {
  // get map object
  var map = event.chart;

  // go through all of the images
  for ( var x in map.dataProvider.images ) {
    // get MapImage object
    var image = map.dataProvider.images[ x ];

    // check if it has corresponding HTML element
    if ( 'undefined' == typeof image.externalElement )
      image.externalElement = createCustomMarker( image );

    // reposition the element accoridng to coordinates
    var xy = map.coordinatesToStageXY( image.longitude, image.latitude );
    image.externalElement.style.top = xy.y + 'px';
    image.externalElement.style.left = xy.x + 'px';
  }
}

// this function creates and returns a new marker element
function createCustomMarker( image ) {
  // create holder
  var holder = document.createElement( 'div' );
  holder.className = 'map-marker';
  holder.title = image.title;
  holder.style.position = 'absolute';

  // maybe add a link to it?
  if ( undefined != image.url ) {
    holder.onclick = function() {
      window.location.href = image.url;
    };
    holder.className += ' map-clickable';
  }

  // create dot
  var dot = document.createElement( 'div' );
  dot.className = 'dot';
  holder.appendChild( dot );

  // create pulse
  var pulse = document.createElement( 'div' );
  pulse.className = 'pulse';
  holder.appendChild( pulse );

  // append the marker to the map container
  image.chart.chartDiv.appendChild( holder );

  return holder;
}
</script>

<!-- HTML -->
<div id="chartdiv"></div>