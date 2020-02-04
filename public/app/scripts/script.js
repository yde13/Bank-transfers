// ajax anrop till clientsidan indexedDB.php i app foldern

$("tbody").on( "click", "button.btn-danger", function( event ) {
    $( this ).parent().parent().fadeOut();
});

$( "button.btn-primary" ).on( "click", function( event ) {
  $.ajax({
    url: 'http://localhost:8888/banking/bank-transfers/public/api/index.php',
    success: function(d) {
        let id = d.data[0].id;
        let firstName = d.data[0].firstName;
        let lastName = d.data[0].lastName;
        let mobilephone = d.data[0].mobilephone;

			$("tbody").append(`<tr><td>${id}</td><td>${firstName}</td><td>${lastName}</td><td>${mobilephone}</td><td><button type="button" class="btn btn-danger">Remove</button></td></tr>`);
    }
  });
});