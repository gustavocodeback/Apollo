<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $finder = $view->item( 'finder' ); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo $view->getTitle(); ?></h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Library</a></li>
                <li class="active">Data</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <?php if ( $view->getHeader( 'grid' ) ): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <?php foreach( $view->getHeader( 'grid' ) as $row ): ?>
                        <?php echo $finder->order_link( $row ); ?>
                        <?php endforeach;?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach( $view->item( 'grid' ) as $row ): ?>
                        <tr>
                            <?php foreach( $row as $key => $item ): ?>
                            <td><?php echo $finder->apply( $key, $row ); ?></td>
                            <?php endforeach; ?>
                        </tr>                    
                    <?php endforeach; ?>
                </tbody>
                <tfooter>
                    <tr>
                        <th class="row" colspan="<?php echo count( $view->getHeader( 'grid' ) ); ?>">
                            <div class="center-block" style="width: 200px">
                                <?php $finder->create_links(); ?>                                                            
                            </div>
                        </th>
                    </tr>
                </tfooter>
            </table>
            <?php else: ?>
            <p>Nenhum resultado encontrado</p>
            <?php endif; ?>
        </div>
        <div class="col-md-3">
            <?php $view->component( 'filters' ); ?>
        </div>
    </div>
</div>
<style>

@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {
    <?php $cont = 1; ?>
    <?php foreach( $view->getHeader( 'grid' ) as $row ): ?>
    td:nth-of-type(<?php echo $cont; ?>):before { content: "<?php echo $finder->getLabel( $row ); ?>"; }
    <?php $cont++;?>    
    <?php endforeach;?>
}
</style>