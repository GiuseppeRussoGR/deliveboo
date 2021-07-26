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
/*! no exports provided */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\resources\\js\\vue.js: Unexpected token (131:0)\n\n\u001b[0m \u001b[90m 129 |\u001b[39m                 }\u001b[0m\n\u001b[0m \u001b[90m 130 |\u001b[39m                 input_type\u001b[33m.\u001b[39mval(value_select)\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 131 |\u001b[39m \u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<\u001b[39m \u001b[33mHEAD\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m     |\u001b[39m \u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 132 |\u001b[39m                 \u001b[36mthis\u001b[39m\u001b[33m.\u001b[39mrefreshQuantities()\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 133 |\u001b[39m \u001b[33m===\u001b[39m\u001b[33m===\u001b[39m\u001b[33m=\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 134 |\u001b[39m\u001b[0m\n    at Parser._raise (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:816:17)\n    at Parser.raiseWithData (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:809:17)\n    at Parser.raise (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:770:17)\n    at Parser.unexpected (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:9893:16)\n    at Parser.parseExprAtom (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:11307:20)\n    at Parser.parseExprSubscripts (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10881:23)\n    at Parser.parseUpdate (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10861:21)\n    at Parser.parseMaybeUnary (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10839:23)\n    at Parser.parseExprOps (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10696:23)\n    at Parser.parseMaybeConditional (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10670:23)\n    at Parser.parseMaybeAssign (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10633:21)\n    at Parser.parseExpressionBase (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10573:23)\n    at C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10567:39\n    at Parser.allowInAnd (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:12328:16)\n    at Parser.parseExpression (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10567:17)\n    at Parser.parseStatementContent (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:12665:23)\n    at Parser.parseStatement (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:12534:17)\n    at Parser.parseBlockOrModuleBlockBody (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:13123:25)\n    at Parser.parseBlockBody (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:13114:10)\n    at Parser.parseBlock (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:13098:10)\n    at Parser.parseFunctionBody (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:11989:24)\n    at Parser.parseFunctionBodyAndFinish (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:11973:10)\n    at Parser.parseMethod (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:11923:10)\n    at Parser.parseObjectMethod (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:11851:19)\n    at Parser.parseObjPropValue (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:11884:23)\n    at Parser.parsePropertyDefinition (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:11808:10)\n    at Parser.parseObjectLike (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:11699:25)\n    at Parser.parseExprAtom (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:11223:23)\n    at Parser.parseExprSubscripts (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10881:23)\n    at Parser.parseUpdate (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10861:21)\n    at Parser.parseMaybeUnary (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10839:23)\n    at Parser.parseExprOps (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10696:23)\n    at Parser.parseMaybeConditional (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10670:23)\n    at Parser.parseMaybeAssign (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10633:21)\n    at C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10595:39\n    at Parser.allowInAnd (C:\\Users\\Endrit Morina\\github\\progetto-finale\\deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:12334:12)");

/***/ }),

/***/ 1:
/*!***********************************!*\
  !*** multi ./resources/js/vue.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\Endrit Morina\github\progetto-finale\deliveboo\resources\js\vue.js */"./resources/js/vue.js");


/***/ })

/******/ });