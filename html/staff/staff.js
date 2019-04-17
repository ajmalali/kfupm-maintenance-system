var ltt = 0;
var lng = 0;

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
function showLocation(requestID) {

  document.getElementById("map").style.display = "block"
  $.ajax({
    type: "POST",
    url: "getLoc.php",
    data : {"requestID" : requestID},
    success : function (loc) {
      var arr =  loc.split(",");
      ltt = arr[0];
      lng = arr[1];


      /**
       * Moves the map to display over Berlin
       *
       * @param  {H.Map} map      A HERE Map instance within the application
       */
      function moveMapToBerlin(map){
        console.log(ltt);
        console.log(lng);
        //map.setCenter({lat:ltt, lng:lng});
        map.setCenter({lat:ltt, lng:lng});
        map.setZoom(15);
        var parisMarker = new H.map.Marker({lat:ltt, lng:lng});
        map.addObject(parisMarker);
      }






       // Boilerplate map initialization code starts below:


      //Step 1: initialize communication with the platform
      var platform = new H.service.Platform({
        app_id: 'devportal-demo-20180625',
        app_code: '9v2BkviRwi9Ot26kp2IysQ',
        useHTTPS: true
      });
      var pixelRatio = window.devicePixelRatio || 1;
      var defaultLayers = platform.createDefaultLayers({
        tileSize: pixelRatio === 1 ? 256 : 512,
        ppi: pixelRatio === 1 ? undefined : 320
      });

      //Step 2: initialize a map  - not specificing a location will give a whole world view.
      var map = new H.Map(document.getElementById('map'),
        defaultLayers.normal.map, {pixelRatio: pixelRatio});

      //Step 3: make the map interactive
      // MapEvents enables the event system
      // Behavior implements default interactions for pan/zoom (also on mobile touch environments)
      var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

      // Create the default UI components
      var ui = H.ui.UI.createDefault(map, defaultLayers);

      // Now use the map as required...
      moveMapToBerlin(map);


    }
  });


}



init();
