<template>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="address">Address</label>
                <div id="search-field"></div>
            </div>
        </div>

    </div>
</template>

<style scoped>
    .form-group {
        color:black;
    }
</style>

<script>
    export default {
        mounted() {


            
                var options = {
                    searchOptions: {
                        key: 'yNgX4mXdpmkOXOoS76g8oRrlZcAmGUPm',
                        language: 'it-IT',
                    },
                    autocompleteOptions: {
                        key: 'yNgX4mXdpmkOXOoS76g8oRrlZcAmGUPm',
                        language: 'it-IT'
                    }
                }

                var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
                console.log(searchBoxHTML);
                var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
                document.getElementById('search-field').append(searchBoxHTML);

                console.log("ttSearchBox");

                document.querySelector('input.tt-search-box-input').name = 'address';
                document.querySelector('input.tt-search-box-input').id = 'search-for-coordinates';
                document.querySelector('input.tt-search-box-input').placeholder = 'Indirizzo';
            

        }
    }

</script>
