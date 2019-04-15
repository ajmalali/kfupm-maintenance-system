function initCancelButtons() {
    $(document).on('click', '.cancel',function () {
        let requestCard = $(this).parents('div.col-lg-4 ')[0];
        let requestText = $(requestCard).find('p.card-text')[0].innerHTML;
        let requestID = requestText.substr(-1);

        $.ajax({
            type: "POST",
            url: "cancelRequest.php",
            data: {"requestID": requestID},
            success: function () {
                $(requestCard).fadeOut();
            }
        });
    });
}

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


init();