<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
              
                <form class="" action="" method="" @submit.prevent="query">
                    

            <div class="form-group">
                <h4>Filtra per servizi:</h4>

                

                @foreach ($id_apartments as $id_apartment)
                    <input name="id_apartments[]" id="id_apartments" value="{{ $id_apartment }}" type="hidden">
                @endforeach


                @foreach ($services as $service)
                <div class="form-check form-check-inline">
                    {{-- services[] coterrà tutti i valori che noi selezioneremo --}}
                    <input {{ in_array($service['id'], old('services', [])) ? 'checked' : null }} value="{{ $service['id'] }}"
                        id="{{ 'tag' . $service['id'] }}" type="checkbox" name="services[]" class="form-check-input">
                    <label for="{{ 'service' . $service['id'] }}"
                        class="form-check-label">{{ $service['service_name'] }}</label>
                </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Filtra</button>
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

                let url =
                    `/search?rooms[operator]=>&rooms[value]=${this.rooms}&city=${this.city}&beds[operator]=>&beds[value]=${this.beds}&radius=${this.radius}`;

                window.location.href = url;

            }
        }


    }


    //


    // ENDPOINT
    // http://127.0.0.1:8000/search?rooms[operator]=%3E&rooms[value]=2?beds[operator]=%3E&beds[value]=2

</script>
