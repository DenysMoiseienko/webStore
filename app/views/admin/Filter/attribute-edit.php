<!-- content header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    Edit filter: <?=h($attr->value);?>
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
                        Edit filter: <?=h($attr->value);?>
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
                    <form action="<?=ADMIN;?>/filter/attribute-edit" method="post" data-toggle="validator">

                        <div class="box-body">

                            <div class="form-group has-feedback">
                                <label for="value">Title</label>
                                <input type="text" name="value" value="<?=h($attr->value);?>" class="form-control" id="value" placeholder="Title" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Group</label>
                                <select name="attr_group_id" id="category_id" class="form-control">
                                    <?php foreach ($groups as $item): ?>
                                        <option value="<?=$item->id;?>" <?php if ($item->id == $attr->attr_group_id) echo 'selected'; ?>>
                                            <?=$item->title;?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="box-footer text-right">
                                <input type="hidden" name="id" value="<?=$attr->id;?>">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

