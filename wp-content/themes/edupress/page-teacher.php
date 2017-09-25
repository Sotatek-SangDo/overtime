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
                    <h3 class="title-page">Giáo Viên</h3>
                    <div class="row">
                        <?php if(count($teachers)) : ?>
                            <?php foreach ($teachers as $key => $teacher) : ?>
                                <div class="col-md-4 col">
                                    <div class="card">
                                        <div class="view overlay hm-white-slight">
                                             <a class="media-left waves-light">
                                                <img class="rounded-circle" src="<?php echo $teacher['image'];?>" alt="Generic placeholder image">
                                            </a>
                                        </div>
                                       <h4 class="media-heading"><?php echo $teacher['name']; ?></h4>
                                        <ul class="rating inline-ul">
                                            <li><i class="fa fa-star amber-text"></i></li>
                                            <li><i class="fa fa-star amber-text"></i></li>
                                            <li><i class="fa fa-star amber-text"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                        <div class="info">
                                            <span for="age"><b><?php echo $teacher['age']?></b> tuổi</span> &&
                                            <span for="level"> Trình độ: <b><?php echo $teacher['level']?></b></span>
                                        </div>
                                        <p class="detail">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi cupiditate temporibus iure soluta. Quasi mollitia maxime nemo quam accusamus possimus, voluptatum expedita assumenda. Earum sit id ullam eum vel delectus!</p>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        <?php else : ?>
                            <p style="color: red; font-size: 18px;">No teachers</p>
                        <?php endif;?>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<?php get_footer(); ?>
