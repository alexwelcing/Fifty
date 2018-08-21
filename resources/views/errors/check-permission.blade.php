<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/app.css" rel="stylesheet">
    <title>{{ config('app.name', 'Permission Denied') }}</title>
</head>
<body>


<div class="container text-center">
	<h1>You don't have permission for access this page </h1>
	<a href="{{ redirect()->getUrlGenerator()->previous() }}">Go Back</a>
</div>


</body>
</html>