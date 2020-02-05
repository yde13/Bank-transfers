<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
     integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     
    
</head>
<body>
    
    <!-- det är här allting ska synas och köras! -->
    <!-- här vi ska skriva ut från databasen med hjälp av api från script.js -->
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Email</th>
      <th scope="col">Remove</th>
    </tr>
  </thead>
</table>
        <form id="form" method="POST">
            from:<select id="fromUserList">
            </select>

            <input type="text" placeholder="Amount" name="transfer" id="transfer" required>

            to:<select id="toUserList">
            </select>
            <br>
            <button type="button" class="btn btn-primary" name="submit" id="submit">Transfer</button>
        </form>
    
    <script src="./scripts/script.js" ></script>
    
</body>
</html>