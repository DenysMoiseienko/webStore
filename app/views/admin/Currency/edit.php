<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    Edit currency: <?=$currency->title?>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?=ADMIN;?>">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?=ADMIN;?>/currency/">Currency list</a>
                    </li>
                    <li class="breadcrumb-item">
                        Edit currency: <?=$currency->title?>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="<?=ADMIN;?>/currency/edit" method="post" data-toggle="validator">
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="title">Currency title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Currency title"
                                       required value="<?=h($currency->title); ?>">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="code">Code</label>
                                <input type="text" name="code" class="form-control" id="code" placeholder="Code"
                                       required value="<?=h($currency->code); ?>">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group">
                                <label for="symbol_left">Symbol left</label>
                                <input type="text" name="symbol_left" class="form-control" id="symbol_left" placeholder="Symbol left"
                                       value="<?=h($currency->symbol_left); ?>">
                            </div>

                            <div class="form-group">
                                <label for="symbol_right">Symbol right</label>
                                <input type="text" name="symbol_right" class="form-control" id="symbol_right" placeholder="Symbol right"
                                       value="<?=h($currency->symbol_right); ?>">
                            </div>

                            <div class="form-group has-feedback">
                                <label for="value">Value</label>
                                <input type="text" name="value" class="form-control" id="value" placeholder="Value"
                                       required data-error="Digits and decimal point allowed" pattern="^[0-9.]{1,}$"
                                       value="<?=h($currency->value); ?>">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label>
                                    <input name="base" type="checkbox" <?php if ($currency->base) echo 'checked';?>>
                                    Base currency</label>
                            </div>

                            <div class="box-footer text-right">
                                <input type="hidden" name="id" value="<?=$currency->id?>">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>