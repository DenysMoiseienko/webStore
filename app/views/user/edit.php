<!--start-breadcrumbs-->
<div class="container-fluid p-0">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li><a href="<?= PATH ?>">Home /</a></li>
            <li><a href="<?= PATH ?>/user/myaccount">My account /</a></li>
            <li>Update my info</li>
        </ol>
    </nav>
</div>
<!--end-breadcrumbs-->

<div class="container">
    <div class="col-md-12">
        <div>
            <form action="user/edit" method="post" data-toggle="validator">
                <div class="box-body">
                    <div class="form-group has-feedback">
                        <label for="login">Login</label>
                        <input type="text" class="form-control" name="login" id="login" value="<?=h($_SESSION['user']['login']);?>" required>
                        <span class="glyphicon-form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                    </div>

                    <div class="form-group has-feedback">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?=h($_SESSION['user']['name']);?>" required>
                        <span class="glyphicon-form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?=h($_SESSION['user']['email']);?>" required>
                        <span class="glyphicon-form-control-feedback" aria-hidden="true"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" value="<?=h($_SESSION['user']['address']);?>" required>
                        <span class="glyphicon-form-control-feedback" aria-hidden="true"></span>
                    </div>

                </div>
                <div class="box-footer text-right">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

