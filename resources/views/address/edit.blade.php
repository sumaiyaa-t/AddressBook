<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Document</title>
</head>
<body>
{{------------ Edit Form ----------------}}
<div class="p-3">
    <form action="{{ route('address.update', $address -> id) }}" method="post">
        {{ csrf_field() }}
        @method('put')
        <div class="form-group">
            <label for="exampleName">Name</label>
            <input type="text" name="user_name" class="form-control @error('user_name') is-invalid @enderror" id="inputName"
                   aria-describedby="emailHelp" placeholder="Enter name" value="{{ $address->user_name }}">
            <small id="nameHelp" class="form-text text-muted">We'll never share your name with anyone else.</small>
        </div>

        @error('user_name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="exampleName">Phone No</label>
            <input type="tel" name="tel" class="form-control @error('tel') is-invalid @enderror" id="inputPhone"
                   aria-describedby="emailHelp" placeholder="Enter phone no." value="{{ $address->tel }}">

            <small id="phoneHelp" class="form-text text-muted">We'll never share your phone no with anyone else.</small>
        </div>

        @error('tel')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="exampleName">Address</label>
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                   id="inputAddress" aria-describedby="emailHelp" placeholder="Enter address"
                   value="{{ $address->address }}">
            <small id=" addressHelp" class="form-text text-muted">We'll never share your address with anyone
                else.</small>
        </div>

        @error('address')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
<hr>
{{------------ Edit Form ----------------}}

</body>
</html>
