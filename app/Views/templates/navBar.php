<?php
helper('diaply_error_helper');
echo view('templates/BannerView');?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/adverts">Olx.com.pl</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-link active" aria-current="page" href="\adverts">Home</a>
                <a class="nav-link" href="/adverts">Search</a>

            </div>
            <!-- #TODO add some php that will switch between next dwo divs -->
            <div class="navbar-nav ms-auto mb-2 mb-lg-0">

            <?php
                helper('displayWebsiteElement');

            if(empty(getUsername())){
                    echo '<div class="nav-link" data-bs-toggle="modal" data-bs-target="#loginModal">Log In</div>';
                    echo '<div class="nav-link" data-bs-toggle="modal" data-bs-target="#registerModal">Sign Up</div>';
                    //echo '<a class="nav-link" href="/users/login">Log In</a>';
                    //echo '<a class="nav-link" href="/users/register">Sign Up</a>';
                }else{
                    //echo '<a class="nav-link" href="/adverts/add">Add</a>';
                    echo '<div class="nav-link" data-bs-toggle="modal" data-bs-target="#addAdvertModal">Add</div>';
                    echo '<span class="nav-link">Hello '.getUsername().'</span>';
                    echo '<a class="nav-link" href="/users/logout">Log Out</a>';
                }
            ?>
            </div>
        </div>
    </div>
</nav>
<!-- Button trigger modal -->
<?php
$session = \Config\Services::session();
$errors=$session->getFlashdata('errors');
$errorMessage=$session->getFlashdata('errorMessage');

//d($errors);
//d($errorMessage);
?>
<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php
                if(!empty($errorMessage))
                    displayError($errorMessage);
                echo view('forms/loginUserView');
            ?>
        </div>
    </div>
</div>
<div class="modal fade" id="registerModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php
                #TODO finish
                if(! empty($errors))
                    displayValidatorErrors($errors);
                echo view('forms/registerUserView');
                //d($errors);
            ?>
        </div>
    </div>
</div>

<div class="modal fade" id="addAdvertModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo view('forms/addAdvertView'); ?>
        </div>
    </div>
</div>
