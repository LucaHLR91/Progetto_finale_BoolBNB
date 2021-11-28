<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div id='map' class='map'></div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
     #map {
            width: 450px;
            height: 500px;
            margin-top: 30px;
        }

</style>

<script>
    export default {
       
        mounted() {
             // Initialize the map
            var map = tt.map({
                key: process.env.MIX_TOMTOM_API_KEY,
                // key: 'yNgX4mXdpmkOXOoS76g8oRrlZcAmGUPM',
                container: 'map',
                center: [15.4, 53.0],
                zoom: 12,
                zoom: 3
            });
            // Add the control to the map
            map.addControl(new tt.FullscreenControl());
            map.addControl(new tt.NavigationControl());
        }
    }
</script>