<!doctype html>
<html lang="en">
    <head>
        <?php require_once "includes/head.php"; ?>
    </head>
    <body>
        <?php require_once "includes/header.php"; ?>
        <div class="container-fluid">
            <div class="row">
                <?php require_once "includes/sidebar.php" ?>
                <main rol="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <h1 style="margin-top: 10px"> Add / Edit Users</h1>
                    <p>Required fields are in (*)</p>
                    <form method="post">
                        <div class="form-group">
                            <label for="id">ID</label>
                            <input class="form-control" type="text" name="id" id="id" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input class="form-control" type="text" name="name" id="name" placeholder="Your name" value="" required maxlenght="100">
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input class="form-control" type="text" name="email" id="email" placeholder="Your email" value="" required maxlenght="100">
                        </div>
                        <div class="form-group">
                            <label for="password">Password *</label>
                            <input class="form-control" type="text" name="password" id="password" placeholder="Your password" value="" required maxlenght="100">
                        </div>
                        <input class="btn btn-primary mb-2" type="button" name="btn_save" value="Save">
                     </form>   
                </main>
            </div>
        </div>

        <?php require_once "includes/footer.php"; ?>
    </body>
</html>