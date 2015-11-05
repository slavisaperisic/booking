var categoryObjects = null;

/**
 * handle list population
 */
$(window).on("load", function () {

    var callbackFunction = function (ctx, data) {
        categoryObjects = data;
        populateAccordion(categoryObjects);
        activateAccordion();
    };

    connector.getData("get", "/app_dev.php/front/json/categories", "json", "", callbackFunction, "");

    function populateAccordion(categoryObjects) {
        $.each(categoryObjects, function (key, category) {
            var categoryHTML =
                $("<h3>" + category.name + "</h3>" +
                    "<section class=\"pane row\">" +
                    "</section>");

            $.each(category, function (key, service) {
                var serviceHTML =
                    "<div class=\"col-md-3\">" +
                        "<div class=\"inset\">" +
                        "<img src=\"\" alt=\"\" class=\"img-responsive\" />" +
                        "<div class=\"overlay row\">" +
                        "<div class=\"col-md-6\">" +
                        service.name +
                        "</div>" +
                        "<div class=\"col-md-6 text-right\">" +
                        "<a class=\"show-details\" href=\"#\">Details</a>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</div>";
                categoryHTML.find(".pane").append(serviceHTML);
            });

            $("#home_accordion").append(categoryHTML);
        });
    }

});

function activateAccordion() {

    //  Accordion Panels
    $(".accordion section").show();
    setTimeout("$('.accordion section').slideToggle('slow');", 1000);
    $(".accordion h3").click(function () {
        $(this).next(".pane").slideToggle("slow").siblings(".pane:visible").slideUp("slow");
        $(this).toggleClass("current");
        $(this).siblings("h3").removeClass("current");
    });
}