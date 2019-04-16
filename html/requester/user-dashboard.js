function init() {
    $('#serviceType').on('change', function () {
        let service = $('#service');
        let serviceType = $(this).val();
        $.ajax({
            type: "POST",
            url: "getService.php",
            data: {'serviceType': serviceType},
            success: function (result) {
                service.empty();
                service.append(result);
            }
        });
    });

    $('#service-request').on('submit', function (e) {
        e.preventDefault();
        let requestData = getRequestData();
        createRequest(requestData);
    });

    initCancelButtons();
    initRateButtons();
}

function createRequest(requestData) {
    $.ajax({
        type: "POST",
        url: "createRequest.php",
        data: requestData,
        success: function (result) {
            alert("Your request has been sent.");
            $('#ongoing-requests').append(result);
        }
    });
}

function getRequestData() {
    let data = {};
    data['service'] = $('#service').val();
    data['time'] = $('#time').val();
    data['location'] = $('#location').val();
    data['buildingNumber'] = $('#buildingNumber').val();
    data['roomNumber'] = $('#roomNumber').val();
    data['comment'] = $('#comment').val();
    return data;
}

function initCancelButtons() {
    $(document).on('click', '.cancel',function () {
        let requestCard = $(this).parents('div.col-lg-4 ')[0];
        let requestText = $(requestCard).find('p.card-text')[0].innerHTML;
        let requestID = requestText.split(":")[1].trim();

        $.ajax({
            type: "POST",
            url: "cancelRequest.php",
            data: {"requestID": requestID},
            success: function (result) {
                $(requestCard).fadeOut();
                $('#previous-requests').find('tbody:last').append(result);
            }
        });
    });
}

function initRateButtons() {
    $(document).on('click', '.rate',function () {
        let rating = prompt("Enter a rating between 1-5 \n(1 being the worst and 5 being the best)", "5");
        rating = Number(rating);
        if (rating) {
            let requestCard = $(this).parents('div.col-lg-4 ')[0];
            let requestText = $(requestCard).find('p.card-text')[0].innerHTML;
            let requestID = requestText.split(":")[1].trim();

            $.ajax({
                type: "POST",
                url: "completeRequest.php",
                data: {"rating" : rating, "requestID": requestID},
                success: function (result) {
                    $(requestCard).fadeOut();
                    $('#previous-requests').find('tbody:last').append(result);
                }
            });
        }
    });
}


init();