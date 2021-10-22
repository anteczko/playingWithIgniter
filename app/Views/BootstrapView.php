<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Include Twitter Bootstrap and jQuery: -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- Include the plugin's CSS and JS: -->
    <script type="text/javascript" src="<?= base_url("assets/js/bootstrap-multiselect.js"); ?>"></script>
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap-multiselect.css"); ?>" type="text/css"/>
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example-getting-started').multiselect();
        });
        $('.dropdown-menu').find('form').click(function (e) {
            e.stopPropagation();
    });
    </script>
</head>