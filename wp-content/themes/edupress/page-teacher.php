<?php
/*
Template Name: Teacher Page
* Created by: sang.do
* Date: 22/9/2017
*/
?>

<?php get_header(); ?>

<?php
    $teachers = get_list_teacher();
?>
<div id="site-main" class="content-home">
    <div class="wrapper wrapper-main clearfix">
        <div class="wrapper-frame clearfix">
            <?php get_sidebar(); ?>
            <main id="site-content" class="site-main" role="main">
                <div class="page-teacher">
                    <div class="row">
                        <div class="col-md-12" style="max-width: 42rem;">
                            <?php if(count($teachers)) : ?>
                                <?php foreach ($teachers as $key => $teacher) : ?>
                                    <div class="media mb-1">
                                        <a class="media-left waves-light">
                                            <img class="rounded-circle" src="https://mdbootstrap.com/img/Photos/Avatars/avatar-13.jpg" alt="Generic placeholder image">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><?php echo $teacher['name']; ?></h4>
                                            <ul class="rating inline-ul">
                                                <li><i class="fa fa-star amber-text"></i></li>
                                                <li><i class="fa fa-star amber-text"></i></li>
                                                <li><i class="fa fa-star amber-text"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi cupiditate temporibus iure soluta. Quasi mollitia maxime nemo quam accusamus possimus, voluptatum expedita assumenda. Earum sit id ullam eum vel delectus!</p>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            <?php else : ?>
                                <p style="color: red; font-size: 18px;">No teachers</p>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<?php get_footer(); ?>
