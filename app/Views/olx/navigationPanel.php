<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="">Olx.pl</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url("/olx") ?>">Strona główna <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url("/olx/adverts") ?>">Ogłoszenia</a>
            </li>

        </ul>
        <ul class="navbar-nav ml-auto">
                <?php
                if(! empty($nick)){
                    echo "Hello ".$nick;
                }
                ?>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url("/olx/users/login") ?>">Zaloguj się</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url("/olx/users/register") ?>">Zarejestruj się</a>
            </li>
        </ul>


        </div>
    </div>

</nav>