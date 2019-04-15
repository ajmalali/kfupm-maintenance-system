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
}

function createRequest(requestData) {
    $.ajax({
        type: "POST",
        url: "createRequest.php",
        data: requestData,
        success: function (result) {
            alert("Your request has been sent.");
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
    data['userID'] = sessionStorage.getItem('id');
    return data;
}


init();