/**
 * callb.backend.requests.js
 * Module callbBackendRequests
 */

/*global $, callbBackendRequests */

var callbBackendRequests = (function () { "use strict";
    //---------------- BEGIN MODULE SCOPE VARIABLES ---------------
    var
        onDeleteHandler, initModule;
    //----------------- END MODULE SCOPE VARIABLES ----------------

    //------------------- BEGIN EVENT HANDLERS --------------------
    onDeleteHandler = function (event) {
        if(confirm("{_wp('Delete?')}")) {

            event.preventDefault();

            var t = $(this);

            var id = t.attr('callb-request-id');

            if (id) {
                $.post('?plugin=callb&action=requestdelete', { 'id': id }, function (response) {
                    if (response.data === true) {
                        var showDeleted = '{$callb_settings.show_deleted}';
                        var newRequestCountEl = $("#wa-app #mainmenu .tabs").find('li a[href="?plugin=callb"] sup');
                        var newRequestCountVal = parseInt(newRequestCountEl.text()) - 1;

                        if (showDeleted === 'on') {
                            $(".callb-request-delete[callb-request-id='"+id+"']").closest("tr").addClass('gray').find('.human-status').text("{_wp('done')}");
                            t.remove();
                        } else {
                            $(".callb-request-delete[callb-request-id='"+id+"']").closest("tr").hide(600, function () {
                                $(this).show("normal");
                                $(this).remove();
                            });
                        }

                        if (newRequestCountVal === 0) {
                            newRequestCountEl.remove();
                        } else {
                            newRequestCountEl.text(newRequestCountVal);
                        }
                    }
                }, "json");
            }

        }
    };
    //------------------- END EVENT HANDLERS ----------------------

    //------------------- BEGIN PUBLIC METHODS --------------------
    initModule = function () {
        $('.callb-request-delete').on('click', onDeleteHandler);
    };

    return {
        initModule: initModule
    };
    //------------------- END PUBLIC METHODS ----------------------
}());