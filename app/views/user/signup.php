<!--start-breadcrumbs-->
<div class="container-fluid p-0">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= PATH ?>">Home</a></li>
            <li class="breadcrumb-item">Register</li>
        </ol>
    </nav>
</div>
<!--end-breadcrumbs-->

<!--prdt-starts-->
<div class="prdt my-3">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-12">
                <div class="product-one signup">
                    <div class="register-top heading">
                        <h2>Register</h2>
                    </div>

                    <div class="register-main">
                        <div class="col-md-6 account-left p-0">
                            <form method="post" action="user/signup" id="signup" role="form" data-toggle="validator">
                                <div class="form-group has-feedback">
                                    <label for="login">Login</label>
                                    <input type="text" name="login" class="form-control" id="login" placeholder="Login"
                                           value="<?=isset($_SESSION['form_data']['login']) ? h($_SESSION['form_data']['login']) : ''?>" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>

                                <div class="form-group has-feedback">
                                    <label for="pasword">Password</label>
                                    <input type="password" data-minlength="6" name="password" class="form-control" id="pasword" placeholder="Password"
                                           value="<?=isset($_SESSION['form_data']['password']) ? h($_SESSION['form_data']['password']) : ''?>"
                                        data-error="Minimum of 6 characters" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group has-feedback">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name"
                                           value="<?=isset($_SESSION['form_data']['name']) ? h($_SESSION['form_data']['name']) : ''?>" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>

                                <div class="form-group has-feedback">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                                           value="<?=isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']) : ''?>" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group has-feedback">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Address"
                                           value="<?=isset($_SESSION['form_data']['address']) ? h($_SESSION['form_data']['address']) : ''?>" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>

                                <button type="submit" class="btn custom-btn-secondary">Sign in</button>
                            </form>
                            <?php if (isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product-end-->