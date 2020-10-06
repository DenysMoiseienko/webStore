<!-- content header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    New filter
                </h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?=ADMIN;?>">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?=ADMIN;?>/filter/attribute">Filter attributes</a>
                    </li>
                    <li class="breadcrumb-item">
                        New filter
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
                    <form action="<?=ADMIN;?>/filter/attribute-add" method="post" data-toggle="validator" id="add">

                        <div class="box-body">

                            <div class="form-group has-feedback">
                                <label for="value">Title</label>
                                <input type="text" name="value" class="form-control" id="value" placeholder="Title" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Group</label>
                                <select name="attr_group_id" id="category_id" class="form-control">
                                    <option>Choose group</option>
                                    <?php foreach ($groups as $item): ?>
                                        <option value="<?=$item->id;?>"><?=$item->title;?></option>
                                    <?php endforeach; ?>
                                </select>
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
