<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">

                <form class="" action="" method="" @submit.prevent="query">
                    <div class="row form">
                        <div class="col-md-3">
                            <label for="city" class="form-lable">Dove vuoi andare?</label>
                            <input type="search" v-model="city" id="city" name="city" class="form-control"
                                placeholder="Inserisci la Città" />
                        </div>

                        <div class  = "col-md-3">
                            <label for ="radius" class="form-lable">Raggio di ricerca</label>
                            <select v-model="radius" id="radius" name="radius" class="form-control">
                                <option value="20">20km</option>
                                <option value="50">50km</option>
                                <option value="100">100km</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="rooms" class="form-lable">Numero stanze</label>
                            <input type="number" v-model="rooms" id="rooms" name="rooms" class="form-control" placeholder="Inserisci N°stanze" min="0" />
                        </div>

                        <div class="col-md-3">
                            <label for="beds" class="form-lable">Posti letto</label>
                            <input type="number" v-model="beds" id="beds" name="beds" class="form-control" placeholder="Inserisci N°letti" min="0" />
                        </div>

                        <div class="col-12 text-center pt-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary form-group" id="query">Cerca</button>
                            </div>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: 'QueryForm',
        data() {
            return {
                city: '',
                rooms: '',
                beds: '',
                radius: '',


            }
        },

        methods: {
            query() {
                this.$emit('query', {
                    city: this.city,
                    rooms: this.rooms,
                    beds: this.beds,
                    radius: this.radius,


                });

                let url = `/search?rooms[value]=${this.rooms}&city=${this.city}&beds[value]=${this.beds}&radius=${this.radius}`;

                window.location.href = url;

                }
        }


    }


    //


    // ENDPOINT
    // http://127.0.0.1:8000/search?rooms[operator]=%3E&rooms[value]=2?beds[operator]=%3E&beds[value]=2

</script>
