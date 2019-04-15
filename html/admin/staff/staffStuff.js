function addStaff() {
  var id = $('#id').val();
  var name = $('#name-field').val();
// add to database
  $.ajax({
    type : "POST",
    url : "add-staff.php",
    data : { "id" : id, "name" : name,},
    success : function(result) {
      // result has the new row (Use echo from the php file)
      $('table').find('tbody:last').append(result);
      // after adding the stuff set the val for all those form fields to ""
      $('#name-field').val("");
      $('#id').val("");
    }
  });
}

// When the user clicks on the Remove BUtton
  $('.btn-danger').click( function() {
    // get the ID of the receptinist deleted
    var row = $(this).parent().parent();
    var id = $(row).children('td')[0].innerHTML;

    $.ajax({
      type : "POST",
      url : "delete-staff.php",
      data : {"id" : id},
      success : function (result) {
        alert(result);
        row.remove();       // removes row from the front end
      }

    });
  }

);
