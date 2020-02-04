// ajax anrop till clientsidan indexedDB.php i app foldern

$("button").on("click", function (event) {
    $.ajax({
        url: 'http://localhost:8888/banking/bank-transfers/public/api/index.php',
        success: function (d) {
            
            //transfer mooney to selected accounts
            
        }
    });
});


$.ajax({
    url: 'http://localhost:8888/banking/bank-transfers/public/api/index.php',
    success: function (d) {

        for (var i = 0; i < d.data.length; i++) {
            var obj = d.data[i];

            $("select").append(`<option>${obj.id}  ${obj.firstName}  ${obj.lastName} ${obj.mobilephone}</option>`);

        }
    }
});