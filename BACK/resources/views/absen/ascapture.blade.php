<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        #map{
            width: 800px; height: 600px
        }

        /* full-screen */
        /* #map{
           position: absolute; top: 0; bottom: 0; left: 0; right: 0;
        } */

    </style>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
   


<title>Document</title>
</head>
<body>
    
    <button style="display: none;" id="show">Tombol</button>
    <br>

        <div id="map"></div>
        <script>
     

            if(navigator.geolocation)
        navigator.geolocation.getCurrentPosition(async (position) => {
            const {longitude, latitude} = position.coords
            console.log({longitude, latitude}, "$$$$");


            //reverse Geocode
            //ArcGis
            const response = await fetch(`https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/reverseGeocode?f=pjson&featureTypes=&location=${longitude},${latitude}`);

            //SMKN 4 lat long
            // const response = await fetch(`https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/reverseGeocode?f=pjson&featureTypes=&location=106.82495915539648,-6.640523646800744`);
            const data = await response.json();

            console.log(data, "$$$$");
            var map = L.map('map').setView([0,0], 1);

            L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=JDV8J2OirHdUiQjta8Rb', {
                attribution : '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
            }).addTo(map);
            // var marker = L.marker([latitude, longitude]).addTo(map);

            var circle = L.circle([latitude, longitude], {
                color : 'red',
                fillColor : '#f03',
                fillOpacity : 0.5,
                radius : 500

            }).addTo(map);

            if (data.address.Match_addr == "SMK Negeri 4 Bogor" || "Jalan Royal Boulevard 2-8, Bogor Selatan, Bogor Kota, Jawa Barat, 16134"){
                circle.bindPopup("Anda berada di sekitar : " + data.address.Match_addr);
                document.getElementById("show").style.display="block";
            }
            else{
                // marker.bindPopup("Anda berada di sekitar : " + data.address.LongLabel).openPopup();
                circle.bindPopup("Anda tidak berada di sekitar SMKN 4");
                document.getElementById("show").style.display="none";
            }
            

        });
    else
         console.log('maaf anda kentang');
       
    </script>
</body>
</html>