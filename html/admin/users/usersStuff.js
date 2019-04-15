function addUsers() {
  var id = $('#id').val();
  var name = $('#name-field').val();
  var number = $('#mobile').val();
  var email = $('#email').val();
// add to database
  $.ajax({
    type : "POST",
    url : "add-users.php",
    data : { "id" : id, "name" : name, "number" : number, "email" : email},
    success : function(result) {
      alert(result);
      // result has the new row (Use echo from the php file)
      $('table').find('tbody:last').append(result);
      // after adding the stuff set the val for all those form fields to ""
      $('#name-field').val("");
      $('#id').val("");
      $('#mobile').val("");
      $('#email').val("");
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
      url : "delete-users.php",
      data : {"id" : id},
      success : function (result) {
        alert(result);
        row.remove();       // removes row from the front end
      }

    });
  }

);
