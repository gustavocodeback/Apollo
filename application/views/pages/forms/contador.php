<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $contador = $view->item( 'contador' ); ?>
<?php $view->component( 'aside' ); ?>
<div id="wrapper" class="wrapper show">
    <?php $view->component( 'navbar' ); ?>

    <?php echo form_open( 'contadores/salvar', [ 'class' => 'card container' ] )?>
        <?php $view->component( 'breadcrumb' ); ?>        
        <div class="page-header">
            <h2>Novo contador</h2>
        </div>
        <?php if( $contador ): ?>
        <input type="hidden" name="cod" value="<?php echo $contador->CodContador; ?>">
        <?php endif; ?><!-- id -->

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="rotina">Cargo</label>
                    <select name="grupo" class="form-control">
                        <option value="">-- Selecione --</option>
                        <?php foreach( $view->item( 'grupos' ) as $item ): ?>
                        <option value="<?php echo $item->gid?>" 
                                <?php echo $contador && $contador->gid == $item->gid ? 'selected="selected"' : ''; ?>>
                        <?php echo $item->grupo; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div><!-- input para o grupo -->

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input  type="text" 
                            class="form-control" 
                            id="nome" 
                            name="nome" 
                            required
                            value="<?php echo $contador ? $contador->nome : ''; ?>"
                            placeholder="Carlos Contador">
                </div>
            </div>
        </div><!-- input do nome -->

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input  type="email" 
                            class="form-control" 
                            id="email" 
                            name="email" 
                            required
                            value="<?php echo $contador ? $contador->email : ''; ?>"
                            placeholder="contador@email.com">
                </div>
            </div>
        </div><!-- input do email -->

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input  type="password" 
                            class="form-control" 
                            id="senha" 
                            name="senha" 
                            required
                            placeholder="******">
                </div>
            </div>
        </div><!-- input da senha -->

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="rotina">Status</label>
                    <select name="status" class="form-control">
                        <option value="A" <?php echo $contador && $contador->status == 'A' ? 'selected="selected"' : '';?>>Ativo</option>
                        <option value="B" <?php echo $contador && $contador->status == 'A' ? 'selected="selected"' : '';?>>Bloqueado</option>
                    </select>
                </div>
            </div>
        </div><!-- input do status -->

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
        <a href="<?php echo site_url( 'contadores' ); ?>" class="btn btn-danger">Cancelar</a>
    <?php echo form_close(); ?> 
</div>