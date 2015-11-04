var categoryObjects = null;

/**
 * handle list population
 */
$(window).on("load", function () {

    var callbackFunction = function (ctx, data) {
        categoryObjects = data;
        populateTable(categoryObjects);
        $('#categories_table').DataTable();
        console.log(categoryObjects);
    };

    connector.getData("get", "/app_dev.php/json/list/categories", "json", "", callbackFunction, "");

    function populateTable(categoryObjects) {
        $.each(categoryObjects, function (key, value) {
            var tableRow = "<tr>" +
                "<td>" + value.name + "</td>" +
                "<td>" + value.name + "</td>" +
                "</tr>";

            $("#categories_table tbody").append(tableRow);
        });
    }

});