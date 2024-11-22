<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>HW??</title>
  <style>
   /* .container {
      display: flex;
      flex-wrap: wrap; 
      gap: 15px; 
      justify-content: space-evenly; 
      padding: 20px;
      border: 2px solid black;
      margin-top: 30px;

    } */

    .card {
      background: linear-gradient(45deg, #ffe5e5, #ffb6c1, #ff6347);
      border-radius: 15px;
      box-shadow: 2px 2px 12px;
      border: 1px solid #ddd;
      width: 320px; 
      /* padding: 5px;  */

    }

    .card:hover {
      transform: scale(1.05);
    }

    .card-header {
      background: linear-gradient(45deg, #ffcccb, #ff6347);
      color: white;
      border-radius: 15px 15px 0 0;
      font-weight:400;
      text-align: center; 
     
    }
    .card-title {
      /* background-color: #ffcccb;  */
      color : white;
      font-size: 12px;
      /* color: #343a40; */
      padding : 5px;
    }

    fieldset {
      border: 2px solid  #ffcccb;
      border-radius: 10px;
      padding: 10px;
      margin: 0;
      display: flex;
      flex-wrap: wrap; 
      gap: 15px; 
      justify-content: space-evenly; 
    }

    legend {
      color:  #ff6347;
      font-weight: bold;
    }

    .card-body{
      display : flex; 
      flex-direction:  column;
      align-items:  center;
    }

    a{
      color : grey;
    }

    .card-footer {
      /* background: linear-gradient(45deg, #ffe5e5, #ffb6c1, #ff6347); */
      background: linear-gradient(45deg, #ffcccb, #ff7a75, #ff6347);
      /* background: linear-gradient(45deg, #ffd1d1, #ff6347); */
      padding: 5px;
      font-size: 12px;
      text-align: center;
      border-radius: 0 0 15px 15px;
    }
    
  </style>
  
</head>
<body>
  <!-- <h3>User list</h3> -->
  {{--@php
    $count = 10;
    for($i = 0; $i < $count; $i++){
      echo $i . "<br>";
    }
  @endphp
  @for ($i = 0; $i < $count; $i++)
    {{ $i }} 
  @endfor--}}

  {{-- @foreach($users as $user)
    <p>{{$user->email}} </p>
  @endforeach --}}

  {{-- @forelse($users as $user)
    <p>{{$user->email}} </p>
  @empty
    <p>No record</p>
  @endforeach --}}



{{-- NOTE : this is for hw --}}
  <div class="container">
    <fieldset>
      <legend>User Informations</legend>

      @foreach ($users as $image => $user)
        <div class="card bg-light mb-3" style="max-width: 18rem;">
          <div class="card-header"> {{$user->name}}</div>
          
          <div class="card-body">
            <img src="{{asset('storage/images/Pic'. ($image+1) . '.jpg')}}" alt="{{ $user->name }}" style="width: 50px; height: 50px; border-radius: 50%;">
            <h3 class="card-title"><a>{{$user->email}}</a></h3>

            <!-- for update tam id  -->
            <a href="{{url('edit/'. $user->id)}}" class="btn btn-light">edit</a>

            <!-- for delete tam id -->
            <!-- <a href="{{url('delete/'. $user->id)}}" class="btn btn-light">delete</a> -->
            <form action="{{url('delete/'. $user->id)}}" method="POST"> 
              <!-- must have --its a token we must guarantee that user really have that informations (cross site request forgery)-->
              @csrf
              @method('DELETE')
              <!-- <div></div> -->
              <button type="submit" class="btn btn-light" onclick="return confirm('Are you sure?')">Delete</button>
            </form>

          </div>

        <!-- For footer vea -->
          <div class="card-footer">
            Joined: {{$user->created_at->format('M d, Y')}}
          </div>

        </div>
      @endforeach

      @if($users->isEmpty())
        <p>No records</p>
      @endif

    </fieldset>
    <a href="{{url('create')}}" class="btn btn-light">New User</a>

  </div>
</body>
</html>