/**
 *
 */

var existingImage = null;

var callbackFunction = function (ctx, data) {
    $("#clinic_name").val(data.name);
    $("#clinic_desc").val(data.description);
    existingImage = data.image;
};

connector.getData("get", "/app_dev.php/json/get/clinic/" + twigId, "json", "", callbackFunction, "");

/**
 * handle form submit
 */
initiateDropzone("#clinic_image", existingImage);

$(document).on("click", ".edit_clinic", function () {

    var clinicObject = {
        id: twigId,
        name: $("#clinic_name").val(),
        description: $("#clinic_desc").val(),
        working_hours: "12-20h",
        image: activeImage
    };

    var clinic = JSON.stringify(clinicObject);

    var callbackFunction = function (ctx, data) {
        console.log(data);
    };

    connector.getData("post", "/app_dev.php/json/edit/clinic/" + twigId, "json", clinic, callbackFunction, $(this));

});