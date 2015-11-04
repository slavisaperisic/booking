/**
 * handle form submit
 */
initiateDropzone("#doctor_image");

$(document).on("click", ".save_doctor", function () {

    var doctorObject = {
        fullname: $("#doctor_firstname").val() + " " + $("#doctor_lastname").val(),
        title: $("#doctor_title").val(),
        image: activeImage
    };

    var doctor = JSON.stringify(doctorObject);

    var callbackFunction = function (ctx, data) {
        console.log(data);
        if (data == 200) {

        }
        window.location.reload();
    };

    connector.getData("post", "/app_dev.php/json/insert/doctor", "json", doctor, callbackFunction, $(this));

});