<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PawParazzi - Photo Upload</title>
</head>
<body>
    <h1>Upload</h1>
    <form method="POST" action="<?=config('app.url'); ?>/upload" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <input type="submit" name="Upload">
    </form>
</body>
</html>