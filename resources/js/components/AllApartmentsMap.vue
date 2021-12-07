<template>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                    <div id='map' class='map'></div>
            </div>
        </div>
    </div>
</template>

<style scoped>
     #map {

            height: 450px;

        }

</style>

<script>
    export default {

        props: ['coordinates'],


        mounted() {
             // Initialize the map
            var map = tt.map({
                key: "yNgX4mXdpmkOXOoS76g8oRrlZcAmGUPm",
                container: 'map',
                center: [15.4, 53.0],
                zoom: 3
            });
            // Add the control to the map
            map.addControl(new tt.FullscreenControl());
            map.addControl(new tt.NavigationControl());

            this.coordinates.forEach(element => {
                let lat = element.latitude;
                let lng = element.longitude;
                var marker = new tt.Marker().setLngLat([lng, lat]).addTo(map);
                console.log(element);
            });

            map.setCenter([this.coordinates[0].longitude, this.coordinates[0].latitude]);
            map.setZoom(10);

        }
    }
</script>
