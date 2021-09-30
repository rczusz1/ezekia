<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Add User</title>
</head>
<body>

<!-- Specify content -->
    <div class="container">
        <div class="row">
            <div class="actionbutton w-100 text-left p-4">
                <a class='btn btn-info' href="{{route('getAllEzekiaUsers')}}">All Ezekia Users</a>
                <a class='btn btn-info' href="{{route('createUser', ['link' => 'new'])}}">Add new Ezekia User</a>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <!-- Alert message (start) -->
                @if(Session::has('message'))
                    <div class="alert {{ Session::get('alert-class') }}">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <!-- Alert message (end) -->

                <form action="{{route('storeUser')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">First Name <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="category_name" class="form-control col-md-12 col-xs-12" name="firstname" placeholder="Enter first name" required="required" type="text">
                            @if ($errors->has('firstname'))
                                <span class="errormsg">{{ $errors->first('firstname') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Last Name <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="category_name" class="form-control col-md-12 col-xs-12" name="lastname" placeholder="Enter last name" required="required" type="text">
                            @if ($errors->has('lastname'))
                                <span class="errormsg">{{ $errors->first('lastname') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="category_name" class="form-control col-md-12 col-xs-12" name="email" placeholder="Enter email" required="required" type="text">
                            @if ($errors->has('email'))
                                <span class="errormsg">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hourlyrate">Hourly Rate<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="hourlyrate" class="form-control col-md-12 col-xs-12" name="hourlyrate" placeholder="Enter hourly rate" required="required" type="text">
                            @if ($errors->has('hourlyrate'))
                                <span class="errormsg">{{ $errors->first('hourlyrate') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hourly_rate_currency">Hourly Rate Currency</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{--<input id="hourly_rate_currency" class="form-control col-md-12 col-xs-12" name="hourly_rate_currency" placeholder="Enter hourly rate currency" required="required" type="text">--}}
                            <select  id="hourly_rate_currency" class="form-control col-md-12 col-xs-12" name="hourly_rate_currency" >
                                <option value="GBP"> GBP</option>
                                <option value="EUR"> EUR</option>
                                <option value="USD"> USD</option>
                            </select>
                            @if ($errors->has('hourly_rate_currency'))
                                <span class="errormsg">{{ $errors->first('hourly_rate_currency') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <input type="submit" name="submit" value='Submit new user' class='btn btn-success'>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>