let div;
let id;

function initAssignButton() {
    $(document).on('click', '.assign',function () {
        let requestCard = $(this).parents('div.col-lg-4')[0];
        let requestText = $(requestCard).find('p.card-text')[0].innerHTML;
        let requestID = requestText.split(":")[1].trim();
        div = requestCard;
        id = requestID;
        $.ajax({
            type: "POST",
            url: "getStaff.php",
            data: {"requestID": requestID},
            success: function (result) {
                // alert(result);
                let modal =  $('#exampleModal');
                modal.find('div.modal-body').empty();
                modal.find('div.modal-body').append(result);
            }
        });
    });
}

function initRejectButtons() {
    $(document).on('click', '.reject',function () {
        let requestCard = $(this).parents('div.col-lg-4')[0];
        let requestText = $(requestCard).find('p.card-text')[0].innerHTML;
        let requestID = requestText.split(":")[1].trim();

        $.ajax({
            type: "POST",
            url: "rejectRequest.php",
            data: {"requestID": requestID},
            success: function () {
                $(requestCard).fadeOut();
            }
        });
    });
}

function init() {
    initAssignButton();
    initRejectButtons();
}

function assignStaff() {
    let staff = $('#people').val();

    $.ajax({
        type: "POST",
        url: "assignJob.php",
        data: {"requestID": id, "staffID": staff},
        success: function () {
            $(div).fadeOut();
        }
    });
}

init();