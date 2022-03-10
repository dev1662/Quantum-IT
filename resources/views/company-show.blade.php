<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Company</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        .collapse{
            margin-left: 50%;
        }
        .navbar-nav{
            margin-left: 10%;
        }
    </style>
</head>
<body>
    @include('nav')
    <h3 class="text-center mt-5 d-flex" >Details Of Companies
    <button class="btn btn-success" style="margin-left:70%"><a style="color:aliceblue; text-decoration:none;" href="add-company">Add Company</a></button></h3>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Logo</th>
            <th scope="col">Website</th>
            <th scope="col">Action</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($company as $abc)

            <tr>
                <td>{{$abc['name']}}</td>
                <td>{{$abc['email']}}</td>
                <td><img src="storage/{{$abc['logo']}}" style="max-width: 20%"></td>
                <td><a href="{{$abc['website']}}"> {{$abc['website']}} </a></td>
                <td>
                    <button class="btn btn-primary"><a style="color: white; text-decoration:none;" href="edit-company/{{$abc->id}}">Edit</a></button>
                    <button class="btn btn-danger"><a style="color: white; text-decoration:none;" href="delete-company/{{$abc->id}}">Delete</a></button>

                </td>
            </tr>
            @endforeach

        </tbody>
      </table>
</body>
</html>
