<?php
include("include/session.php");
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Head metas, css, and title -->
        <?php require_once 'include/head.php'; ?>
    </head>
    <body>
        <!-- Header banner -->
        <?php require_once 'include/header.php'; ?>
        <div class="container-fluid">
            <div class="row">
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"> 
          <?php
            //Jei vartotojas prisijungęs
            if ($session->logged_in) {
                require_once 'include/sidebar.php';
                ?>
                <div style="text-align:center">
                    <br><br>
                    <h1>Dokumentų valdymo sistema.</h1>
					          <h1>Marius Žilgužis IFF-7/8</h1>
                </div><br>
                <?php
                //Jei vartotojas neprisijungęs, rodoma prisijungimo forma
                //Jei atsiranda klaidų, rodomi pranešimai.
              } else {
                  echo "<div align=\"center\">";
                  if ($form->num_errors > 0) {
                      echo "<font size=\"3\" color=\"#ff0000\">Klaidų: " . $form->num_errors . "</font>";
                  }
                  echo "<table class=\"center\"><tr><td>";
                  include("user/loginForm.php");
                  echo "</td></tr></table></div><br></td></tr>";
              }
            ?>
                </main>
            </div>
        </div>
        <!-- Footer scripts, and functions -->
        <?php require_once 'include/footer.php'; ?>
    </body>
</html>
