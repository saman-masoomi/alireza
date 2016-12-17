'use strict';

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol ? "symbol" : typeof obj; };

window.$ = document.querySelector.bind(document);
window.$$ = document.querySelectorAll.bind(document);

Node.prototype.on = window.on = function (eventsString, fn) {
    var _this = this;

    var config = arguments.length <= 2 || arguments[2] === undefined ? false : arguments[2];

    var supportsPassive = false;

    try {
        document.addEventListener('test', null, {
            get passive() {
                supportsPassive = true;
            }
        });
    } catch (e) {}

    if ((typeof config === 'undefined' ? 'undefined' : _typeof(config)) === 'object' && config.hasOwnProperty('passive')) {
        config = supportsPassive ? config : false;
    }

    eventsString.trim().split(', ').forEach(function (eventDeclaration) {
        var _eventDeclaration$tri = eventDeclaration.trim().split(':');

        var event = _eventDeclaration$tri[0];
        var key = _eventDeclaration$tri[1];

        if (key) {
            _this._listeners = _this._listeners || {};
            _this._listeners[key] = { event: event, fn: fn, config: config };
        }

        _this.addEventListener(event, fn, config);
    });
};

Node.prototype.off = window.off = function (eventsString, fn) {
    var _this2 = this;

    var config = arguments.length <= 2 || arguments[2] === undefined ? false : arguments[2];

    if (fn) {
        eventsString.trim().split(', ').forEach(function (event) {
            return _this2.removeEventListener(event, fn, config);
        });
    } else {
        if (!this._listeners) return;

        var listenerKeys = String(eventsString).trim().split(', ');

        listenerKeys.forEach(function (key) {
            if (!_this2._listeners[key]) return;

            var _listeners$key = _this2._listeners[key];
            var event = _listeners$key.event;
            var fn = _listeners$key.fn;
            var config = _listeners$key.config;

            _this2.removeEventListener(event, fn, config);
            delete _this2._listeners[key];
        });
    }
};

Node.prototype.once = window.once = function (events, fn) {
    var config = arguments.length <= 2 || arguments[2] === undefined ? false : arguments[2];

    var listener = function listener(e) {
        fn.call(this, e);
        this.off(events, listener);
    };
    this.on(events, listener, config);
};

NodeList.prototype.__proto__ = Array.prototype;

NodeList.prototype.on = NodeList.prototype.addEventListener = function (events, fn) {
    var config = arguments.length <= 2 || arguments[2] === undefined ? false : arguments[2];

    this.forEach(function (el) {
        return el.on(events, fn, config);
    });
};

NodeList.prototype.off = NodeList.prototype.removeEventListener = function (events, fn) {
    this.forEach(function (el) {
        return el.off(events, fn);
    });
};

NodeList.prototype.once = function (events, fn) {
    this.forEach(function (el) {
        return el.once(events, fn);
    });
};
var $stage = $('.stage');
var $flyer = $('.flyer');

var BASEPERSPECTIVE = 180;
var BASEEASING = 10;
var MAXDEGREE = 360;

var rotation = { current: 0, final: 0 };
var perspective = { current: BASEPERSPECTIVE, final: BASEPERSPECTIVE };
var zoom = { current: 1, final: 1 };
var easing = BASEEASING;

var ease = function ease(val) {
    return val.current += (val.final - val.current) / easing;
};
var round = function round(val) {
    return Math.round(val * 1000) / 1000;
};
var finished = function finished(val) {
    return round(val.current) === round(val.final);
};

var animation = {
    _isPlaying: false,
    play: function play() {
        !this._isPlaying && this._animate();
    },
    _animate: function _animate() {
        this._isPlaying = true;

        ease(rotation);
        ease(perspective);
        ease(zoom);

        $flyer.style.transform = 'rotateY(-' + rotation.current + 'deg)';
        $stage.style.perspectiveOrigin = 'center ' + perspective.current + 'px';
        $stage.style.transform = 'scale(' + zoom.current + ')';

        if (finished(rotation) && finished(perspective) && finished(zoom)) {
            this._isPlaying = false;
            return;
        }

        requestAnimationFrame(this._animate.bind(this));
    }
};

document.on('mousemove', function (e) {
    rotation.final = MAXDEGREE * e.clientX / window.innerWidth;
    perspective.final = (e.clientY - window.innerHeight / 2) * 0 + BASEPERSPECTIVE;

    animation.play();
});

document.on('mouseover', function () {
    $flyer.classList.add('js-disable-animation');
    easing = BASEEASING;

    animation.play();
});

document.on('mouseleave', function () {
    rotation.final = 0;
    perspective.final = BASEPERSPECTIVE;
    zoom.final = 1;
    easing = BASEEASING * 5;

    animation.play();
});

window.on('mousewheel, DOMMouseScroll', function (e) {
//    var wheelDistance = e.detail ? -e.detail / 6 : e.wheelDelta / 120;

    zoom.final += wheelDistance / 10;
    zoom.final = Math.min(Math.max(zoom.final, .25), 2);

    animation.play();
});

document.on('click', function () {
    zoom.final = 1;

    animation.play();
});