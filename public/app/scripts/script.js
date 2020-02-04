// ajax anrop till clientsidan indexedDB.php i app foldern

$("button").on("click", function (event) {
    $.ajax({
        url: 'http://localhost:8888/banking/bank-transfers/public/api/index.php',
        success: function (d) {
            
            //transfer mooney to selected accounts using views in database

            
        }
    });
});


$.ajax({
    url: 'http://localhost:8888/banking/bank-transfers/public/api/index.php',
    success: function (d) {
        
        for (var i = 0; i < d.data.length; i++) {
            var obj = d.data[i];

            $("select").append(`<option class="option">${obj.account_id}  ${obj.firstName}  ${obj.lastName} ${obj.balance}kr</option>`);
           
        }
    }
});

$("select").change("click", function (e) {
    var id = this.value[0];
    console.log(id);
    
});