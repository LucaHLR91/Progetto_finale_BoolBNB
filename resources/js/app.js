/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
              'all-apartments-map', require ('./components/AllApartmentsMap.vue').default,
              'query-form', require ('./components/QueryForm.vue').default,
              'insert-address-form', require ('./components/InsertAddress.vue').default,
                 );  

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components: {
        
        'all-apartments-map': require('./components/AllApartmentsMap.vue').default,
        'query-form': require('./components/QueryForm.vue').default,
        'insert-address-form': require('./components/InsertAddress.vue').default,    
    },
});




// function generateUrl(city, range, rooms, beds) {
//     let url = "/search?";
//     if (city) {
//         url += "city=" + city;
//     }
//     if (range) {
//         url += "&range=" + range;
//     }
//     if (rooms) {
//         url += "&rooms[" > "]=" + rooms;
//     }
//     if (beds) {
//         url += "&beds[" > "]=" + beds;
//     }
//     console.log(url);
//     return url;
// }

// // get url from search form
// function getUrl() {
//     let city = $("#city").val();
//     let range = $("#slider-range").val();
//     let rooms = $("#rooms").val();
//     let beds = $("#beds").val();
//     return generateUrl(city, range, rooms, beds);
// }

// function query() {
//     let url = getUrl();
//     console.log(url);
//     axios.get(url)
//         .then(function (response) {
//             console.log(response);
//             let houses = response.data;
//         }).catch(function (error) {
//             console.log(error);
//         });
// }

// // event listener for search button after dom laod

// document.addEventListener('DOMContentLoaded', function () {
//     console.log("DOM loaded");
//     document.getElementById('query').addEventListener('click', query);
// });


