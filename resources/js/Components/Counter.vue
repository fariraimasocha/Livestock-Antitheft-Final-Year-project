<template>
    <div id="map" :style="{ width: '100%', height: '600px' }"></div>
</template>

<script>
export default {
    name: 'Counter',
    props: {
        initialMarkers: {
            type: Array,
            required: true
        }
    },
    mounted() {
        this.loadLeaflet()
            .then(() => {
                this.initializeMap();
            })
            .catch(error => {
                console.error('Error loading Leaflet:', error);
            });
    },
    methods: {
        loadLeaflet() {
            return new Promise((resolve, reject) => {
                if (typeof L === 'undefined') {
                    const script = document.createElement('script');
                    script.src = 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.js';
                    script.onload = resolve;
                    script.onerror = reject;
                    document.head.appendChild(script);

                    const link = document.createElement('link');
                    link.rel = 'stylesheet';
                    link.href = 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.css';
                    document.head.appendChild(link);
                } else {
                    resolve();
                }
            });
        },
        initializeMap() {
            const map = L.map('map', {
                center: {
                    lat: -19.0154,
                    lng: 29.1549,
                },
                zoom: 4,
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap',
            }).addTo(map);

            this.initialMarkers.forEach(markerData => {
                const marker = L.marker(markerData.position, {
                    draggable: markerData.draggable,
                })
                    .addTo(map)
                    .bindPopup(`<b>${markerData.position.lat}, ${markerData.position.lng}</b>`);
                map.panTo(markerData.position);
            });

            map.on('click', (event) => {
                console.log(event.latlng.lat, event.latlng.lng);
            });

            map.on('dragend', (event) => {
                console.log(event.target.getLatLng());
            });
        }
    }
};
</script>

<style scoped>
#map {
    width: 100%;
    height: 600px;
}

.text-center {
    text-align: center;
}
</style>
