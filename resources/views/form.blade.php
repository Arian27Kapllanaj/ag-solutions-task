<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<style>
    body {
        text-align: center;
    }
</style>
<body>
    <h1>Form</h1>

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif

    <form method="post" action="{{url('form/save')}}">
        @csrf
        <input type="email" placeholder="Email" name="email" value="{{ old('email') }}" />
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror<br>
        <input type="text" placeholder="Text" name="text" value="{{ old('text') }}" />
        @error('text')
        <span class="text-danger">{{ $message }}</span>
        @enderror<br>
        <input type="datetime-local" placeholder="Date" name="datetime" value="{{ old('datetime') }}" />
        @error('datetime')
        <span class="text-danger">{{ $message }}</span>
        @enderror<br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
