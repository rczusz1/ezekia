<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Ezekia Users</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="actionbutton w-100 text-left p-4">
                <a class='btn btn-info' href="{{route('getAllEzekiaUsers')}}">All Ezekia Users</a>
                <a class='btn btn-info' href="{{route('createUser', ['link' => 'new'])}}">Add new Ezekia User</a>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">

    <div class="p-4">
        @if(isset($users))
            @foreach ($users as $detail)
                <p><strong> {{ ++$loop->index }} / {{ $detail->firstname }}
                        {{ $detail->lastname }}:
                        {{ $detail->email }} </strong>;
                    Hourly rate: {{ $detail->hourlyrate}}
                    {{ $detail->hourly_rate_currency }}:

                </p>
            @endforeach
        @endif
    </div>

            </div>
        </div>
    </div>
</body>
</html>
