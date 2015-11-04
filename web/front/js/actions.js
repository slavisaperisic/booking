/**
 * handle form submit
 */
$(document).on("click", ".submit-job", function () {

    var jobObject = {
        title: $("#job_title").val(),
        description: $("#job_description").val(),
        status: "pending",
        email: $("#job_email").val()
    };

    var job = JSON.stringify(jobObject);

    var callbackFunction = function (ctx, data) {
        console.log(data);
        //if (data == 200) {
        //    window.location.reload();
        //}
    };

    connector.getData("post", "/insert_job", "json", job, callbackFunction, $(this));

});

var jobObjects = null;

/**
 * handle list population
 */
$(window).on("load", function () {

    var callbackFunction = function (ctx, data) {
        jobObjects = data;
        populateTable(jobObjects);
        $('#jobtable').DataTable();
    };

    connector.getData("post", "/list_jobs", "json", "", callbackFunction, "");

    function populateTable(jobObjects) {
        $.each(jobObjects, function (key, item) {
            var tableRow = "<tr>" +
                "<td>" + item.title + "</td>" +
                "<td>" + item.email + "</td>" +
                "<td>" + item.description + "</td>" +
                "</tr>";

            $("#jobtable tbody").append(tableRow);
        });
    }

});