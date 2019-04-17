function init() {
    $(document).on('click', '.assign',function () {
        // let requestCard = $(this).parents('div.col-lg-4')[0];
        let requestCard = $(this).parents('div.col-lg-4')[0];
        let requestText = $(requestCard).find('p.card-text')[0].innerHTML;
        let requestID = requestText.split(":")[1].trim();

        $.ajax({
            type: "POST",
            url: "assignRequest.php",
            data: {"requestID": requestID},
            success: function (result) {
                // $('#previous-requests').find('tbody:last').append(result);
            }
        });
    });
}

init();