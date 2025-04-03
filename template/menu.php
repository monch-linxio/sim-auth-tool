<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">SIM Tool</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/messenger">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i> Messenger
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/diagnostics">
                        <i class="fa fa-heartbeat" aria-hidden="true"></i> Diagnostics
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/search">
                        <i class="fa fa-search" aria-hidden="true"></i> Search
                    </a>
                </li>
            </ul>
            <span class="navbar-text">
                <?php echo 'Logged in as '.$_SESSION['loggedUser']['name'];?>
                &nbsp;<a href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
            </span>
        </div>
    </div>
</nav>