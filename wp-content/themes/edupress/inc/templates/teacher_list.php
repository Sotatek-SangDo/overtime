<div id="wpbody" role="main">
<?php $class = ['active', 'warning', 'info', 'danger', 'success']; ?>
    <div id="wpbody-content" aria-label="Main content" tabindex="0">
        <div class="wrap">
            <h1 class="wp-heading-inline list-title">Giáo Viên</h1>
            <a href="<?php echo admin_url('/admin.php?page=teacher/add'); ?>" class="page-title-action action-page">Add New</a>
        </div>
        <div class="content-list table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <td>Tên</td>
                        <td>Trình độ</td>
                        <td>Thông tin</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($_SESSION['list_teacher'])) : ?>
                        <?php foreach ($_SESSION['list_teacher'] as $value):
                            $rand = rand(0, 4); ?>
                            <?php $teacher =  get_object_vars($value);?>
                            <tr class="<?php echo $class[$rand]; ?>">
                                <td><?php echo $teacher['name']; ?></td>
                                <td><?php echo $teacher['level']; ?></td>
                                <td><?php echo $teacher['information']; ?></td>
                                <td>
                                    <button class="btn btn-info" onclick="show(<?php echo $teacher['id']; ?>)"><i class="glyphicon glyphicon-edit"></i>Sửa</button>
                                </td>
                                <td>
                                    <button class="btn btn-danger" onclick="destroy(<?php echo $teacher['id']; ?>)"><i class="glyphicon glyphicon-trash"></i> Xóa</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif;?>
                </tbody>
            </table>
        </div>
    </div>
    <input type="hidden" name="_redirect" value="<?php echo $_SESSION['admin_url_list'];?>">

</div>
