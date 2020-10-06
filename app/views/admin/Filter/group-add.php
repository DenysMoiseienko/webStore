<!-- content header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    New filter group
                </h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?=ADMIN;?>">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?=ADMIN;?>/filter/attribute-group">Filter group</a>
                    </li>
                    <li class="breadcrumb-item">
                        New filter group
                    </li>
                </ol>
            </div>

        </div>
    </div>
</div>

<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="<?=ADMIN;?>/filter/group-add" method="post" data-toggle="validator">

                        <div class="box-body">

                            <div class="form-group has-feedback">
                                <label for="title">Group title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Group title" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                        <div class="box-footer text-right">
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

