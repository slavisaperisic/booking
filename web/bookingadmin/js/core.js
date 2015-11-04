/**
 *
 * @type {{getData: Function}}
 */
var connector = {
    getData: function (methodType, route, dataType, dataBlock, callbackFunction, context) {
        $.ajax({
            async: true,
            type: methodType,
            dataType: dataType,
            url: route,
            data: dataBlock
        }).then(function (data) {
            if (callbackFunction != null && context != null) {
                callbackFunction(context, data);
            }
            return data;
        });
    }
};
console.log("core.js instantiated");

$(window).on("load", function() {
    var activeClass_sidebar = $("body").data("route");
    $(".side-nav li").removeClass("active").find("."+activeClass_sidebar).parent().addClass("active").parent().slideDown();

});