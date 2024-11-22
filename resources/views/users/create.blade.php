<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    legend{
      display : flex;
      flex-direction : column;
      align-items: center;
      color : #5a5c5a;
      font-size:medium
    }
    .container{
      background: linear-gradient(45deg, #ffe5e5, #ffb6c1, #ff6347);
      border-radius: 15px;
      box-shadow: 2px 2px 12px;
      border: 1px solid #ddd;
      width: 65%; 
      color : #5a5c5a;
      font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
      padding : 10px 10px 10px 20px;
      margin : 20px 30px 30px 20px;
    }
    .form-control{
      display : flex;
      flex-direction : column;
      width : 100%;
      border-style: inherit;

    }


  </style>
</head>
<body>
  <legend>Adding New Users</legend>
  <div class="container">
    <form action="{{url('create')}}" method="POST"> 
      <!-- must have --its a token we must guarantee that user really have that informations (cross site request forgery)-->
      @csrf
      <div class="form-group row">
          <label for="inputName" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
            <input type="text" name="name" class="form-control" id="inputName" placeholder="name">
            <!--             we need this name  -->
          </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
        </div>
      </div>

      <!-- sign in -->
      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary" style="background: linear-gradient(45deg, #ffcccb, #ff7a75, #ff6347);">Sign in</button>
        </div>
      </div>
    </form>
  </div>
</body>
</html>