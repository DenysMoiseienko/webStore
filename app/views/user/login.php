<!--start-breadcrumbs-->
<div class="container-fluid p-0">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= PATH ?>">Home</a></li>
            <li class="breadcrumb-item">Login</li>
        </ol>
    </nav>
</div>
<!--end-breadcrumbs-->

<!--prdt-starts-->
<div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-12">
                <div class="product-one signup">
                    <div class="register-top heading">
                        <h2>Log in</h2>
                    </div>

                    <div class="register-main">
                        <div class="col-md-6 account-left">
                            <form method="post" action="user/login" id="signup" role="form" data-toggle="validator">

                                <div class="form-group has-feedback">
                                    <label for="login">LogIn</label>
                                    <input type="text" name="login" class="form-control" id="login" placeholder="Login" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>

                                <div class="form-group has-feedback">
                                    <label for="pasword">Password</label>
                                    <input type="password"  name="password" class="form-control" id="pasword" placeholder="Password" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <button type="submit" class="btn btn-success">Log in</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product-end-->
