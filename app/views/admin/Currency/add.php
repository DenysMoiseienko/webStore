<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    New currency
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
                        New currency
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
                    <form action="<?=ADMIN;?>/currency/add" method="post" data-toggle="validator">
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="title">Currency title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Currency title" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="code">Code</label>
                                <input type="text" name="code" class="form-control" id="code" placeholder="Code" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group">
                                <label for="symbol_left">Symbol left</label>
                                <input type="text" name="symbol_left" class="form-control" id="symbol_left" placeholder="Symbol left">
                            </div>

                            <div class="form-group">
                                <label for="symbol_right">Symbol right</label>
                                <input type="text" name="symbol_right" class="form-control" id="symbol_right" placeholder="Symbol right">
                            </div>

                            <div class="form-group has-feedback">
                                <label for="value">Value</label>
                                <input type="text" name="value" class="form-control" id="value" placeholder="Value"
                                       required data-error="Digits and decimal point allowed" pattern="^[0-9.]{1,}$">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label for="base"><input type="checkbox" name="base"> Base currency</label>
                            </div>

                            <div class="box-footer text-right">
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>