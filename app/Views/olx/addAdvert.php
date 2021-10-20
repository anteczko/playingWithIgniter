<h1>Welcome to advert adding page!</h1>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <?php
        echo view('templates/loginHeader');
    ?>
    <div class="wrapper">
        <form action="/olx/adverts/add" method="post">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
            </div>    
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control"> </textarea>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" name="price" step="0.01" min="0.01">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
        </form>
    </div>    
</body>
</html>