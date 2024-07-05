<!DOCTYPE html>

<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"integrity="sha284-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1IAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crosorigin="anonymous">

        <title>Register</title>
    </head>
    <body>

        <div class="container">
            <div class="row justify-content-md-center">

                <div class="col-6">
                    <h1>Sign Up</h1>
                    <?php if(isset($validation)):?> 
                        <?php if(isset($validation)):?>
                            <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                        <?php endif;?>
                        <form action="/register/save" method="post">
                            <div class="mb-3">
                                <label for="InputForName" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="InputForName" value="<?= set_value('nama') ?>">
                            </div>
                            <div class="mb-3">
                                <label for="InputForEmail" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="InputForEmail" value="<?= set_value('email') ?>">
                            </div>
                            <div class="mb-3">
                                <label for="InputForPassword" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="InputForPassword">
                            </div>
                            <div class="mb-3">
                                <label for="InputForConfPassword" class="form-label">Confirm Password</label> 
                                input type="password" name="password" class="form-control" id="InputForConfPassword">
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>

            </div>
        </div>
 
        <!-- Popper.js first, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlv19I0Yy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvT19Y9/TRlw5x1KIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>