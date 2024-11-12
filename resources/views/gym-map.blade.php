<x-guest-layout>
    <style>
    #map {
        height: 300px;
        /* Adjust this value as needed */
    }
    </style>
    <link href="{{ asset('css/map.css') }}" rel="stylesheet" defer>

    <body class="w-full">
        <div role="group" dir="ltr" class="darkmode" tabindex="0" style="outline: none;" hidden>
            <x-custom.darkmode />
        </div>
        <div id="map"></div>
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <script>
        const gymLocation = [10.5202453, 124.0163538];
        // Initialize map with zoom options             
        const map = L.map('map', {
            center: gymLocation,
            zoom: 15,
            minZoom: 10, // Set minimum zoom level                 
            maxZoom: 18, // Set maximum zoom level                 
            zoomAnimation: true, // Enable zoom animation             
        });
        // Adjust map container height using Leaflet             
        map.whenReady(function() {
            const mapElement = document.getElementById('map');
            if (mapElement) {
                mapElement.style.height = '300px'; // Adjusted height                     
                mapElement.style.marginTop = '2vh'; // Adjusted margin top                     
                map.invalidateSize(); // Ensure the map is properly resized                 
            }
        });
        const lightTileLayer = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            maxZoom: 19,
        });
        const darkTileLayer = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
            maxZoom: 19,
        }).addTo(map);

        L.marker(gymLocation).addTo(map)
            .bindPopup('Gym One')
            .openPopup();

        // Dark mode toggle script (modified to default to dark)             
        function applyDarkModePreference() {
            document.documentElement.classList.add("dark");
            document.getElementById("toggleDarkLightMode").checked = true;
            darkTileLayer.addTo(map);
        }

        document.getElementById("toggleDarkLightMode").addEventListener("change", function() {
            if (this.checked) {
                document.documentElement.classList.add("dark");
                localStorage.setItem("dark-mode", !0);
                map.removeLayer(lightTileLayer);
                darkTileLayer.addTo(map);
            } else {
                document.documentElement.classList.remove("dark");
                localStorage.setItem("dark-mode", !1);
                map.removeLayer(darkTileLayer);
                lightTileLayer.addTo(map);
            }
        });

        // Set dark mode by default
        applyDarkModePreference();

        // Smooth zoom handling             
        map.on('zoomend', function() {
            const currentZoom = map.getZoom();
            console.log("Current Zoom Level:", currentZoom);
        });
        </script>
    </body>
</x-guest-layout>