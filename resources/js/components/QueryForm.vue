<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <form class="" action="" method="" @submit.prevent="query">
                    <div class="row form">
                        <div class="col-md-4">
                            <label for="city" class="form-lable">Dove vuoi andare?</label>
                            <input type="search" v-model="city" id="city" name="city" class="form-control"
                                placeholder="Inserisci la Città" />
                        </div>


                        <!--      {{-- <div class="col-md-3 d-flex flex-column">
                        <label for="slider-range" class="form-lable">Raggio di ricerca: </label>
                        <div class="d-felx">
                            <input id="slider-range" class="mt-2" name="range" type="range" min="0" max="100" value="20" oninput="this.nextElementSibling.value = this.value" />
                            <output class="ml-2"> 20 </output>
                            <span class="font-weight-bold ml-2">Km</span>
                        </div>
                    </div> --}} -->


                        <div class="col-md-4">
                            <label for="rooms" class="form-lable">Numero stanze</label>
                            <input type="number" v-model="rooms" id="rooms" name="rooms" class="form-control"
                                placeholder="Inserisci N°stanze" min="0" />


                        </div>

                        <div class="col-md-4">
                            <label for="beds" class="form-lable">Posti letto</label>
                            <input type="number" v-model="beds" id="beds" name="beds" class="form-control"
                                placeholder="Inserisci N°letti" min="0" />
                        </div>

                    </div>
                    <div class="row text-center pt-3">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary form-group" id="query">Cerca</button>
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
            }
        },

        methods: {
            query() {
                this.$emit('query', {
                    city: this.city,
                    rooms: this.rooms,
                    beds: this.beds
                    
                });
                // generate the
                let url = `/search?rooms[operator]=>&rooms[value]=${this.rooms}&city=${this.city}&beds[operator]=>&beds[value]=${this.beds}`;
                // generate url like: search?rooms[operator]=%3E&rooms[value]=2?beds[operator]=%3E&beds[value]=2
                window.location.href = url;
                            }
        }
       

    }


    // 


    // ENDPOINT 
    // http://127.0.0.1:8000/search?rooms[operator]=%3E&rooms[value]=2?beds[operator]=%3E&beds[value]=2

</script>
