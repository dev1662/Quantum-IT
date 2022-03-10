<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Employees</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <style>
        .collapse {
            margin-left: 50%;
        }

        .navbar-nav {
            margin-left: 10%;
        }



    </style>
</head>

<body>
    @include('nav')
    <h3 class="text-center mt-5 d-flex">Add Employees
        <button class="btn btn-success" style="margin-left:70%"><a style="color:aliceblue; text-decoration:none;"
                href="employees-show">Show Employees</a></button>
    </h3>
    <form action="store-employees" method="POST" >
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input type="text" class="form-control" name="firstName" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter First Name">
            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input type="text" class="form-control" name="lastName" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter Last Name">
            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter email">
            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Phone</label>
            <input type="text" class="form-control" name="phone" id="exampleInputPassword1" placeholder="Phone">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Company</label>
            <select name="company_id" class="form-control" id="">
                <option value="">Select an Option</option>
                @foreach ($company as $abc)

                <option value=" {{$abc['id']}} "> {{$abc['name']}} </option>
                @endforeach
            </select>
            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>
