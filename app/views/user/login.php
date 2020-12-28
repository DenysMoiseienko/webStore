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
<div class="container py-3">
    <div class="col-12">
        <div class="account-top heading">
            <h2>Log in</h2>
            <p>If you have previously made an order or have a customer account, you may login here. </p>
        </div>

        <div class="account-main">
            <form method="post" action="user/login" id="signup" role="form" data-toggle="validator">
                <div class="row">
                    <div class="col form-group has-feedback">
                        <label for="login">Login</label>
                        <input type="text" name="login" class="form-control" id="login" placeholder="Login" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="col form-group has-feedback">
                        <label for="pasword">Password</label>
                        <input type="password"  name="password" class="form-control" id="pasword" placeholder="Password" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn custom-btn-secondary">Log in</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--product-end-->
