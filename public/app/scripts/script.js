// ajax anrop till clientsidan indexedDB.php i app foldern




$(document).ready(function () {

    $("#submit").on("click", function (e) {
        e.preventDefault()


        // transferInput = $("#transfer").val();
        // from = $("#fromUserList").val();
        // to = $("#toUserList").val();

        // console.log(transferInput);
        // console.log(from);
        // console.log(to);

        // data = {};

        // data["from_amount"] = transferInput;
        // data["from_account"] = from;
        // data["to_amount"] = transferInput;
        // data["to_account"] = to;
        let data = {"from_amount": $('#transfer').val(), "to_amount": $('#transfer').val(), "from_account": $('#fromUserList').val(),"to_account": $('#toUserList').val()};        console.log(data);
        console.log(JSON.stringify(data));
        // let data = {
        //     "from_amount":transferInput,
        //     "from_account":from,
        //      "to_account":to,
        //      "to_amount":transferInput
        //     }

        $.ajax({
            type: "POST",
            url: 'http://localhost/banking/bank-transfers/public/api/createTransaction.php',
            data: JSON.stringify(data),
            dataType: 'json',
            
            success: function (d) {
                alert('Success');
                //transfer mooney to selected accounts using views in database

            },

            error: function(err) {
                console.error(err);
            }
        });
    });


    $.ajax({
        url: 'http://localhost/banking/bank-transfers/public/api/index.php',
        success: function (d) {

            for (var i = 0; i < d.data.length; i++) {
                var obj = d.data[i];

                $("select").append(`<option class="option" value="${obj.account_id}">  ${obj.firstName}  ${obj.lastName} ${obj.balance}kr</option>`);


            }
        }
    });

    // $("select").change("click", function (e) {
    // var id = this.value[0];
    // console.log(id);
    // let toUserList = $("#toUserList");
    //        let toUserId = toUserList.options[toUserList.selectedIndex].value;
    //        console.log(toUserId);

    // });
});
