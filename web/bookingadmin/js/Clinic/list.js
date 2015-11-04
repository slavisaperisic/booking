var clinicObjects = null;

/**
 * handle list population
 */
$(window).on("load", function () {

    var callbackFunction = function (ctx, data) {
        clinicObjects = data;
        populateTable(clinicObjects);
        $('#clinics_table').DataTable();
        console.log(clinicObjects);
    };

    connector.getData("get", "/app_dev.php/json/list/clinics", "json", "", callbackFunction, "");

    function populateTable(clinicObjects) {
        $.each(clinicObjects, function (key, value) {
            var tableRow = "<tr>" +
                "<td>" + value.name + "</td>" +
                "<td>" + value.description + "</td>" +
                "<td>" + value.working_hours + "</td>" +
                "</tr>";

            $("#clinics_table tbody").append(tableRow);
        });
    }

});