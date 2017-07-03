<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $cargo = $view->item( 'cargo' ); ?>
<?php $view->component( 'aside' ); ?>
<div id="wrapper" class="wrapper show">
    <?php $view->component( 'navbar' ); ?>

    <?php echo form_open( 'cargos/salvar', [ 'class' => 'card container' ] )?>
        <?php $view->component( 'breadcrumb' ); ?>        
        <div class="page-header">
            <h2>Novo cargo</h2>
        </div>
        <?php if( $cargo ): ?>
        <input type="hidden" name="cod" value="<?php echo $cargo->gid; ?>">
        <?php endif; ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cargo">Cargo</label>
                    <input  type="text" 
                            class="form-control" 
                            id="cargo" 
                            name="cargo" 
                            required
                            value="<?php echo $cargo ? $cargo->grupo : ''; ?>"
                            placeholder="Contador">
                </div>
            </div>
        </div>
        <?php if( $view->item( 'errors' ) ): ?>
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-danger">
                    <b>Erro ao salvar</b>
                    <p><?php echo $view->item( 'errors' ); ?></p>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <hr>
        <button class="btn btn-primary">Salvar</button>
        <a href="<?php echo site_url( 'cargos' ); ?>" class="btn btn-danger">Cancelar</a>
    <?php echo form_close(); ?> 
</div>