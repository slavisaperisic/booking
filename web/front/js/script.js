/**
 *
 * @type {{getData: Function}}
 */
var connector = {
    getData: function (methodType, route, dataType, dataBlock, callbackFunction, context) {
        $.ajax({
            async: true,
            type: methodType,
            dataType: dataType,
            url: route,
            data: dataBlock
        }).then(function (data) {
            if (callbackFunction != null && context != null) {
                callbackFunction(context, data);
            }
            return data;
        });
    }
};
