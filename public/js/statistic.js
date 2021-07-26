/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/statistic.js":
/*!***********************************!*\
  !*** ./resources/js/statistic.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

Vue.config.devtools = true;
Vue.component('month-chart', {
  props: ['id'],
  "extends": VueChartJs.Bar,
  data: function data() {
    return {
      periodo: [],
      count: [],
      data_ordini: [],
      data_totale: [],
      structure: {}
    };
  },
  mounted: function mounted() {
    var _this = this;

    this.caricaChar();
    setTimeout(function () {
      _this.renderChar();
    }, 5000);
  },
  methods: {
    caricaChar: function caricaChar() {
      var _this2 = this;

      axios.get('/api/admin/' + this.id + '/statistics').then(function (response) {
        for (data in response.data) {
          if (!_this2.periodo.includes(response.data[data].created_at)) {
            _this2.periodo.push(response.data[data].created_at);

            _this2.count.push({
              data: response.data[data].created_at,
              volte: 1,
              totale: parseInt(response.data[data].total_price)
            });
          } else {
            _this2.count.forEach(function (array_element) {
              if (array_element.data === response.data[data].created_at) {
                array_element.volte += 1;
                array_element.totale += parseInt(response.data[data].total_price);
              }
            });
          }
        } // response.data.forEach(element => {
        //     if (!this.periodo.includes(element.created_at)) {
        //         this.periodo.push(element.created_at);
        //         this.count.push({
        //             data: element.created_at,
        //             volte: 1,
        //             totale: parseInt(element.total_price)
        //         });
        //     } else {
        //         this.count.forEach(array_element => {
        //             if (array_element.data === element.created_at) {
        //                 array_element.volte += 1;
        //                 array_element.totale += parseInt(element.total_price)
        //             }
        //         })
        //     }
        // })

      });
    },
    renderChar: function renderChar() {
      var _this3 = this;

      this.count.forEach(function (element) {
        _this3.data_ordini.push(element.volte);

        _this3.data_totale.push(element.totale);
      });
      $('.lds-roller').hide();
      this.renderChart({
        labels: this.periodo,
        datasets: [{
          label: 'Ordini',
          backgroundColor: '#FFA823',
          data: this.data_ordini
        }, {
          label: 'Totale in Euro',
          backgroundColor: '#24A1FF',
          data: this.data_totale
        }]
      }, {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        },
        title: {
          display: true,
          text: 'Statistiche per mese',
          font: {
            weight: 'bold'
          },
          fontSize: 40
        }
      });
    }
  }
});
Vue.component('year-chart', {
  "extends": VueChartJs.Bar,
  props: ['id'],
  data: function data() {
    return {
      periodo: [],
      count: [],
      data_ordini: [],
      data_totale: [],
      structure: {}
    };
  },
  mounted: function mounted() {
    var _this4 = this;

    this.caricaChar();
    setTimeout(function () {
      _this4.renderChar();
    }, 5000);
  },
  methods: {
    caricaChar: function caricaChar() {
      var _this5 = this;

      axios.get('/api/admin/' + this.id + '/statistics').then(function (response) {
        for (data in response.data) {
          var split = response.data[data].created_at.split('-');
          response.data[data].created_at = split[0];

          if (!_this5.periodo.includes(response.data[data].created_at)) {
            _this5.periodo.push(response.data[data].created_at);

            _this5.count.push({
              data: response.data[data].created_at,
              volte: 1,
              totale: parseInt(response.data[data].total_price)
            });
          } else {
            _this5.count.forEach(function (array_element) {
              if (array_element.data === response.data[data].created_at) {
                array_element.volte += 1;
                array_element.totale += parseInt(response.data[data].total_price);
              }
            });
          }
        } // response.data.forEach(element => {
        //     let split = element.created_at.split('-');
        //     element.created_at = split[0];
        //     if (!this.periodo.includes(element.created_at)) {
        //         this.periodo.push(element.created_at);
        //         this.count.push({
        //             data: element.created_at,
        //             volte: 1,
        //             totale: parseInt(element.total_price)
        //         });
        //     } else {
        //         this.count.forEach(array_element => {
        //             if (array_element.data === element.created_at) {
        //                 array_element.volte += 1;
        //                 array_element.totale += parseInt(element.total_price)
        //             }
        //         })
        //     }
        // })

      });
    },
    renderChar: function renderChar() {
      var _this6 = this;

      this.count.forEach(function (element) {
        _this6.data_ordini.push(element.volte);

        _this6.data_totale.push(element.totale);
      });
      this.visible = !this.visible;
      $('.lds-roller').hide();
      this.renderChart({
        labels: this.periodo,
        datasets: [{
          label: 'Ordini',
          backgroundColor: '#FFA823',
          data: this.data_ordini
        }, {
          label: 'Totale in Euro',
          backgroundColor: '#24A1FF',
          data: this.data_totale
        }]
      }, {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        },
        title: {
          display: true,
          text: 'Statistiche per anno',
          font: {
            weight: 'bold'
          },
          fontSize: 40
        }
      });
    }
  }
});
var vm = new Vue({
  el: '#root',
  data: {
    status: true,
    openBasket: false
  }
});

/***/ }),

/***/ 2:
/*!*****************************************!*\
  !*** multi ./resources/js/statistic.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\Endrit Morina\github\progetto-finale\deliveboo\resources\js\statistic.js */"./resources/js/statistic.js");


/***/ })

/******/ });