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


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">Features</a>
      <a class="nav-item nav-link" href="#">Pricing</a>
      <a class="nav-item nav-link disabled" href="#">Disabled</a>
    </div>
  </div>
</nav>

    
        <form id="form" method="POST">
            from:<select id="fromUserList">
            </select>

            <input type="text" placeholder="Amount" name="transfer" id="transfer" required>

            to:<select id="toUserList">
            </select>
            <br>
            <button type="button" class="btn btn-primary" name="submit" id="submit">Transfer</button>
        </form>
        <h1>Users</h1>
        <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Balance</th>
    </tr>
  </thead>
  <tbody>
    
      <th></th>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    
  </tbody>
</table>
<h1>History</h1>
<table class="table table-striped table-dark">

<thead>
    <tr>
      <th scope="col">Transfered money</th>
      <th scope="col">From</th>
      <th scope="col">To</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    
      <th></th>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    
  </tbody>
</table>
    
    <script src="./scripts/script.js" ></script>
    
</body>
</html>