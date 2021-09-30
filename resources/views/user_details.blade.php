<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <titleEUser Details</title>
</head>
<body>

<!-- Specify content -->
<div class="container">
    <div class="row">
        <div class="actionbutton w-100 text-left p-4">
            <a class='btn btn-info' href="{{route('getAllEzekiaUsers')}}">All Ezekia Users</a>
            <a class='btn btn-info' href="{{route('createUser', ['link' => 'new'])}}">Add new Ezekia User</a>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">    <h3>Ezekia User Details</h3>
            <div class="col-md-12 col-sm-12 col-xs-12">
                @if (isset($user['firstname']))
                First Name: <strong>{{ $user['firstname'] }},</strong><br/>
                Last Name: <strong>{{ $user['lastname'] }},</strong><br/>
                Email: <strong>{{ $user['email'] }}</strong><br/>
                Hourly rate: <strong>{{ $user['hourlyrate'] }} {{ $user['hourly_rate_currency'] }}.</strong><br/>
                    @endif
            </div>
        </div>
    </div>
</body>