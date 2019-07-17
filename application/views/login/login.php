
<style type="text/css">

body {
    background-image: url("assets/template/img/login.jpg");
    background-size: cover;
}

.panel {
    margin-top : 150px;
}
</style>



<div class="navbar-default  navbar-inverse bg-aqua">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="" class="navbar-brand"></a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading"><b>Silahakan Login</b></div>
                <div class="panel-body">
                    <?php if($this->session->flashdata('flash')) : ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Username / Password <?= $this->session->flashdata('flash'); ?></strong>
                    </div>
                    <?php endif; ?>

                    <?= validation_errors(); ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="password">
                        </div>
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>