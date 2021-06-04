jQuery(document).ready(function() {
    jQuery(".nav-trigger-cont").click(function() {
        jQuery(this).toggleClass("open");
        jQuery("body").toggleClass("mobilenav-activeblock");
    });
});