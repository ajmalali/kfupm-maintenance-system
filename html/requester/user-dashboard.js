function getProfile() {
    $.ajax({
        type: "POST",
        url: "getProfile.php",
        success: function (result) {
            $('#profile .modal-body').append(result);
        }
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
    initRateButtons();

    $('#profile-link').on('click', function () {
        $('#profile .modal-body').empty();
        getProfile();
    });
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

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(displayLocation);
  } else {
    alert("Location is not supported in your Browser");
  }
}
function displayLocation(pos) {
    var crd = pos.coords;
    console.log('Your current position is:');
    console.log(`Latitude : ${crd.latitude}`);
    console.log(`Longitude: ${crd.longitude}`);
    var ltt = crd.latitude.toString();
    var lng = crd.longitude.toString();
    var loc = ltt + "," + lng;
    $('#location').val(loc);
}




init();
