<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="model.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Tabiri254</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>

      </ul>
    </div>
  </nav>


  <div >
    <div class="row">
      <div class="col-md-3">
      </div>
      <div class="col-md-6">
        <form action="model.php" method="post">
        <table class="table">
          <tr>
              <td class="thh">Time</td>
              <td class="thh">Home team</td>
              <td class="thh">Away team</td>
              <td class="thh">prediction</td>

          </tr>
          <tr>
              <td><input type="text" class="form-control"name="time" ></td>
              <td><input type="text" class="form-control" name="hometeam"></td>
              <td><input type="text" class="form-control" name="awayteam">
              <td><input type="text" class="form-control"name="pick">

              </td>
            </tr>


        </table>
      </form>
        <div>
          <button type="submit" class="btn btn-success">upload</button>
        </div>



      </div>

  <div class="col-md-3">
  </div>
    </div>
</div>

</body>
</html>
