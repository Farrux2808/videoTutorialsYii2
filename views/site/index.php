<?php
use app\models\Post;
use app\modules\admin\models\Category;
use yii\helpers\Url;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';

$posts = Post::find()->all();
$categories = Category::find()->all();
$i = 0;
$j = 1;
?>

<div data-parallax="scroll" data-image-src="img/edu3.jpg">
    <div class="tm-hero d-flex justify-content-center align-items-center">
    <form class="d-flex tm-search-form">
        <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success tm-search-btn" type="submit">
            <i class="fas fa-search"></i>
        </button>
    </form>
    </div>
    <section class="ted">
        <div class="ted-recomends">
            <div class="bg">
                <div class="container text-center">
                <h2>Biz bilan marralarni zabt eting!</h2>
                <h4>Sizga xizmat qilish - biz uchun sharaf!</h4>
                <span class="line"></span>
                <p>Sizni nima qiziqtiradi?</p>
                <div class="interests">
                    <ul>
                    <?php
                        foreach($categories as $cat) {
                    ?>
                    <li><a href="<?=\yii\helpers\Url::to(['category', 'id'=>$cat['id']])?>"><?=$cat['name'];?></a></li>
                    <?php
                        }
                    ?>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="row tm-mb-90 tm-gallery">
    <?php
        foreach($categories as $cat) {
            $j = 1;
    ?>
    <div class="container text-center my-3">
        <h3 class="tm-text-primary"><?=$cat['name'];?></h3>
        <div id="recipeCarousel<?=$i?>" class="carousel slide w-100" data-ride="carousel">
            <div class="carousel-inner w-100" role="listbox">
                <div class="carousel-item row no-gutters active">
                <?php
                    foreach($posts as $post) {
                        if ($cat['id'] == $post['category']) {
                ?>
                    <div class="col-3 float-left tm-text-gray">
                        <iframe width="100%"  src="<?=$post['url'];?>" title="<?=$post['name'];?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <span><?=$post['author'];?></span>
                    </div>
                <?php
                    if ($j == 4){
                        echo '</div><div class="carousel-item row no-gutters">';
                        $j = 0;
                    }
                    $j++;
                }
                }
                ?>
                </div>
            </div>
            <a class="carousel-control-prev" href="#recipeCarousel<?=$i?>" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#recipeCarousel<?=$i?>" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <?php
        $i++;}
    ?>        
</div>