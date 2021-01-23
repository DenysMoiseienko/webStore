<div class="container-fluid p-0">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= PATH ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= PATH ?>/user/myaccount">My account</a></li>
            <li class="breadcrumb-item">Contact</li>
        </ol>
    </nav>
</div>

<div class="container my-3">
    <div class="col-md-6">
        <div>
            <form action="user/contact" method="post" data-toggle="validator">
                <div class="box-body">
                    <div class="form-group has-feedback">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea rows="10" cols="56" name="message" required></textarea>
                    </div>
                </div>

                <div class="box-footer text-right">
                    <button type="submit" class="btn custom-btn-secondary">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>