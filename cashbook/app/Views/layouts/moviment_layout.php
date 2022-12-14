<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash Book</title>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap.min.css') ?>">
 

</head>
<body>
    <nav class="navbar" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?= site_url('dashboard') ?>/">Home</a>
        </li>
        <li class="nav-item"> 
          <a class="nav-link" href="<?= site_url('moviment') ?>">Moviment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('')?>">Reports</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="<?= site_url('')?>" >Users</a>
        </li>
      </ul>
    </div>
    <div class="text-end">
            <?= $userInfo['name'] ?>
            <?= $userInfo['type'] ?>
            <a href="<?= site_url('logout') ?>">Log out</a>
    </div>
  </div>
</nav>

    <?= $this->renderSection('table') ?>

    <hr>
    <footer class="container">
        <div class="row">
            <div class="col text-center">
                Cash book &copy; <?= date('Y') ?>
            </div>
        </div>
    </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>