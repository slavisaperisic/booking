var serviceObjects = null;

/**
 * handle list population
 */
$(window).on("load", function () {

    var callbackFunction = function (ctx, data) {
        serviceObjects = data;
        populateTable(serviceObjects);
        $('#services_table').DataTable();
        console.log(serviceObjects);
    };

    connector.getData("get", "/app_dev.php/json/list/services", "json", "", callbackFunction, "");

    function populateTable(serviceObjects) {
        $.each(serviceObjects, function (key, value) {
            var tableRow = "<tr>" +
                "<td>" + value.name + "</td>" +
                "<td>" + value.description + "</td>" +
                "<td>" + value.description + "</td>" +
                "</tr>";

            $("#services_table tbody").append(tableRow);
        });
    }

});