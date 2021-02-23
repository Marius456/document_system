<?php
// Show PHP errors
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

 require_once("../classes/user.php");

$objUser = new User();

// GET
if(isset($_GET['delete_id'])){
  $id = $_GET['delete_id'];
  try{
    if($id != null){
      if($objUser->delete($id)){
        $objUser->redirect('list.php?deleted');
      }
    }else{
      var_dump($id);
    }
  }catch(PDOException $e){
    echo $e->getMessage();
  }
}

?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Head metas, css, and title -->
        <?php require_once '../include/head.php'; ?>
    </head>
    <body>
        <!-- Header banner -->
        <?php require_once '../include/header.php'; ?>
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar menu -->
                <?php require_once '../include/sidebar.php'; ?>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <h1 style="margin-top: 10px">Users</h1>
                    <a class="nav-link" href="form.php">
                    <span data-feather="plus-circle"></span>
                    Add New
                    </a>
                    <?php
                      if(isset($_GET['updated'])){
                        echo '<div class="alert alert-info alert-dismissable fade show" role="alert">
                        <strong>User!<trong> Updated with success.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"> &times; </span>
                          </button>
                        </div>';
                      }else if(isset($_GET['deleted'])){
                        echo '<div class="alert alert-info alert-dismissable fade show" role="alert">
                        <strong>User!<trong> Deleted with success.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"> &times; </span>
                          </button>
                        </div>';
                      }else if(isset($_GET['inserted'])){
                        echo '<div class="alert alert-info alert-dismissable fade show" role="alert">
                        <strong>User!<trong> Inserted with success.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"> &times; </span>
                          </button>
                        </div>';
                      }else if(isset($_GET['error'])){
                        echo '<div class="alert alert-info alert-dismissable fade show" role="alert">
                        <strong>DB Error!<trong> Something went wrong with your action. Try again!
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"> &times; </span>
                          </button>
                        </div>';
                      }
                    ?>
                      <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th></th>
                              </tr>
                            </thead>
                            <?php
                              $query = "SELECT * FROM users";
                              $stmt = $objUser->runQuery($query);
                              $stmt->execute();
                            ?>
                            <tbody>
                                <?php if($stmt->rowCount() > 0){
                                  while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
                                 ?>
                                 <tr>
                                    <td><?php print($rowUser['id']); ?></td>

                                    <td><?php print($rowUser['name']); ?></td>

                                    <td><?php print($rowUser['email']); ?></td>
                                    <td><?php print($rowUser['password']); ?></td>

                                    <td>
                                      <a href="form.php?edit_id=<?php print($rowUser['id']); ?>">
                                      <span data-feather="edit-3"></span>
                                      </a>
                                    </td>
                                    <td>
                                      <a class="confirmation" href="list.php?delete_id=<?php print($rowUser['id']); ?>">
                                      <span data-feather="trash"></span>
                                      </a>
                                    </td>
                                 </tr>


                          <?php } } ?>
                            </tbody>
                        </table>

                      </div>


                </main>
            </div>
        </div>
        <!-- Footer scripts, and functions -->
        <?php require_once '../include/footer.php'; ?>

        <!-- Custom scripts -->
        <script>
            // JQuery confirmation
            $('.confirmation').on('click', function () {
                return confirm('Are you sure you want do delete this user?');
            });
        </script>
    </body>
</html>
