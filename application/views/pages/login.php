<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1>Login</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <?php echo form_open( 'welcome/logar', [ 'class' => 'col-md-4' ] )?>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <a href="<?php echo site_url( 'welcome/signup' ); ?>">cadastrar</a>
            <div class="checkbox">
                <label>
                <input type="checkbox"> Manter conectado
                </label>
            </div>
            <button type="submit" class="btn btn-default">Logar</button>
        <?php echo form_close(); ?>
    </div>
</div>