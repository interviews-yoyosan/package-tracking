
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('tracker', require('./components/Tracker.vue'));

const app = new Vue({
    el: '#app',
    data: {
    	sId: '',
    	answer: '',
    	dataP: []
    },
    watch: {
		// whenever sId changes, this function will run
		sId: function () {
			this.answer = 'Waiting for you to stop typing...'
			this.getShipmentData()
		}
    },
    methods: {
	    getShipmentData: _.debounce(
	      function () {
	        this.answer = 'Thinking...'
	        this.dataP = []
	        var vm = this

	        if (!this.sId) {
	        	this.answer = ''
	        	this.dataP = []
	        	return
	        }

	        axios.get('api/shipment/' + this.sId)
	          .then(function (response) {
	            vm.dataP = response.data
	            vm.answer = 'Shipment #' + vm.sId + ' found!'
	          })
	          .catch(function (error) {
	            vm.answer = 'Shipment #' + vm.sId + ' not found :('
	            vm.dataP = []
	          })
	      },
	      // This is the number of milliseconds we wait for the
	      // user to stop typing.
	      500
	    )
    }
});
