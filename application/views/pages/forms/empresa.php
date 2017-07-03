<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $empresa = $view->item( 'empresa' ); ?>
<?php $view->component( 'aside' ); ?>
<div id="wrapper" class="wrapper show">
    <?php $view->component( 'navbar' ); ?>

    <?php echo form_open( 'empresas/salvar', [ 'class' => 'card container' ] )?>
        <?php $view->component( 'breadcrumb' ); ?>        
        <div class="page-header">
            <h2>Nova empresa</h2>
        </div>
        <?php if( $empresa ): ?>
        <input type="hidden" name="cod" value="<?php echo $empresa->CodEmpresa; ?>">
        <?php endif; ?><!-- id -->
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input  type="text" 
                            class="form-control" 
                            id="nome" 
                            name="nome" 
                            required
                            value="<?php echo $empresa ? $empresa->nome : ''; ?>"
                            placeholder="Contador">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="razao">Razão</label>
                    <input  type="text" 
                            class="form-control" 
                            id="razao" 
                            name="razao" 
                            required
                            value="<?php echo $empresa ? $empresa->razao : ''; ?>"
                            placeholder="Contador">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="cnpj">CNPJ</label>
                    <input  type="text" 
                            class="form-control" 
                            id="cnpj" 
                            name="cnpj" 
                            required
                            value="<?php echo $empresa ? $empresa->cnpj : ''; ?>"
                            placeholder="Contador">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cargo">Estado</label>
                    <input  type="text" 
                            class="form-control" 
                            id="cargo" 
                            name="cargo" 
                            required
                            value="<?php echo $cargo ? $cargo->grupo : ''; ?>"
                            placeholder="Contador">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cargo">Cidade</label>
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

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="cargo">Endereço</label>
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