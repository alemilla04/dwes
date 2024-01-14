<header>
    <h1 class="h1-alta">Alta y Login de usuarios</h1>
</header>

<nav>
  <ul>
    <li class="izquierda"><a class="menu" href="home.php">Home</a></li>
    <li class="izquierda"><a class="menu" href="alta.php">Alta</a></li>
    <?php

    if (isset($_SESSION['usuarioObjeto'])) {

      $email_usuario = $_SESSION["usuarioObjeto"]->email;

      echo "<li class='derecha'><a class='menu' href='logout.php'>Logout</a></li>";
      echo "<li class='derecha'><a class='menu' href='perfil.php'>Perfil</a></li>";
      echo " <li class='derecha'><a class='menu2'>Hola, {$email_usuario}</a></li>";
    } else {
      echo "<li class='derecha'><a class='menu' href='login.php'>Login</a></li>";
    }
    ?>
  </ul>
  <br>
</nav>