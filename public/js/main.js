window.onload = function () {

    'use strict';

    let Viewer = window.Viewer;
    let console = window.console || { log: function () {} };
    let pictures = document.querySelector('#portfolios');
    let options = {
        // inline: true,
        url: 'data-original',

        ready: function (e) {
            console.log(e.type);
        },
        show: function (e) {
            console.log(e.type);
        },
        shown: function (e) {
            console.log(e.type);
        },
        hide: function (e) {
            console.log(e.type);
        },
        hidden: function (e) {
            console.log(e.type);
        },
        view: function (e) {
            console.log(e.type);
        },
        viewed: function (e) {
            console.log(e.type);
        },
        zoom: function (e) {
            console.log(e.type);
        },
        zoomed: function (e) {
            console.log(e.type);
        }
    };
    console.log('pictures', pictures);
    let viewer = new Viewer(pictures, options);

    function addEventListener(element, type, handler) {
        if (element.addEventListener) {
            element.addEventListener(type, handler, false);
        } else if (element.attachEvent) {
            element.attachEvent('on' + type, handler);
        }
    }

    $('[data-toggle="tooltip"]').tooltip();
};

