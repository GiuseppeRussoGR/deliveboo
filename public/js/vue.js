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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/vue.js":
/*!*****************************!*\
  !*** ./resources/js/vue.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var app = new Vue({
  el: '#root',
  data: {
    types: [],
    restaurants: [],
    dishes: [],
    order: {
      total_price: 0,
      client_name: 'asd',
      client_address: 'asd',
      client_number: "0321654",
      dishes: [// {
        //     id: 1,
        //     quantita: 10,
        //     ristorante: 0
        // }
      ]
    },
    categoryChosen: false,
    restaurantChosen: false,
    chosenRestaurantIndex: 0,
    openBasket: false
  },
  methods: {
    /**
     * Funzione che permette di ricevere via API i ristoranti
     * @param parameter eventuale parametro di query string
     * @param id id univoco da ricercare
     * @param route string route di destinazione dell'API
     * @param variable string variabile da popolare
     */
    getApi: function getApi(route, variable, id, parameter) {
      var _this = this;

      this[variable] = [];
      axios.get(route + id, {
        params: {
          value: parameter
        }
      }).then(function (response) {
        _this[variable] = response.data;
      });
    },

    /**
     *Funzione che permette l'inserimento dei prodotti nel carrello
     * @param dishIndex indice del piatto selezionato
     * @param quantity quantità del prodotto selezionato
     */
    insertBasket: function insertBasket(dishIndex, quantity) {
      var select_dish = this.dishes[dishIndex];
      var order_dishes = this.order.dishes;
      var restaurant_select = this.chosenRestaurantIndex;

      if (order_dishes.some(function (dish) {
        return dish.ristorante === restaurant_select;
      }) || order_dishes.length === 0) {
        if (order_dishes.some(function (dish) {
          return dish.id === select_dish.id;
        })) {
          var dish_index = order_dishes.map(function (element) {
            return element.id;
          }).indexOf(select_dish.id);
          order_dishes[dish_index].quantita += parseInt(quantity);
          order_dishes[dish_index].totale_singolo = parseInt(order_dishes[dish_index].quantita) * parseFloat(select_dish.price);
        } else {
          order_dishes.push({
            id: select_dish.id,
            quantita: parseInt(quantity),
            ristorante: parseInt(restaurant_select),
            nome: select_dish.name,
            prezzo_singolo: parseFloat(select_dish.price),
            totale_singolo: parseInt(quantity) * parseFloat(select_dish.price)
          });
        }
      } else {
        //TODO inserire errore da visualizzare in caso si tenti di inserire un altro ristorante
        console.log('non puoi inserirlo');
      }

      this.order.total_price += select_dish.price * parseInt(quantity);
    },

    /**
     * Funzione che permette di aumentare o diminuire il valore di input
     * @param input_type elemento HTML selezionato con JQUERY
     * @param value valore di aumento '+' o di decremento '-'
     */
    setQuantity: function setQuantity(input_type, value) {
      var value_select = input_type.val();

      if (value === '+') {
        value_select++;
      } else if (value === '-' && value_select > 1) {
        value_select--;
      }

      input_type.val(value_select);
    },

    /**
     * Funzione che permette di inserire l'ordine nel DB
     */
    setOrder: function setOrder() {
      /**
       * Esempio di chiamata per l'ordine
       */
      axios.post('api/order', _objectSpread({}, this.order)).then(function (response) {
        console.log(response.data);
      });
    }
  },
  mounted: function mounted() {
    this.getApi('api/types/', 'types', '');
  }
});
Vue.config.devtools = true;

/***/ }),

/***/ 1:
/*!***********************************!*\
  !*** multi ./resources/js/vue.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\girav\Desktop\Boolean Progetto\deliveboo\resources\js\vue.js */"./resources/js/vue.js");


/***/ })

/******/ });