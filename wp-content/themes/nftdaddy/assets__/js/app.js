/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/assets/js/app.js":
/*!******************************!*\
  !*** ./src/assets/js/app.js ***!
  \******************************/
/*! namespace exports */
/*! exports [not provided] [no usage info] */
/*! runtime requirements: __webpack_require__, __webpack_require__.n, __webpack_require__.r, __webpack_exports__, __webpack_require__.* */
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var babel_polyfill__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! babel-polyfill */ "./node_modules/babel-polyfill/lib/index.js");
/* harmony import */ var babel_polyfill__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(babel_polyfill__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var normalize_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! normalize-css */ "./node_modules/normalize-css/index.js");
/* harmony import */ var normalize_css__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(normalize_css__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _libs_Factory__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./libs/Factory */ "./src/assets/js/libs/Factory.js");
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }



 // import './libs/Logger'
// import './libs/BrowserSyncAction'

var moduleElements = _toConsumableArray(document.querySelectorAll('[data-module]'));

window.factory = _libs_Factory__WEBPACK_IMPORTED_MODULE_2__.default;
document.addEventListener('DOMContentLoaded', function () {
  _libs_Factory__WEBPACK_IMPORTED_MODULE_2__.default.registerModules(moduleElements);
  var observer = new MutationObserver(function (mutations) {
    mutations.forEach(function (m) {
      var rawElements = [m.target].concat(_toConsumableArray(m.addedNodes));
      var modifyElements = [];
      rawElements.forEach(function (e) {
        if (e.querySelectorAll) {
          modifyElements = [].concat(_toConsumableArray(modifyElements), _toConsumableArray(e.querySelectorAll('[data-module]')));
        }
      });
      var elements = [].concat(_toConsumableArray(rawElements), _toConsumableArray(modifyElements)).filter(function (e) {
        return e.getAttribute && e.getAttribute('data-module') && !e.modules;
      });
      _libs_Factory__WEBPACK_IMPORTED_MODULE_2__.default.registerModules(elements);
    });
  });
  observer.observe(document, {
    subtree: true,
    childList: true
  });
});

/***/ }),

/***/ "./src/assets/js/libs/Factory.js":
/*!***************************************!*\
  !*** ./src/assets/js/libs/Factory.js ***!
  \***************************************/
/*! namespace exports */
/*! export default [provided] [no usage info] [missing usage info prevents renaming] */
/*! other exports [not provided] [no usage info] */
/*! runtime requirements: __webpack_require__, __webpack_exports__, __webpack_require__.r, __webpack_require__.* */
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var Factory = /*#__PURE__*/function () {
  function Factory() {
    _classCallCheck(this, Factory);

    this.modules = {};
    this.names = {};
    this.elements = new WeakMap();
  }

  _createClass(Factory, [{
    key: "registerModules",
    value: function registerModules(elements) {
      var _this = this;

      elements.forEach(function (el) {
        if (el.modules) return;
        var modules = el.getAttribute('data-module') ? el.getAttribute('data-module').split(/(\s|,)/g).filter(function (s) {
          return s.trim().length && !s.includes(',');
        }) : [];
        modules.forEach(function (m) {
          _this.addModule(new (__webpack_require__("./src/assets/js/modules sync recursive ^\\.\\/.*$")("./".concat(m))["default"])(el, m));
        });
      });
    }
  }, {
    key: "addModule",
    value: function addModule(m) {
      this.modules[m.id] = m;

      if (!this.names[m.name]) {
        this.names[m.name] = [];
      }

      this.names[m.name].push(m);

      if (!this.elements.has(m.el)) {
        var newModule = _defineProperty({}, m.name, m);

        this.elements.set(m.el, newModule);
        return m;
      }

      var eleModules = this.elements.get(m.el);
      return eleModules[m.name] = m;
    }
  }, {
    key: "getModuleById",
    value: function getModuleById(id) {
      return this.modules[id];
    }
  }, {
    key: "getModulesByEl",
    value: function getModulesByEl(el) {
      return this.elements.get(el);
    }
  }, {
    key: "getModulesByName",
    value: function getModulesByName(name) {
      return this.names[name];
    }
  }]);

  return Factory;
}();

/* harmony default export */ __webpack_exports__["default"] = (new Factory());

/***/ }),

/***/ "./src/assets/js/libs/ModuleState.js":
/*!*******************************************!*\
  !*** ./src/assets/js/libs/ModuleState.js ***!
  \*******************************************/
/*! namespace exports */
/*! export default [provided] [no usage info] [missing usage info prevents renaming] */
/*! other exports [not provided] [no usage info] */
/*! runtime requirements: __webpack_exports__, __webpack_require__.r, __webpack_require__.* */
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var storage = {};

var refState = function refState(name, initValue) {
  if (!storage[name]) {
    var subs = [];
    var currentValue = initValue;
    storage[name] = {
      get: function get() {
        return currentValue;
      },
      set: function set(value) {
        if (value !== currentValue) {
          currentValue = value;
          subs.forEach(function (s) {
            return s(currentValue);
          });
          return [].concat(subs);
        }

        return false;
      },
      onChange: function onChange(sub) {
        return subs.push(sub);
      }
    };
  }

  return storage[name];
};

/* harmony default export */ __webpack_exports__["default"] = (refState);

/***/ }),

/***/ "./src/assets/js/libs/Observer.js":
/*!****************************************!*\
  !*** ./src/assets/js/libs/Observer.js ***!
  \****************************************/
/*! namespace exports */
/*! export default [provided] [no usage info] [missing usage info prevents renaming] */
/*! export invoker [provided] [no usage info] [missing usage info prevents renaming] */
/*! other exports [not provided] [no usage info] */
/*! runtime requirements: __webpack_require__, __webpack_exports__, __webpack_require__.r, __webpack_require__.d, __webpack_require__.* */
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "invoker": function() { return /* binding */ invoker; }
/* harmony export */ });
/* harmony import */ var _Subscriber__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Subscriber */ "./src/assets/js/libs/Subscriber.js");
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _iterableToArrayLimit(arr, i) { if (typeof Symbol === "undefined" || !(Symbol.iterator in Object(arr))) return; var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }


var pool = {};

var Observer = function Observer() {
  var name = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'eventName.ModuleName.ModuleId';
  var callback = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : function (value) {
    return value;
  };

  var _name$split = name.split(/\./g),
      _name$split2 = _slicedToArray(_name$split, 3),
      eventName = _name$split2[0],
      moduleName = _name$split2[1],
      moduleId = _name$split2[2];

  var sub = new _Subscriber__WEBPACK_IMPORTED_MODULE_0__.default(eventName, callback, name);
  var returnObject = {
    disconnect: function disconnect() {
      var index = (pool[eventName] || {
        "default": []
      })["default"].findIndex(function (s) {
        return s === sub;
      });

      if (index > -1) {
        pool[eventName]["default"].splice(index, 1);
        return;
      }

      index = ((pool[eventName] || {})[moduleName] || {
        "default": []
      })["default"].findIndex(function (s) {
        return s === sub;
      });

      if (index > -1) {
        pool[eventName][moduleName]["default"].splice(index, 1);
        return;
      }

      index = (((pool[eventName] || {})[moduleName] || {})[moduleId] || []).findIndex(function (s) {
        return s === sub;
      });

      if (index > -1) {
        pool[eventName][moduleName][moduleId].splice(index, 1);
        return;
      }
    }
  };

  if (!pool[eventName]) {
    pool[eventName] = {
      "default": []
    };
  }

  var subject = pool[eventName];

  if (!moduleName) {
    subject["default"].push(sub);
    return returnObject;
  }

  if (!subject[moduleName]) {
    subject[moduleName] = {
      "default": []
    };
  }

  subject = subject[moduleName];
  subject["default"].push(sub);
  if (!moduleId) return returnObject;

  if (!subject[moduleId]) {
    subject[moduleId] = [];
  }

  subject[moduleId].push(sub);
  return returnObject;
};

var invoker = function invoker(name, data, publisher) {
  var _name$split3 = name.split(/\./g),
      _name$split4 = _slicedToArray(_name$split3, 3),
      eventName = _name$split4[0],
      moduleName = _name$split4[1],
      moduleId = _name$split4[2];

  var subject = pool[eventName] || {
    "default": []
  };

  var subs = _toConsumableArray(subject["default"]);

  if (!subject[moduleName]) {
    subs.forEach(function (sub) {
      return sub.invoke(data, publisher);
    });
    return;
  }

  subject = subject[moduleName];
  subs = [].concat(_toConsumableArray(subs), _toConsumableArray(subject["default"]));

  if (!subject[moduleId]) {
    subs.forEach(function (sub) {
      return sub.invoke(data, publisher);
    });
    return;
  }

  subject = subject[moduleId];
  subs = [].concat(_toConsumableArray(subs), _toConsumableArray(subject));
  subs.forEach(function (sub) {
    return sub.invoke(data, publisher);
  });
};

/* harmony default export */ __webpack_exports__["default"] = (Observer);


/***/ }),

/***/ "./src/assets/js/libs/Publisher.js":
/*!*****************************************!*\
  !*** ./src/assets/js/libs/Publisher.js ***!
  \*****************************************/
/*! namespace exports */
/*! export default [provided] [no usage info] [missing usage info prevents renaming] */
/*! other exports [not provided] [no usage info] */
/*! runtime requirements: __webpack_require__, __webpack_require__.r, __webpack_exports__, __webpack_require__.d, __webpack_require__.* */
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ Publisher; }
/* harmony export */ });
/* harmony import */ var _Observer__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Observer */ "./src/assets/js/libs/Observer.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }



var Publisher = /*#__PURE__*/function () {
  function Publisher() {
    _classCallCheck(this, Publisher);
  }

  _createClass(Publisher, [{
    key: "publish",
    value: function publish(name, data) {
      (0,_Observer__WEBPACK_IMPORTED_MODULE_0__.invoker)("".concat(name, ".").concat(this.name, ".").concat(this.id), data, this);
    }
  }]);

  return Publisher;
}();



/***/ }),

/***/ "./src/assets/js/libs/RandomString.js":
/*!********************************************!*\
  !*** ./src/assets/js/libs/RandomString.js ***!
  \********************************************/
/*! namespace exports */
/*! export default [provided] [no usage info] [missing usage info prevents renaming] */
/*! other exports [not provided] [no usage info] */
/*! runtime requirements: __webpack_require__.r, __webpack_exports__, __webpack_require__.d, __webpack_require__.* */
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ random; }
/* harmony export */ });
var alphabet = 'QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm';
function random() {
  var length = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 16;
  var str = '';

  while (length) {
    length--;
    str += alphabet[~~(Math.random() * alphabet.length)];
  }

  return str;
}

/***/ }),

/***/ "./src/assets/js/libs/Subscriber.js":
/*!******************************************!*\
  !*** ./src/assets/js/libs/Subscriber.js ***!
  \******************************************/
/*! namespace exports */
/*! export default [provided] [no usage info] [missing usage info prevents renaming] */
/*! other exports [not provided] [no usage info] */
/*! runtime requirements: __webpack_require__, __webpack_require__.r, __webpack_exports__, __webpack_require__.d, __webpack_require__.* */
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ Subscriber; }
/* harmony export */ });
/* harmony import */ var _RandomString__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./RandomString */ "./src/assets/js/libs/RandomString.js");
/* harmony import */ var _ModuleState__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ModuleState */ "./src/assets/js/libs/ModuleState.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }




var Subscriber = /*#__PURE__*/function () {
  function Subscriber(name, action, refName) {
    var _this = this;

    _classCallCheck(this, Subscriber);

    this.name = name;
    this.action = action;
    this.id = (0,_RandomString__WEBPACK_IMPORTED_MODULE_1__.default)();
    this.refState = (0,_ModuleState__WEBPACK_IMPORTED_MODULE_0__.default)(refName);
    this.refState.onChange(function (value) {
      return _this.action && _this.action(value, _this.publisher);
    });
  }

  _createClass(Subscriber, [{
    key: "invoke",
    value: function invoke(data, publisher) {
      if (!this.publisher) {
        this.publisher = publisher;
      }

      if (publisher !== this.publisher) {
        throw Error('invalid invoke from untrusted publisher.');
      }

      this.refState.set(data);
    }
  }]);

  return Subscriber;
}();



/***/ }),

/***/ "./src/assets/js/modules/Accordion.js":
/*!********************************************!*\
  !*** ./src/assets/js/modules/Accordion.js ***!
  \********************************************/
/*! namespace exports */
/*! export default [provided] [no usage info] [missing usage info prevents renaming] */
/*! other exports [not provided] [no usage info] */
/*! runtime requirements: __webpack_require__, __webpack_require__.r, __webpack_exports__, __webpack_require__.d, __webpack_require__.* */
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ Accordion; }
/* harmony export */ });
/* harmony import */ var _BaseModule__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./BaseModule */ "./src/assets/js/modules/BaseModule.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }



var Accordion = /*#__PURE__*/function (_BaseModule) {
  _inherits(Accordion, _BaseModule);

  var _super = _createSuper(Accordion);

  function Accordion() {
    _classCallCheck(this, Accordion);

    return _super.apply(this, arguments);
  }

  _createClass(Accordion, [{
    key: "register",
    value: function register() {
      this.CLS_EXPAND = 'expand';
      this.CLS_SHOWNAV = 'show';
      this.AccordionItem = this.el.querySelectorAll('.accordion-item');
      this.AccordionItem.forEach(function (element) {
        console.log(element);
        element.querySelector('.acc-link').addEventListener('click', function (e) {
          e.preventDefault();
          e.currentTarget.classList.contains('show') ? e.currentTarget.classList.remove('show') : e.currentTarget.classList.add('show');
        });
      });
    }
  }]);

  return Accordion;
}(_BaseModule__WEBPACK_IMPORTED_MODULE_0__.default);



/***/ }),

/***/ "./src/assets/js/modules/Animation.js":
/*!********************************************!*\
  !*** ./src/assets/js/modules/Animation.js ***!
  \********************************************/
/*! namespace exports */
/*! export default [provided] [no usage info] [missing usage info prevents renaming] */
/*! other exports [not provided] [no usage info] */
/*! runtime requirements: __webpack_require__, __webpack_require__.r, __webpack_exports__, __webpack_require__.d, __webpack_require__.* */
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ Animation; }
/* harmony export */ });
/* harmony import */ var _BaseModule__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./BaseModule */ "./src/assets/js/modules/BaseModule.js");
/* harmony import */ var gsap__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! gsap */ "./node_modules/gsap/index.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }




var Animation = /*#__PURE__*/function (_BaseModule) {
  _inherits(Animation, _BaseModule);

  var _super = _createSuper(Animation);

  function Animation() {
    _classCallCheck(this, Animation);

    return _super.apply(this, arguments);
  }

  _createClass(Animation, [{
    key: "register",
    value: function register() {
      var _this = this;

      this.animateItems = Array.from(this.el.querySelectorAll('.js--animate'));
      this.vw = window.innerWidth;
      window.addEventListener('load', function () {
        _this.animate();
      });
      window.addEventListener('scroll', function () {
        _this.animate();
      });
      window.addEventListener('resize', function () {
        _this.resizeTimer && clearTimeout(_this.resizeTimer);
        _this.resizeTimer = setTimeout(function () {
          if (_this.vw !== window.innerWidth) {
            _this.vw = window.innerWidth;

            _this.animateItems.forEach(function (ai) {
              ai.classList.remove('animated');
              ai.classList.add('js--animate');
            });

            _this.animate();
          }
        }, 400);
      });
    }
  }, {
    key: "checkInViewport",
    value: function checkInViewport(el) {
      var offset = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;
      var bounding = el.getBoundingClientRect();
      return bounding.top < window.innerHeight - offset;
    }
  }, {
    key: "animate",
    value: function animate() {
      var _this2 = this;

      this.animateItems.forEach(function (item) {
        var offset = parseInt(item.getAttribute('data-offset')) || 0;

        if (_this2.checkInViewport(item, offset)) {
          var animation = item.getAttribute('data-animation');
          if (!animation) return;
          if (!item.classList.contains('js--animate')) return;
          var delay = parseFloat(item.getAttribute('data-delay')) || 0;
          var duration = parseFloat(item.getAttribute('data-duration')) || 0;
          var from = parseFloat(item.getAttribute('data-from')) || 0;
          var depend = [];
          var selectors = (item.getAttribute('data-depend') || '').split(',').filter(function (sl) {
            return sl.length;
          });
          selectors.forEach(function (sl) {
            var els = _this2.el.querySelectorAll(sl);

            els.forEach(function (el) {
              depend.push(el);
            });
          });

          _this2[animation](item, {
            delay: delay,
            from: from,
            duration: duration,
            depend: depend
          });

          item.classList.remove('js--animate');
        }
      });
    }
  }, {
    key: "fromLeft",
    value: function fromLeft(el, options) {
      var _this3 = this;

      if (options.depend) {
        if (!this.checkDepend(options.depend)) {
          requestAnimationFrame(function () {
            _this3.fromLeft(el, options);
          });
          return;
        }
      }

      gsap__WEBPACK_IMPORTED_MODULE_1__.TweenMax.fromTo(el, options.duration || 0.4, {
        opacity: 0,
        x: options.from || -500
      }, {
        opacity: 1,
        x: 0,
        delay: options.delay || 0,
        onComplete: function onComplete() {
          el.classList.add('animated');
        }
      });
    }
  }, {
    key: "fromRight",
    value: function fromRight(el, options) {
      var _this4 = this;

      if (options.depend) {
        if (!this.checkDepend(options.depend)) {
          requestAnimationFrame(function () {
            _this4.fromLeft(el, options);
          });
          return;
        }
      }

      gsap__WEBPACK_IMPORTED_MODULE_1__.TweenMax.fromTo(el, options.duration || 0.4, {
        opacity: 0,
        x: options.from || 500
      }, {
        opacity: 1,
        x: 0,
        delay: options.delay || 0,
        onComplete: function onComplete() {
          el.classList.add('animated');
        }
      });
    }
  }, {
    key: "fromBottom",
    value: function fromBottom(el, options) {
      var _this5 = this;

      if (options.depend) {
        if (!this.checkDepend(options.depend)) {
          requestAnimationFrame(function () {
            _this5.fromBottom(el, options);
          });
          return;
        }
      }

      gsap__WEBPACK_IMPORTED_MODULE_1__.TweenMax.fromTo(el, options.duration || 0.8, {
        opacity: 0,
        y: options.from || 200
      }, {
        opacity: 1,
        y: 0,
        delay: options.delay || 0,
        onComplete: function onComplete() {
          el.classList.add('animated');
        }
      });
    }
  }, {
    key: "fillRight",
    value: function fillRight(el, options) {
      var _this6 = this;

      if (options.depend) {
        if (!this.checkDepend(options.depend)) {
          requestAnimationFrame(function () {
            _this6.fillRight(el, options);
          });
          return;
        }
      }

      gsap__WEBPACK_IMPORTED_MODULE_1__.TweenMax.from(el, options.duration || 0.4, {
        width: 0,
        delay: options.delay || 0,
        onComplete: function onComplete() {
          el.classList.add('animated');
        }
      });
    }
  }, {
    key: "scaleUp",
    value: function scaleUp(el, options) {
      var _this7 = this;

      if (options.depend) {
        if (!this.checkDepend(options.depend)) {
          requestAnimationFrame(function () {
            _this7.scaleUp(el, options);
          });
          return;
        }
      }

      gsap__WEBPACK_IMPORTED_MODULE_1__.TweenMax.fromTo(el, options.duration || 0.4, {
        opacity: 0,
        scale: 0
      }, {
        opacity: 1,
        scale: 1,
        delay: options.delay || 0,
        onComplete: function onComplete() {
          el.classList.add('animated');
        }
      });
    }
  }, {
    key: "opacityOnly",
    value: function opacityOnly(el, options) {
      var _this8 = this;

      if (options.depend) {
        if (!this.checkDepend(options.depend)) {
          requestAnimationFrame(function () {
            _this8.opacityOnly(el, options);
          });
          return;
        }
      }

      gsap__WEBPACK_IMPORTED_MODULE_1__.TweenMax.fromTo(el, options.duration || 0.4, {
        opacity: 0
      }, {
        opacity: 1,
        delay: options.delay || 0,
        onComplete: function onComplete() {
          el.classList.add('animated');
        }
      });
    }
  }, {
    key: "scaleDown",
    value: function scaleDown(el, options) {
      var _this9 = this;

      if (options.depend) {
        if (!this.checkDepend(options.depend)) {
          requestAnimationFrame(function () {
            _this9.scaleDown(el, options);
          });
          return;
        }
      }

      gsap__WEBPACK_IMPORTED_MODULE_1__.TweenMax.fromTo(el, options.duration || 0.4, {
        opacity: 0,
        scale: options.from || 2
      }, {
        opacity: 1,
        scale: 1,
        delay: options.delay || 0,
        onComplete: function onComplete() {
          el.classList.add('animated');
        }
      });
    } // scaleDown(el, options) {
    //   TweenLite.fromTo(el, 0.4, {
    //     opacity: 0,
    //     scale: 3
    //   }, {
    //     opacity: 1,
    //     scale: 1,
    //     delay: options.delay || 0
    //   })
    // }
    // scaleUp(el, options) {
    //   TweenLite.fromTo(el, 0.4, {
    //     opacity: 0,
    //     scale: 0
    //   }, {
    //     opacity: 1,
    //     scale: 1,
    //     delay: options.delay || 0
    //   })
    // }
    // moveUp(el, options) {
    //   TweenLite.fromTo(el, 1, {
    //     opacity: 0,
    //     y: options.from || 500
    //   }, {
    //     opacity: 1,
    //     y: 0,
    //     delay: options.delay || 0
    //   })
    // }
    // expand(el, options) {
    //   TweenLite.fromTo(el, 1, {
    //     width: 0
    //   }, {
    //     width: el.scrollWidth
    //   })
    // }

  }, {
    key: "computedDepend",
    value: function computedDepend(el) {
      var _this10 = this;

      var depend = [];
      var selectors = (el.getAttribute('data-depend') || '').split(',').filter(function (sl) {
        return sl.length;
      });
      selectors.forEach(function (sl) {
        var els = _this10.el.querySelectorAll(sl.trim());

        els.forEach(function (el) {
          depend.push(el);
        });
      });
      return depend;
    }
  }, {
    key: "checkDepend",
    value: function checkDepend(depend) {
      for (var i = 0; i < depend.length; i++) {
        if (!depend[i].classList.contains('animated')) {
          return false;
        }
      }

      return true;
    }
  }]);

  return Animation;
}(_BaseModule__WEBPACK_IMPORTED_MODULE_0__.default);



/***/ }),

/***/ "./src/assets/js/modules/BaseModule.js":
/*!*********************************************!*\
  !*** ./src/assets/js/modules/BaseModule.js ***!
  \*********************************************/
/*! namespace exports */
/*! export default [provided] [no usage info] [missing usage info prevents renaming] */
/*! other exports [not provided] [no usage info] */
/*! runtime requirements: __webpack_require__, __webpack_require__.r, __webpack_exports__, __webpack_require__.d, __webpack_require__.* */
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ BaseModule; }
/* harmony export */ });
/* harmony import */ var _libs_RandomString__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../libs/RandomString */ "./src/assets/js/libs/RandomString.js");
/* harmony import */ var _libs_Publisher__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../libs/Publisher */ "./src/assets/js/libs/Publisher.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }




var BaseModule = /*#__PURE__*/function (_Publisher) {
  _inherits(BaseModule, _Publisher);

  var _super = _createSuper(BaseModule);

  function BaseModule() {
    var _this;

    _classCallCheck(this, BaseModule);

    _this = _super.call(this);

    var _arguments = Array.prototype.slice.call(arguments),
        el = _arguments[0],
        name = _arguments[1];

    _this.id = (0,_libs_RandomString__WEBPACK_IMPORTED_MODULE_1__.default)();
    _this.name = name;
    _this.el = el;
    _this.el.modules = _this.el.modules || {};
    _this.el.modules[_this.name] = _this.id;

    if (_this.register) {
      _this.register();

      _this.register = undefined;
    }

    return _this;
  }

  return BaseModule;
}(_libs_Publisher__WEBPACK_IMPORTED_MODULE_0__.default);



/***/ }),

/***/ "./src/assets/js/modules/HelloModule.js":
/*!**********************************************!*\
  !*** ./src/assets/js/modules/HelloModule.js ***!
  \**********************************************/
/*! namespace exports */
/*! export default [provided] [no usage info] [missing usage info prevents renaming] */
/*! other exports [not provided] [no usage info] */
/*! runtime requirements: __webpack_require__, __webpack_require__.r, __webpack_exports__, __webpack_require__.d, __webpack_require__.* */
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ HelloModule; }
/* harmony export */ });
/* harmony import */ var _BaseModule__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./BaseModule */ "./src/assets/js/modules/BaseModule.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }



var HelloModule = /*#__PURE__*/function (_BaseModule) {
  _inherits(HelloModule, _BaseModule);

  var _super = _createSuper(HelloModule);

  function HelloModule() {
    _classCallCheck(this, HelloModule);

    return _super.apply(this, arguments);
  }

  _createClass(HelloModule, [{
    key: "register",
    value: function register() {
      console.log();
    }
  }]);

  return HelloModule;
}(_BaseModule__WEBPACK_IMPORTED_MODULE_0__.default);



/***/ }),

/***/ "./src/assets/js/modules/Navigation.js":
/*!*********************************************!*\
  !*** ./src/assets/js/modules/Navigation.js ***!
  \*********************************************/
/*! namespace exports */
/*! export default [provided] [no usage info] [missing usage info prevents renaming] */
/*! other exports [not provided] [no usage info] */
/*! runtime requirements: __webpack_require__, __webpack_require__.r, __webpack_exports__, __webpack_require__.d, __webpack_require__.* */
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ Navigation; }
/* harmony export */ });
/* harmony import */ var _BaseModule__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./BaseModule */ "./src/assets/js/modules/BaseModule.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }



var Navigation = /*#__PURE__*/function (_BaseModule) {
  _inherits(Navigation, _BaseModule);

  var _super = _createSuper(Navigation);

  function Navigation() {
    _classCallCheck(this, Navigation);

    return _super.apply(this, arguments);
  }

  _createClass(Navigation, [{
    key: "register",
    value: function register() {
      var _this = this;

      this.SCROLLY_THREADSHOT = 30;
      this.windowWidth = window.innerWidth;
      this.CLS_EXPAND = 'expand';
      this.CLS_SHOWNAV = 'show-nav';
      this.navCollapse = this.el.querySelector('.navbar-collapse');
      this.navToggleer = this.el.querySelector('.navbar-toggler');
      this.menusHasSub = this.el.querySelectorAll('.menu-item-has-children');
      console.log(this.el);
      this.navToggleer.addEventListener('click', function (e) {
        console.log(e.currentTarget);
        e.currentTarget.classList.toggle('collapsed');
        console.log(_this.navCollapse);

        if (_this.navCollapse.classList.contains(_this.CLS_EXPAND)) {
          _this.navCollapse.classList.remove(_this.CLS_EXPAND);

          document.body.classList.remove(_this.CLS_SHOWNAV);
          _this.navCollapse.style.display = 'none';
        } else {
          _this.navCollapse.style.display = 'block';

          _this.navCollapse.classList.add(_this.CLS_EXPAND);

          document.body.classList.add(_this.CLS_SHOWNAV);
        }
      });
      this.menusHasSub.forEach(function (element) {
        //   element.ap(
        //     `<span class="plus">+</span> <span class="minus">-</span>`
        //   );
        var domPlus = document.createElement('span');
        domPlus.classList.add('plus');
        domPlus.innerText = '+';
        element.appendChild(domPlus);
        domPlus.addEventListener('click', function (e) {
          _this.menusHasSub.forEach(function (item) {
            item.classList.remove('open');
          });

          e.currentTarget.parentElement.classList.add('open');
        });
        var domMinus = document.createElement('span');
        domMinus.classList.add('minus');
        domMinus.innerText = '-';
        element.appendChild(domMinus);
        domMinus.addEventListener('click', function (e) {
          e.currentTarget.parentElement.classList.remove('open');
        });
      });
      window.addEventListener('scroll', function () {
        _this.checkStickyNav();
      });
      window.addEventListener('resize', function () {
        if (window.innerWidth != _this.windowWidth) {
          _this.windowWidth = window.innerWidth;

          _this.resize();
        }
      });
    }
  }, {
    key: "checkStickyNav",
    value: function checkStickyNav() {
      if (window.scrollY > this.SCROLLY_THREADSHOT) {
        this.el.classList.add('sticky');
      } else {
        this.el.classList.remove('sticky');
      }
    }
  }, {
    key: "resize",
    value: function resize() {
      if (document.body.classList.contains(this.CLS_SHOWNAV) && window.innerWidth >= 992) {
        this.navCollapse.classList.remove(this.CLS_EXPAND);
        document.body.classList.remove(this.CLS_SHOWNAV);
      }
    }
  }]);

  return Navigation;
}(_BaseModule__WEBPACK_IMPORTED_MODULE_0__.default);



/***/ }),

/***/ "./src/assets/js/modules/ProductDetail.js":
/*!************************************************!*\
  !*** ./src/assets/js/modules/ProductDetail.js ***!
  \************************************************/
/*! namespace exports */
/*! export default [provided] [no usage info] [missing usage info prevents renaming] */
/*! other exports [not provided] [no usage info] */
/*! runtime requirements: __webpack_require__, __webpack_require__.r, __webpack_exports__, __webpack_require__.d, __webpack_require__.* */
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ ProductDetail; }
/* harmony export */ });
/* harmony import */ var _BaseModule__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./BaseModule */ "./src/assets/js/modules/BaseModule.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }



var ProductDetail = /*#__PURE__*/function (_BaseModule) {
  _inherits(ProductDetail, _BaseModule);

  var _super = _createSuper(ProductDetail);

  function ProductDetail() {
    _classCallCheck(this, ProductDetail);

    return _super.apply(this, arguments);
  }

  _createClass(ProductDetail, [{
    key: "register",
    value: function register() {
      var _this = this;

      this.showCount = this.el.querySelector('.quantity .input-text');
      this.btnDes = this.el.querySelector('.quantity .btn-minus');
      this.btnInc = this.el.querySelector('.quantity .btn-plus');

      if (this.showCount) {
        this.btnDes.addEventListener('click', function () {
          return _this.decreaseValue();
        });
        this.btnInc.addEventListener('click', function () {
          return _this.increaseValue();
        });
      }
    }
  }, {
    key: "increaseValue",
    value: function increaseValue() {
      var value = parseInt(this.showCount.value, 10);
      value = isNaN(value) ? 0 : value;
      value++;
      this.showCount.value = value;
    }
  }, {
    key: "decreaseValue",
    value: function decreaseValue() {
      var value = parseInt(this.showCount.value, 10);
      value = isNaN(value) ? 0 : value;
      value < 1 ? value = 1 : '';
      value--;
      this.showCount.value = value;
    }
  }]);

  return ProductDetail;
}(_BaseModule__WEBPACK_IMPORTED_MODULE_0__.default);



/***/ }),

/***/ "./src/assets/js/modules/ShowMenuMobile.js":
/*!*************************************************!*\
  !*** ./src/assets/js/modules/ShowMenuMobile.js ***!
  \*************************************************/
/*! namespace exports */
/*! export default [provided] [no usage info] [missing usage info prevents renaming] */
/*! other exports [not provided] [no usage info] */
/*! runtime requirements: __webpack_require__, __webpack_require__.r, __webpack_exports__, __webpack_require__.d, __webpack_require__.* */
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ ShowMenuMobile; }
/* harmony export */ });
/* harmony import */ var _BaseModule__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./BaseModule */ "./src/assets/js/modules/BaseModule.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }



var ShowMenuMobile = /*#__PURE__*/function (_BaseModule) {
  _inherits(ShowMenuMobile, _BaseModule);

  var _super = _createSuper(ShowMenuMobile);

  function ShowMenuMobile() {
    _classCallCheck(this, ShowMenuMobile);

    return _super.apply(this, arguments);
  }

  _createClass(ShowMenuMobile, [{
    key: "register",
    value: function register() {
      this.navToggleer = this.el.querySelector('.btn-shownavsub');
      console.log(this.el);
      this.navToggleer.addEventListener('click', function (e) {
        console.log(e.currentTarget);
        e.currentTarget.classList.toggle('active');
      });
    }
  }]);

  return ShowMenuMobile;
}(_BaseModule__WEBPACK_IMPORTED_MODULE_0__.default);



/***/ }),

/***/ "./src/assets/js/modules/SwiperBegin.js":
/*!**********************************************!*\
  !*** ./src/assets/js/modules/SwiperBegin.js ***!
  \**********************************************/
/*! namespace exports */
/*! export default [provided] [no usage info] [missing usage info prevents renaming] */
/*! other exports [not provided] [no usage info] */
/*! runtime requirements: __webpack_require__, __webpack_require__.r, __webpack_exports__, __webpack_require__.d, __webpack_require__.* */
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ SwiperBegin; }
/* harmony export */ });
/* harmony import */ var _BaseModule__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./BaseModule */ "./src/assets/js/modules/BaseModule.js");
/* harmony import */ var swiper_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! swiper/core */ "./node_modules/swiper/esm/components/core/core-class.js");
/* harmony import */ var swiper_core__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! swiper/core */ "./node_modules/swiper/esm/components/navigation/navigation.js");
/* harmony import */ var swiper_core__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! swiper/core */ "./node_modules/swiper/esm/components/pagination/pagination.js");
/* harmony import */ var swiper_core__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! swiper/core */ "./node_modules/swiper/esm/components/autoplay/autoplay.js");
/* harmony import */ var swiper_core__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! swiper/core */ "./node_modules/swiper/esm/components/lazy/lazy.js");
/* harmony import */ var swiper_core__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! swiper/core */ "./node_modules/swiper/esm/components/effect-fade/effect-fade.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }



 // core version + navigation, pagination modules:

 // configure Swiper to use modules

swiper_core__WEBPACK_IMPORTED_MODULE_1__.default.use([swiper_core__WEBPACK_IMPORTED_MODULE_2__.default, swiper_core__WEBPACK_IMPORTED_MODULE_3__.default, swiper_core__WEBPACK_IMPORTED_MODULE_4__.default, swiper_core__WEBPACK_IMPORTED_MODULE_5__.default, swiper_core__WEBPACK_IMPORTED_MODULE_6__.default]);

var SwiperBegin = /*#__PURE__*/function (_BaseModule) {
  _inherits(SwiperBegin, _BaseModule);

  var _super = _createSuper(SwiperBegin);

  function SwiperBegin() {
    _classCallCheck(this, SwiperBegin);

    return _super.apply(this, arguments);
  }

  _createClass(SwiperBegin, [{
    key: "register",
    value: function register() {
      if (this.el.querySelector('.swiper-catList')) {
        var swiperCatList = new swiper_core__WEBPACK_IMPORTED_MODULE_1__.default('.swiper-catList', {
          spaceBetween: 30,
          slidesPerView: 1,
          speed: 3000,
          transitionDuration: 1000,
          centerInsufficientSlides: true,
          autoplay: {
            delay: 3500,
            disableOnInteraction: false,
            stopOnLastSlide: true
          },
          breakpoints: {
            // when window width is >= 1024
            768: {
              slidesPerView: 2
            },
            // when window width is >= 1024
            1024: {
              slidesPerView: 5
            }
          }
        });
      }

      if (this.el.querySelector('.swiper-banner')) {
        var swiperBanner = new swiper_core__WEBPACK_IMPORTED_MODULE_1__.default('.swiper-banner', {
          spaceBetween: 30,
          centeredSlides: true,
          effect: 'fade',
          speed: 2000,
          fadeEffect: {
            crossFade: true
          },
          autoplay: {
            delay: 3000,
            disableOnInteraction: false,
            stopOnLastSlide: true
          },
          pagination: {
            el: '.swiper-banner .swiper-pagination',
            clickable: true
          }
        });
      }

      if (this.el.querySelector('.swiper-beloved')) {
        var swiperBeloved = new swiper_core__WEBPACK_IMPORTED_MODULE_1__.default('.swiper-beloved', {
          spaceBetween: 30,
          slidesPerView: 2,
          // centeredSlides: true,
          centerInsufficientSlides: true,
          autoplay: {
            delay: 3000,
            disableOnInteraction: false,
            stopOnLastSlide: true
          },
          breakpoints: {
            // when window width is >= 1024
            768: {
              slidesPerView: 3
            },
            // when window width is >= 1024
            1024: {
              slidesPerView: 5
            }
          },
          navigation: {
            nextEl: '.bl.swiper-button-next',
            prevEl: '.bl.swiper-button-prev'
          }
        });
      }

      if (this.el.querySelector('.swiper-relatedPost')) {
        var sliderRelatedPost = new swiper_core__WEBPACK_IMPORTED_MODULE_1__.default('.swiper-relatedPost', {
          spaceBetween: 30,
          slidesPerView: 1,
          // centeredSlides: true,
          centerInsufficientSlides: true,
          autoplay: {
            delay: 3000,
            disableOnInteraction: false,
            stopOnLastSlide: true
          },
          breakpoints: {
            // when window width is >= 1024
            768: {
              slidesPerView: 2
            },
            // when window width is >= 1024
            1024: {
              slidesPerView: 3
            }
          },
          navigation: {
            nextEl: '.bl.swiper-button-next',
            prevEl: '.bl.swiper-button-prev'
          }
        });
      }

      if (this.el.querySelector('.wc-block-grid__products')) {
        var _swiperBeloved = new swiper_core__WEBPACK_IMPORTED_MODULE_1__.default('.wc-block-grid__products', {
          spaceBetween: 30,
          slidesPerView: 2,
          autoplay: {
            delay: 3000,
            disableOnInteraction: false,
            stopOnLastSlide: true
          },
          breakpoints: {
            // when window width is >= 1024
            768: {
              slidesPerView: 3
            },
            // when window width is >= 1024
            1024: {
              slidesPerView: 5
            }
          },
          navigation: {
            nextEl: '.bl.swiper-button-next',
            prevEl: '.bl.swiper-button-prev'
          }
        });
      }

      if (this.el.querySelector('.swiper-testimonial')) {
        var swiperTest = new swiper_core__WEBPACK_IMPORTED_MODULE_1__.default('.swiper-testimonial', {
          spaceBetween: 50,
          slidesPerView: 1,
          autoplay: {
            delay: 3500,
            disableOnInteraction: false,
            stopOnLastSlide: true
          },
          breakpoints: {
            // when window width is >= 1024
            768: {
              slidesPerView: 2
            },
            // when window width is >= 1024
            1024: {
              slidesPerView: 3
            }
          },
          navigation: {
            nextEl: '.ts.swiper-button-next',
            prevEl: '.ts.swiper-button-prev'
          },
          pagination: {
            el: '.swiper-testimonial .swiper-pagination',
            clickable: true
          }
        });
      }
    }
  }]);

  return SwiperBegin;
}(_BaseModule__WEBPACK_IMPORTED_MODULE_0__.default);



/***/ }),

/***/ "./src/assets/js/modules/dist/Navigation.dev.js":
/*!******************************************************!*\
  !*** ./src/assets/js/modules/dist/Navigation.dev.js ***!
  \******************************************************/
/*! flagged exports */
/*! export __esModule [provided] [no usage info] [missing usage info prevents renaming] */
/*! export default [provided] [no usage info] [missing usage info prevents renaming] */
/*! other exports [not provided] [no usage info] */
/*! runtime requirements: __webpack_exports__, __webpack_require__ */
/***/ (function(__unused_webpack_module, exports, __webpack_require__) {

"use strict";


function _typeof2(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof2 = function _typeof2(obj) { return typeof obj; }; } else { _typeof2 = function _typeof2(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof2(obj); }

Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports.default = void 0;

var _BaseModule2 = _interopRequireDefault(__webpack_require__(Object(function webpackMissingModule() { var e = new Error("Cannot find module './BaseModule'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())));

function _interopRequireDefault(obj) {
  return obj && obj.__esModule ? obj : {
    "default": obj
  };
}

function _typeof(obj) {
  if (typeof Symbol === "function" && _typeof2(Symbol.iterator) === "symbol") {
    _typeof = function _typeof(obj) {
      return _typeof2(obj);
    };
  } else {
    _typeof = function _typeof(obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : _typeof2(obj);
    };
  }

  return _typeof(obj);
}

function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}

function _possibleConstructorReturn(self, call) {
  if (call && (_typeof(call) === "object" || typeof call === "function")) {
    return call;
  }

  return _assertThisInitialized(self);
}

function _assertThisInitialized(self) {
  if (self === void 0) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }

  return self;
}

function _getPrototypeOf(o) {
  _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) {
    return o.__proto__ || Object.getPrototypeOf(o);
  };
  return _getPrototypeOf(o);
}

function _inherits(subClass, superClass) {
  if (typeof superClass !== "function" && superClass !== null) {
    throw new TypeError("Super expression must either be null or a function");
  }

  subClass.prototype = Object.create(superClass && superClass.prototype, {
    constructor: {
      value: subClass,
      writable: true,
      configurable: true
    }
  });
  if (superClass) _setPrototypeOf(subClass, superClass);
}

function _setPrototypeOf(o, p) {
  _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) {
    o.__proto__ = p;
    return o;
  };

  return _setPrototypeOf(o, p);
}

var Navigation = /*#__PURE__*/function (_BaseModule) {
  _inherits(Navigation, _BaseModule);

  function Navigation() {
    _classCallCheck(this, Navigation);

    return _possibleConstructorReturn(this, _getPrototypeOf(Navigation).apply(this, arguments));
  }

  _createClass(Navigation, [{
    key: "register",
    value: function register() {
      var _this = this;

      this.SCROLLY_THREADSHOT = 30;
      this.windowWidth = window.innerWidth;
      this.CLS_EXPAND = 'expand';
      this.CLS_SHOWNAV = 'show-nav';
      this.navCollapse = this.el.querySelector('.navbar-collapse');
      this.navToggleer = this.el.querySelector('.navbar-toggler');
      this.menusHasSub = this.el.querySelectorAll('.menu-item-has-children');
      console.log(this.el);
      this.navToggleer.addEventListener('click', function (e) {
        console.log(e.currentTarget);
        e.currentTarget.classList.toggle('collapsed');
        console.log(_this.navCollapse);

        if (_this.navCollapse.classList.contains(_this.CLS_EXPAND)) {
          _this.navCollapse.classList.remove(_this.CLS_EXPAND);

          document.body.classList.remove(_this.CLS_SHOWNAV);
          _this.navCollapse.style.display = 'none';
        } else {
          _this.navCollapse.style.display = 'block';

          _this.navCollapse.classList.add(_this.CLS_EXPAND);

          document.body.classList.add(_this.CLS_SHOWNAV);
        }
      });
      this.menusHasSub.forEach(function (element) {
        //   element.ap(
        //     `<span class="plus">+</span> <span class="minus">-</span>`
        //   );
        var domPlus = document.createElement('span');
        domPlus.classList.add('plus');
        domPlus.innerText = '+';
        element.appendChild(domPlus);
        domPlus.addEventListener('click', function (e) {
          _this.menusHasSub.forEach(function (item) {
            item.classList.remove('open');
          });

          e.currentTarget.parentElement.classList.add('open');
        });
        var domMinus = document.createElement('span');
        domMinus.classList.add('minus');
        domMinus.innerText = '-';
        element.appendChild(domMinus);
        domMinus.addEventListener('click', function (e) {
          e.currentTarget.parentElement.classList.remove('open');
        });
      });
      window.addEventListener('scroll', function () {
        _this.checkStickyNav();
      });
      window.addEventListener('resize', function () {
        if (window.innerWidth != _this.windowWidth) {
          _this.windowWidth = window.innerWidth;

          _this.resize();
        }
      });
    }
  }, {
    key: "checkStickyNav",
    value: function checkStickyNav() {
      if (window.scrollY > this.SCROLLY_THREADSHOT) {
        this.el.classList.add('sticky');
      } else {
        this.el.classList.remove('sticky');
      }
    }
  }, {
    key: "resize",
    value: function resize() {
      if (document.body.classList.contains(this.CLS_SHOWNAV) && window.innerWidth >= 992) {
        this.navCollapse.classList.remove(this.CLS_EXPAND);
        document.body.classList.remove(this.CLS_SHOWNAV);
      }
    }
  }]);

  return Navigation;
}(_BaseModule2["default"]);

exports.default = Navigation;

/***/ }),

/***/ "./src/assets/js/modules/dist/ShowMenuMobile.dev.js":
/*!**********************************************************!*\
  !*** ./src/assets/js/modules/dist/ShowMenuMobile.dev.js ***!
  \**********************************************************/
/*! flagged exports */
/*! export __esModule [provided] [no usage info] [missing usage info prevents renaming] */
/*! export default [provided] [no usage info] [missing usage info prevents renaming] */
/*! other exports [not provided] [no usage info] */
/*! runtime requirements: __webpack_exports__, __webpack_require__ */
/***/ (function(__unused_webpack_module, exports, __webpack_require__) {

"use strict";


function _typeof2(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof2 = function _typeof2(obj) { return typeof obj; }; } else { _typeof2 = function _typeof2(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof2(obj); }

Object.defineProperty(exports, "__esModule", ({
  value: true
}));
exports.default = void 0;

var _BaseModule2 = _interopRequireDefault(__webpack_require__(Object(function webpackMissingModule() { var e = new Error("Cannot find module './BaseModule'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())));

function _interopRequireDefault(obj) {
  return obj && obj.__esModule ? obj : {
    "default": obj
  };
}

function _typeof(obj) {
  if (typeof Symbol === "function" && _typeof2(Symbol.iterator) === "symbol") {
    _typeof = function _typeof(obj) {
      return _typeof2(obj);
    };
  } else {
    _typeof = function _typeof(obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : _typeof2(obj);
    };
  }

  return _typeof(obj);
}

function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}

function _possibleConstructorReturn(self, call) {
  if (call && (_typeof(call) === "object" || typeof call === "function")) {
    return call;
  }

  return _assertThisInitialized(self);
}

function _assertThisInitialized(self) {
  if (self === void 0) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }

  return self;
}

function _getPrototypeOf(o) {
  _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) {
    return o.__proto__ || Object.getPrototypeOf(o);
  };
  return _getPrototypeOf(o);
}

function _inherits(subClass, superClass) {
  if (typeof superClass !== "function" && superClass !== null) {
    throw new TypeError("Super expression must either be null or a function");
  }

  subClass.prototype = Object.create(superClass && superClass.prototype, {
    constructor: {
      value: subClass,
      writable: true,
      configurable: true
    }
  });
  if (superClass) _setPrototypeOf(subClass, superClass);
}

function _setPrototypeOf(o, p) {
  _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) {
    o.__proto__ = p;
    return o;
  };

  return _setPrototypeOf(o, p);
}

var ShowMenuMobile = /*#__PURE__*/function (_BaseModule) {
  _inherits(ShowMenuMobile, _BaseModule);

  function ShowMenuMobile() {
    _classCallCheck(this, ShowMenuMobile);

    return _possibleConstructorReturn(this, _getPrototypeOf(ShowMenuMobile).apply(this, arguments));
  }

  _createClass(ShowMenuMobile, [{
    key: "register",
    value: function register() {
      this.navToggleer = this.el.querySelector('.btn-shownavsub');
      console.log(this.el);
      this.navToggleer.addEventListener('click', function (e) {
        console.log(e.currentTarget);
        e.currentTarget.classList.toggle('active');
      });
    }
  }]);

  return ShowMenuMobile;
}(_BaseModule2["default"]);

exports.default = ShowMenuMobile;

/***/ }),

/***/ "./src/assets/js/modules/examples/RefState.js":
/*!****************************************************!*\
  !*** ./src/assets/js/modules/examples/RefState.js ***!
  \****************************************************/
/*! namespace exports */
/*! export default [provided] [no usage info] [missing usage info prevents renaming] */
/*! other exports [not provided] [no usage info] */
/*! runtime requirements: __webpack_require__, __webpack_require__.r, __webpack_exports__, __webpack_require__.d, __webpack_require__.* */
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ RefState; }
/* harmony export */ });
/* harmony import */ var _BaseModule__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../BaseModule */ "./src/assets/js/modules/BaseModule.js");
/* harmony import */ var _libs_ModuleState__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../libs/ModuleState */ "./src/assets/js/libs/ModuleState.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }




var RefState = /*#__PURE__*/function (_BaseModule) {
  _inherits(RefState, _BaseModule);

  var _super = _createSuper(RefState);

  function RefState() {
    _classCallCheck(this, RefState);

    return _super.apply(this, arguments);
  }

  _createClass(RefState, [{
    key: "register",
    value: function register() {
      console.log('RefState! ', this); //

      var myData = (0,_libs_ModuleState__WEBPACK_IMPORTED_MODULE_1__.default)('myData', 'inited value');
      console.log(myData.get);
      myData.onChange(console.log);
      myData.set('changed value');
    }
  }]);

  return RefState;
}(_BaseModule__WEBPACK_IMPORTED_MODULE_0__.default);



/***/ }),

/***/ "./src/assets/js/modules sync recursive ^\\.\\/.*$":
/*!**********************************************!*\
  !*** ./src/assets/js/modules/ sync ^\.\/.*$ ***!
  \**********************************************/
/*! default exports */
/*! exports [not provided] [no usage info] */
/*! runtime requirements: module, __webpack_require__.o, __webpack_require__ */
/***/ (function(module, __unused_webpack_exports, __webpack_require__) {

var map = {
	"./Accordion": "./src/assets/js/modules/Accordion.js",
	"./Accordion.js": "./src/assets/js/modules/Accordion.js",
	"./Animation": "./src/assets/js/modules/Animation.js",
	"./Animation.js": "./src/assets/js/modules/Animation.js",
	"./BaseModule": "./src/assets/js/modules/BaseModule.js",
	"./BaseModule.js": "./src/assets/js/modules/BaseModule.js",
	"./HelloModule": "./src/assets/js/modules/HelloModule.js",
	"./HelloModule.js": "./src/assets/js/modules/HelloModule.js",
	"./Navigation": "./src/assets/js/modules/Navigation.js",
	"./Navigation.js": "./src/assets/js/modules/Navigation.js",
	"./ProductDetail": "./src/assets/js/modules/ProductDetail.js",
	"./ProductDetail.js": "./src/assets/js/modules/ProductDetail.js",
	"./ShowMenuMobile": "./src/assets/js/modules/ShowMenuMobile.js",
	"./ShowMenuMobile.js": "./src/assets/js/modules/ShowMenuMobile.js",
	"./SwiperBegin": "./src/assets/js/modules/SwiperBegin.js",
	"./SwiperBegin.js": "./src/assets/js/modules/SwiperBegin.js",
	"./dist/Navigation.dev": "./src/assets/js/modules/dist/Navigation.dev.js",
	"./dist/Navigation.dev.js": "./src/assets/js/modules/dist/Navigation.dev.js",
	"./dist/ShowMenuMobile.dev": "./src/assets/js/modules/dist/ShowMenuMobile.dev.js",
	"./dist/ShowMenuMobile.dev.js": "./src/assets/js/modules/dist/ShowMenuMobile.dev.js",
	"./examples/RefState": "./src/assets/js/modules/examples/RefState.js",
	"./examples/RefState.js": "./src/assets/js/modules/examples/RefState.js"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./src/assets/js/modules sync recursive ^\\.\\/.*$";

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		if(__webpack_module_cache__[moduleId]) {
/******/ 			return __webpack_module_cache__[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	!function() {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = function(module) {
/******/ 			var getter = module && module.__esModule ?
/******/ 				function() { return module['default']; } :
/******/ 				function() { return module; };
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/global */
/******/ 	!function() {
/******/ 		__webpack_require__.g = (function() {
/******/ 			if (typeof globalThis === 'object') return globalThis;
/******/ 			try {
/******/ 				return this || new Function('return this')();
/******/ 			} catch (e) {
/******/ 				if (typeof window === 'object') return window;
/******/ 			}
/******/ 		})();
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	!function() {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// Promise = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"app": 0
/******/ 		};
/******/ 		
/******/ 		var deferredModules = [
/******/ 			["./src/assets/js/app.js","vendor"]
/******/ 		];
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		var checkDeferredModules = function() {
/******/ 		
/******/ 		};
/******/ 		function checkDeferredModulesImpl() {
/******/ 			var result;
/******/ 			for(var i = 0; i < deferredModules.length; i++) {
/******/ 				var deferredModule = deferredModules[i];
/******/ 				var fulfilled = true;
/******/ 				for(var j = 1; j < deferredModule.length; j++) {
/******/ 					var depId = deferredModule[j];
/******/ 					if(installedChunks[depId] !== 0) fulfilled = false;
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferredModules.splice(i--, 1);
/******/ 					result = __webpack_require__(__webpack_require__.s = deferredModule[0]);
/******/ 				}
/******/ 			}
/******/ 			if(deferredModules.length === 0) {
/******/ 				__webpack_require__.x();
/******/ 				__webpack_require__.x = function() {
/******/ 		
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		}
/******/ 		__webpack_require__.x = function() {
/******/ 			// reset startup function so it can be called again when more startup code is added
/******/ 			__webpack_require__.x = function() {
/******/ 		
/******/ 			}
/******/ 			chunkLoadingGlobal = chunkLoadingGlobal.slice();
/******/ 			for(var i = 0; i < chunkLoadingGlobal.length; i++) webpackJsonpCallback(chunkLoadingGlobal[i]);
/******/ 			return (checkDeferredModules = checkDeferredModulesImpl)();
/******/ 		};
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = function(data) {
/******/ 			var chunkIds = data[0];
/******/ 			var moreModules = data[1];
/******/ 			var runtime = data[2];
/******/ 			var executeModules = data[3];
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0, resolves = [];
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					resolves.push(installedChunks[chunkId][0]);
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			for(moduleId in moreModules) {
/******/ 				if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 					__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 				}
/******/ 			}
/******/ 			if(runtime) runtime(__webpack_require__);
/******/ 			parentChunkLoadingFunction(data);
/******/ 			while(resolves.length) {
/******/ 				resolves.shift()();
/******/ 			}
/******/ 		
/******/ 			// add entry modules from loaded chunk to deferred list
/******/ 			if(executeModules) deferredModules.push.apply(deferredModules, executeModules);
/******/ 		
/******/ 			// run deferred modules when all chunks ready
/******/ 			return checkDeferredModules();
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkfe_starter_kit"] = self["webpackChunkfe_starter_kit"] || [];
/******/ 		var parentChunkLoadingFunction = chunkLoadingGlobal.push.bind(chunkLoadingGlobal);
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback;
/******/ 	}();
/******/ 	
/************************************************************************/
/******/ 	// run startup
/******/ 	return __webpack_require__.x();
/******/ })()
;
//# sourceMappingURL=app.js.map