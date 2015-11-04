/**
 *
 * @type {null}
 */
var categories = null;

var callbackListFunction = function (ctx, data) {
    categories = data;
    populateSelectBox(categories);
    console.log(categories);
};

connector.getData("get", "/app_dev.php/json/list/categories", "json", "", callbackListFunction, "");

/**
 * handle form submit
 */
$(document).on("click", ".save_service", function () {

    var categoriesArray = [];

    var rawCategoriesArray = $("#service_categories").val();

    $.each(rawCategoriesArray, function (key, value) {
        categoriesArray.push(
            new Category(value)
        );
    });

    var serviceObject = {
        name: $("#service_name").val(),
        description: $("#service_description").val(),
        categories: categoriesArray
    };

    //console.log(categoriesArray);return false;

    var service = JSON.stringify(serviceObject);

    var callbackFunction = function (ctx, data) {
        console.log(data);
    };

    connector.getData("post", "/app_dev.php/json/insert/service", "json", service, callbackFunction, $(this));

});

/**
 *
 * @param categories
 */
function populateSelectBox(categories) {

    $.each(categories, function (key, value) {
        var optionRow =
            "<option value=\"" + value.id + "\">" + value.name + "</option>";

        $("#service_categories").append(optionRow);
    });
}

/**
 *
 * @param id
 * @constructor Category
 */
function Category(id){
    this.id = id;
}
