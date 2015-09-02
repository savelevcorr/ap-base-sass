head.load([
    "/js/vendor/jquery.min.js",
    "/js/vendor/foundation/foundation.min.js",
    "/js/vendor/mask/jquery.inputmask.js",
    "/js/vendor/owlcarousel/owl.carousel.min.js",
    "/js/vendor/blueimp/jquery.blueimp-gallery.min.js",
    "/js/vendor/handlebars.js",
    "/js/vendor/jstorage.js"
], function () {
    // start
    $(document).ready(function () {
        $(document).foundation();
        console.log('jquery', $);
    });

});