<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Olx.com.pl</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                <a class="nav-link" href="/adverts">Search</a>

            </div>
            <!-- #TODO add some php that will switch between next dwo divs -->
            <div class="navbar-nav ms-auto mb-2 mb-lg-0">
            <?php
                helper('displayWebsiteElement');
                if(empty(getUsername())){
                    echo '<a class="nav-link" href="/users/login">Log In</a>';
                    echo '<a class="nav-link" href="/users/register">Sign Up</a>';
                }else{
                    echo '<a class="nav-link" href="/adverts/add">Add</a>';
                    echo '<span class="nav-link">Hello '.getUsername().'</span>';
                    echo '<a class="nav-link" href="/users/logout">Log Out</a>';
                }
            ?>
            </div>
        </div>
    </div>
</nav>