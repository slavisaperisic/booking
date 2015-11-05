var doctorObjects = null;

/**
 * handle list population
 */
$(window).on("load", function () {

    var callbackFunction = function (ctx, data) {
        doctorObjects = data;
        populateTable(doctorObjects);
        $('#doctors_table').DataTable();
        console.log(doctorObjects);
    };

    connector.getData("get", "/app_dev.php/json/list/doctors", "json", "", callbackFunction, "");

    function populateTable(doctorObjects) {
        $.each(doctorObjects, function (key, value) {
            var tableRow = "<tr>" +
                "<td>" + value.fullname + "</td>" +
                "<td>" + value.title + "</td>" +
                "<td>" + value.title + "</td>" +
                "</tr>";

            $("#doctors_table tbody").append(tableRow);
        });
    }

});