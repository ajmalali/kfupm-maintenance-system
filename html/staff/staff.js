function init() {
    initCompleteButtons();
}

function initCompleteButtons() {
    $(document).on('click', '.complete', function () {
        let requestCard = $(this).parents('div.col-lg-4')[0];
        let requestText = $(requestCard).find('p.card-text')[0].innerHTML;
        let requestID = requestText.split(":")[1].trim();
        $.ajax({
            type: "POST",
            url: "completeJob.php",
            data: {"requestID": requestID},
            success: function (result) {
                $(requestCard).fadeOut();
                $('#completed-jobs').find('tbody:last').append(result);
                sendEmail(requestID);
            }
        });
    });
}

function sendEmail(requestID) {
    $.ajax({
        type: "POST",
        url: "../../sendEmail.php",
        data: {"requestID": requestID},
        success: function () {
            alert("Email has been sent to the requester");
        }
    });
}


init();