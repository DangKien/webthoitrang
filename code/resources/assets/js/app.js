
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });

require( './DataTables/datatables.js' );
require( './DataTables/datatables.css' );

// require( 'jszip' );
// require( 'datatables.net-dt' )();
// require( 'datatables.net-buttons-dt' )();
// require( 'datatables.net-buttons/js/buttons.flash.js' )();
// require( 'datatables.net-buttons/js/buttons.html5.js' )();
// require( 'datatables.net-buttons/js/buttons.print.js' )();
// require( 'datatables.net-colreorder-dt' )();
// require( 'datatables.net-fixedcolumns-dt' )();
// require( 'datatables.net-fixedheader-dt' )();
// require( 'datatables.net-responsive-dt' )();
// require( 'datatables.net-rowgroup-dt' )();
// require( 'datatables.net-rowreorder-dt' )();
// require( 'datatables.net-scroller-dt' )();
// require( 'datatables.net-select-dt' )();


jQuery(document).ready(function($){
	$('.datatable-index-news').DataTable();
});