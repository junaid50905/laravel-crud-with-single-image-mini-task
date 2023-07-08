<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Single image upload</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        form{
            width: 20%;
        }
    </style>

</head>
<body>
    <form action="{{ route('update', $edited_item_value->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="old_img" value="{{ $edited_item_value->image }}">
        <input type="text" name="title" value="{{ $edited_item_value->title }}">
        <input type="file" name="image" class="dropify">
        previous image: <img src="{{ asset('assets/images/brand-images/'. $edited_item_value->image) }}" alt="" height="50" width="50"><br>
        <button type="submit">Update</button>
        <button><a href="{{ route('index') }}">cancel</a></button>
    </form>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    $('.dropify').dropify();
</script>

</body>
</html>
