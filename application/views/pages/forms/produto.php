<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $produto = $view->item( 'produto' ); ?>
<?php $view->component( 'aside' ); ?>
<div id="wrapper" class="wrapper show">
    <?php $view->component( 'navbar' ); ?>

    <?php echo form_open( 'produtos/salvar', [ 'class' => 'card container fade-in' ] )?>
        <?php $view->component( 'breadcrumb' ); ?>        
        <div class="page-header">
            <h2>Novo produto</h2>
        </div>
        <?php if( $produto ): ?>
        <input type="hidden" name="cod" value="<?php echo $produto->CodProduto; ?>">
        <?php endif; ?>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input  type="text" 
                            class="form-control" 
                            id="nome" 
                            name="nome" 
                            required
                            value="<?php echo $produto ? $produto->nome : ''; ?>"
                            placeholder="Nome do produto">
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
        <a href="<?php echo site_url( 'produtos' ); ?>" class="btn btn-danger">Cancelar</a>
    <?php echo form_close(); ?>

    <?php $view->component( 'footer' ); ?>
</div>