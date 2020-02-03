// ajax anrop till clientsidan indexedDB.php i app foldern

$("tbody").on( "click", "button.btn-danger", function( event ) {
    $( this ).parent().parent().fadeOut();
});

$( "button.btn-primary" ).on( "click", function( event ) {
  $.ajax({
    url: 'https://randomuser.me/api/',
    success: function(data) {
        let id = data.results[0].id.value;
    	let firstName = data.results[0].name.first;
    	let lastName = data.results[0].name.last;
        let email = data.results[0].email;

			$("tbody").append(`<tr><td>${id}</td><td>${firstName}</td><td>${lastName}</td><td>${email}</td><td><button type="button" class="btn btn-danger">Remove</button></td></tr>`);
    }
  });
});