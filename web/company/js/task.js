var tasks = null;

getListOfTasks();

$(".show-task-form").on("click", function () {
    $(".task-form").fadeToggle();
    $(this).fadeOut();
    $("#task_title").focus();
});

/**
 * handle form submit
 */
$(document).on("click", ".save_task", function () {

    var taskObject = {
        title: $("#task_title").val(),
        description: $("#task_description").val()
    };

    if (taskObject.title.trim() == "" || taskObject.description.trim() == "")
        return false;

    var task = JSON.stringify(taskObject);

    var callbackFunction = function (ctx, data) {
        tasks = data;
        populateTasks(tasks);
        $(".task-form").fadeToggle();
        $(".show-task-form").fadeIn(    )
    };

    connector.getData("post", "/app_dev.php/invoice/json/insert/task", "json", task, callbackFunction, $(this));

});

/**
 * handle task edit
 */
$(document).on("dblclick", ".task", function () {

    var callbackFunction = function (ctx, data) {
        tasks = data;
        getListOfTasks();
    };

    connector.getData("post", "/app_dev.php/invoice/json/edit/task/" + $(this).data("id"), "json", "", callbackFunction, $(this));

});

/**
 *
 * @param tasks
 */
function populateTasks(tasks) {
    var holder = $(".task-holder");
    holder.empty();

    $.each(tasks, function (key, task) {
        var taskStatus = 0;
        if (task.status != undefined)
            taskStatus = task.status;

        var taskRowHTML =
            $("<div data-id=\"" + task.id + "\" class=\"task task-status-" + taskStatus + "\">" +
                "<h3 class=\"task_title\">" + task.title + "</h3>" +
                "<div class=\"task_description\">" +
                task.description +
                "</div>" +
                "</div>");

        holder.append(taskRowHTML);
    });
}

/**
 *
 */
function getListOfTasks() {

    var callbackFunction = function (ctx, data) {
        tasks = data;
        populateTasks(tasks)
    };

    connector.getData("post", "/app_dev.php/invoice/json/list/task", "json", "", callbackFunction, $(this));
}