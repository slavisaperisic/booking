window.Dropzone;
Dropzone.autoDiscover = false;

var instanceDropzone = null;
var activeImage = null;
var galleryImages = [];

function initiateDropzone(id_name, existingImage) {

    console.log(existingImage);

    instanceDropzone = new Dropzone(id_name, {
        url: "127.0.0.1", // Set the url
        thumbnailWidth: 180,
        thumbnailHeight: 180,
        parallelUploads: 1,
        maxFiles: 2,
        addRemoveLinks: true,
        //previewTemplate: previewTemplate,
        autoProcessQueue: false, // Make sure the files aren't queued until manually added
        //previewsContainer: "form#primaryDropzone", // Define the container to display the previews
        clickable: true, // Define the element that should be used as click trigger to select files.
        init: function () {
            this.hiddenFileInput.removeAttribute('multiple');
        }

    });

    instanceDropzone.on("addedfile", function (file) {
        // Capture the Dropzone instance as closure.
        var _this = this;

        //remove the already added file along with it's thumbnail on the add of new file
        var existingFiles = instanceDropzone.getFilesWithStatus(Dropzone.QUEUED);
        if (existingFiles.length > 0) {
            this.removeFile(existingFiles[0]);
        }

        //read file into currentImage
        var reader = new FileReader();
        reader.onloadend = function () {
            var imgBase64 = reader.result;
            activeImage = new Image(file.name, imgBase64)
            console.log(activeImage);
        };
        reader.readAsDataURL(file);

    });

    instanceDropzone.on("removedfile", function (file) {

    });
}

function Image(name, base64_content){
    this.name = name;
    this.base64_content = base64_content;
}

/**
 *
 * @param id_name
 * @param existingImages
 */
function initiateDropzoneGallery(id_name, existingImages) {

    console.log(existingImages);

    instanceDropzone = new Dropzone(id_name, {
        url: "127.0.0.1", // Set the url
        thumbnailWidth: 180,
        thumbnailHeight: 180,
        parallelUploads: 10,
        maxFiles: 10,
        addRemoveLinks: true,
        //previewTemplate: previewTemplate,
        autoProcessQueue: false, // Make sure the files aren't queued until manually added
        //previewsContainer: "form#primaryDropzone", // Define the container to display the previews
        clickable: true, // Define the element that should be used as click trigger to select files.
        init: function () {
            //this.hiddenFileInput.removeAttribute('multiple');
        }

    });

    instanceDropzone.on("addedfile", function (file) {
        // Capture the Dropzone instance as closure.
        var _this = this;

        ////remove the already added file along with it's thumbnail on the add of new file
        //var existingFiles = instanceDropzone.getFilesWithStatus(Dropzone.QUEUED);
        //if (existingFiles.length > 0) {
        //    this.removeFile(existingFiles[0]);
        //}

        //read file into currentImage
        var reader = new FileReader();
        reader.onloadend = function () {
            var imgBase64 = reader.result;
            activeImage = new Image(file.name, imgBase64);
            galleryImages.push(activeImage);
        };
        reader.readAsDataURL(file);

    });

    instanceDropzone.on("removedfile", function (file) {

    });
}