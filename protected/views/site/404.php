

<?php
$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
    'Error',
);
?>


<h2>Error <?php echo $code; ?></h2>

<div class="error">
    <?php echo CHtml::encode($message); ?>
</div>

<section id="main" class="clearfix text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
               <div class="found-section section">
                    <h1>404</h1>
                    <h2>Page Not Found</h2>
                    <p>The page you are looking for is not available at bdbroadbanddeals.com</p>
                    <a href="<?php echo Yii::app()->request->getBaseUrl(true) ?>" class="btn btn-primary">Go to Home</a>
               </div>
            </div>
        </div>
    </div>
</section>
</div>

