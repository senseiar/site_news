<?php
use yii\helpers\Url;
//use yii\widgets\LinkPager;
    ?>
<!--main content start-->

<div class="main-content">
    <div class="container">
        <div class="row">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
              <?php
              $i = 0; 
              foreach ($recent as $article): ?>
                    <?php if ($i == 0)
                    { ?>
                    <div class="item active">
                        <img src="<?= $article->getImage();?>" />
                        <div class="carousel-caption d-none d-md-block">
                        <h3><a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]) ?>" ><?= $article->title;?></a></h3>
                        <p><?= $article->description ;?></p>
                        </div>
                    </div>
                    <?php } else { ?>

                    <div class="item">
                        <img src="<?= $article->getImage();?>" />
                        <div class="carousel-caption d-none d-md-block">
                        <h3><a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]) ?>" ><?= $article->title;?></a></h3>
                        <p><?= $article->description;?></p>
                        </div>
                    </div>
                <?php } ?>
                <?php $i++; ?>
                <?php endforeach; ?>
            </div>
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="col-md-8">


                <?php foreach ($categories as $category): ?>
                <h2><a href="<?= Url::toRoute(['site/category', 'id'=>$category->id]) ?>""><?= $category->title; ?></a></h2>
                <?php foreach ($news[$category->id] as $article):?>
                       <article class="post">
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6><a href="<?= Url::toRoute(['site/category', 'id'=>$article->category->id]) ?>"><?= $article->category->title; ?></a></h6> 
                            <h1 class="entry-title"><a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]) ?>"><?= $article->title; ?></a></h1>
                        </header>
                        <div class="entry-content">
                            <div class="btn-continue-reading text-center text-uppercase">
                                <a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]) ?>" class="more-link">Continue Reading</a>
                            </div>
                        </div>
                        <div class="social-share">
                            <span class="social-share-title pull-left text-capitalize">By <a href="#">Rubel</a> <?= $article->getDate(); ?></span>
                            <ul class="text-center pull-right">
                                <li><a class="s-facebook" href="#"><i class="fa fa-eye"></i></a></li><?= (int) $article->viewed ?>
                            </ul>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            <?php endforeach; ?>
            </div>
            <div class="col-md-4" data-sticky_column>
                <div class="primary-sidebar">

                    <aside class="widget">
                        <h3 class="widget-title text-uppercase text-center">Popular Posts</h3>

                        <div class="popular-post">
                            <a href="#" class="popular-img"><img src="/public/images/p1.jpg" alt="">
                                <div class="p-overlay"></div>
                            </a>

                            <div class="p-content">
                                <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                <span class="p-date">February 15, 2016</span>
                            </div>
                        </div>
                        </div>
                    </aside>
                    <aside class="widget pos-padding">
                        <h3 class="widget-title text-uppercase text-center">Recent Posts</h3>

                        <div class="thumb-latest-posts">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#" class="popular-img"><img src="/public/images/r-p.jpg" alt="">
                                        <div class="p-overlay"></div>
                                    </a>
                                </div>
                                <div class="p-content">
                                    <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                    <span class="p-date">February 15, 2016</span>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <aside class="widget border pos-padding">
                        <h3 class="widget-title text-uppercase text-center">Categories</h3>
                        <ul>
                          <?php foreach($categories as $category): ?>
                            <li>
                                <a href="#"><?= $category->title ?></a>
                                <span class="post-count pull-right"> (<?= $category->getArticlesCount(); ?>)</span>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main content-->