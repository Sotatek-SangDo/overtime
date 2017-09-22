<div id="wpbody" role="main">

    <div id="wpbody-content" aria-label="Main content" tabindex="0" class="transparent-background">
        <div class="wrap">
            <?php if(!isset($_SESSION['teacher_current']['id'])) : ?>
                <h1 class="wp-heading-inline"><i class="glyphicon glyphicon-plus"></i>Thêm mới</h1>
            <?php else : ?>
                <h1 class="wp-heading-inline"><i class="glyphicon glyphicon-edit"></i>Sửa thông tin</h1>
            <?php endif; ?>
        </div>
        <div class="container-add">
            <form class="add-form">
                <div class="add-item form-group">
                    <label class="title" for="name">Tên</label>
                    <input type="text" name="name" placeholer="Nhập tên giáo viên ..." class="form-control" value="<?php echo checkIssetKey($_SESSION['teacher_current'], 'name');?>">
                </div>
                <div class="add-item form-group">
                    <label class="title" for="age">Tuổi</label>
                    <input type="text" name="age" class="form-control" placeholer="Nhập tuổi ..." value="<?php echo checkIssetKey($_SESSION['teacher_current'], 'age');?>">
                </div>
                <div class="add-item form-group">
                    <label class="title" for="level">Trình độ</label>
                    <input type="text" name="level" class="form-control" placeholer="Nhập trình độ ..." value="<?php echo checkIssetKey($_SESSION['teacher_current'], 'level');?>">
                </div>
                <div class="add-item form-group">
                    <label class="title" for="info">Thông tin</label>
                    <textarea type="text" name="information" class="form-control" rows="5" style="resize:none" placeholer="Nhập thông tin chi tiết ...">
                        <?php echo checkIssetKey($_SESSION['teacher_current'], 'information');?>
                    </textarea>
                </div>
                <div class="add-item form-group">
                    <label class="title" for="info">Ảnh</label>
                    <?php echo image_uploader_field('image', checkIssetKey($_SESSION['teacher_current'], 'img_id'), checkIssetKey($_SESSION['teacher_current'], 'image')); ?>
                </div>
                <div class="add-item form-group">
                    <?php if( !isset($_SESSION['teacher_current']) ) : ?>
                        <button class="btn btn-primary" onclick="addNew()">Thêm mới</button>
                    <?php else : ?>
                        <button class="btn btn-primary" onclick="update(<?php echo $_SESSION['teacher_current']['id']; ?>)">Cập nhập</button>
                    <?php endif;?>
                </div>
            </form>
        </div>
    </div>
<input type="hidden" name="_redirect" value="<?php echo $_SESSION['admin_url_list'];?>">
<input type="hidden" name="redirect" value="<?php echo $_SESSION['admin_url_add'];?>">
</div>
