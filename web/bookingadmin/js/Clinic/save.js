/**
 * handle form submit
 */
initiateDropzone("#clinic_image", null);

$(document).on("click", ".save_clinic", function () {

    var clinicObject = {
        name: $("#clinic_name").val(),
        description: $("#clinic_desc").val(),
        working_hours: "12-20h",
        image: activeImage
    };

    var clinic = JSON.stringify(clinicObject);

    var callbackFunction = function (ctx, data) {
        console.log(data);
        if (data == 200) {
            window.location.reload();
        }
    };

    connector.getData("post", "/app_dev.php/json/insert/clinic", "json", clinic, callbackFunction, $(this));

});