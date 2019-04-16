function addService() {
  var id = $('#id').val();
  var service = $('#service-field').val();
  var serviceType = $('#service-type').val();
// add to database
  $.ajax({
    type : "POST",
    url : "add-services.php",
    data : { "id" : id, "service" : service, "service-type" : serviceType},
    success : function(result) {
      // result has the new row (Use echo from the php file)
      $('table').find('tbody:last').append(result);
      // after adding the stuff set the val for all those form fields to ""
      $('#service-field').val("");
      $('#id').val("");
      $('#service-type').val("");
    }
  });
}

function deleteRow(id) {
  $.ajax({
    type : "POST",
    url : "delete-services.php",
    data : {"id" : id},
    success : function (result) {
      var sr = id;
      sr = '#' + sr;
      // remove from front end
      $(sr).fadeOut(1000);
    }

  });
}
