/**
 * handle form submit
 */
$(document).on("click", ".save_category", function () {

    var categoryObject = {
        name: $("#category_name").val(),
        description: $("#category_desc").val()
    };

    var category = JSON.stringify(categoryObject);

    var callbackFunction = function (ctx, data) {
        console.log(data);
        if (data == 200) {
            window.location.reload();
        }
    };

    connector.getData("post", "/app_dev.php/json/insert/category", "json", category, callbackFunction, $(this));

});
