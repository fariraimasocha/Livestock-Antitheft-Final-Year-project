<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <style>
        .text-center {
            text-align: center;
        }
        #map {
            width: 100% !important;
            height: 600px;
        }
    </style>
    <link rel='stylesheet' href='https://unpkg.com/leaflet@1.8.0/dist/leaflet.css' crossorigin='' />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <title>...map</title>
</head>
<body>
<div class="flex space-x-3 py-7 px-2 ">
    <a href="{{route('home')}}">
        <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
            Home
        </button>
    </a>
    <h1 class='font-light  text-gray-800 text-4xl text-center '>All Animal Locations</h1>
</div>
<div id='map'></div>
<script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>
<script>
    let map, markers = [], polyline;
    /* ----------------------------- Initialize Map ----------------------------- */
    function initMap() {
        map = L.map('map', {
            center: {
                lat: -17.782380,
                lng: 31.051826,
            },
            zoom: 6
        });

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(map);

        map.on('click', mapClicked);
        initMarkers();
    }
    initMap();

    /* --------------------------- Initialize Markers --------------------------- */
    function initMarkers() {
        const initialMarkers = <?php echo json_encode($initialMarkers); ?>;

        for (let index = 0; index < initialMarkers.length; index++) {
            const data = initialMarkers[index];
            const marker = generateMarker(data, index);
            marker.addTo(map).bindPopup(`<b>${data.position.lat},  ${data.position.lng}</b>`);
            map.panTo(data.position);
            markers.push(marker)
        }
        updatePolyline();
    }

    function generateMarker(data, index) {
        return L.marker(data.position, {
            draggable: data.draggable
        })
            .on('click', (event) => markerClicked(event, index))
            .on('dragend', (event) => markerDragEnd(event, index));
    }

    /* ------------------------- Handle Map Click Event ------------------------- */
    function mapClicked($event) {
        console.log(map);
        console.log($event.latlng.lat, $event.latlng.lng);
    }

    /* ------------------------ Handle Marker Click Event ----------------------- */
    function markerClicked($event, index) {
        console.log(map);
        console.log($event.latlng.lat, $event.latlng.lng);
    }

    /* ----------------------- Handle Marker DragEnd Event ---------------------- */
    function markerDragEnd($event, index) {
        console.log(map);
        console.log($event.target.getLatLng());
        updatePolyline();
    }

    /* ----------------------- Update Polyline ---------------------- */
    function updatePolyline() {
        if (polyline) {
            map.removeLayer(polyline);
        }
        const positions = markers.map(marker => marker.getLatLng());
        polyline = L.polyline(positions, { color: 'blue' }).addTo(map);
    }
</script>
</body>
</html>
