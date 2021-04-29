<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Category';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
</div>
<div class="row tm-mb-90 tm-gallery" style="margin-top: 100px;">
<?php foreach($model as $video){?>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
        <figure class="effect-ming tm-video-item">
            <iframe width="100%"  src="<?=$video['url'];?>" title="<?=$post['name'];?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>            
            <figcaption class="d-flex align-items-center justify-content-center">
                <h2><?=$video['name'];?></h2>
                <a href="photo-detail.html">View more</a>
            </figcaption>                    
        </figure>
        <div class="d-flex justify-content-between tm-text-gray">
            <span class="tm-text-gray-light"><?=$video['author'];?></span>
        </div>
    </div>
    <?php
    }
    ?>   
</div> 
