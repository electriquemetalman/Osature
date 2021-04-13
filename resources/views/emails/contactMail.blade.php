<!DOCTYPE html>
<html>
<head>
    <title>{{ env('APP_NAME') }}.com</title>
</head>
<body>
    <h1>{{ $details['subject'] }}</h1>
    <h6>{{ $details['name'] }}</h6>
    <p>{!! $details['message'] !!}</p>
    <p>Coordialement.</p>
    
   
</body>
</html>