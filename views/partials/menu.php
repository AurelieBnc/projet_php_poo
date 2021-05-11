<nav class="navbar navbar-expand-lg navbar-dark bg-dark main-navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= PUBLIC_PATH ?>"><i class="fa fa-lemon main-logo"> </i> Wikifruit</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= (ROUTE=='/') ? ' active' : ''; ?>" href="<?= PUBLIC_PATH ?>">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (ROUTE=='/creer-un-compte/') ? ' active' : ''; ?>" href="<?= PUBLIC_PATH.'creer-un-compte/' ?>">Inscription</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>