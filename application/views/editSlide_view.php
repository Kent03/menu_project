<!DOCTYPE html>
<html lang="en">

<head>
    <title>Thêm mới dữ liệu</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="<?php echo base_url() ?>template/backend/vendor/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>template/backend/1.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>template/backend/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>template/backend/vendor/fonts/css/all.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>template/backend/1.css">

</head>
<style>
 .container {
    background: linear-gradient(
45deg
, #ae9090, #f9b094ed, #2a2b22a1);
    border-radius: 4%;
    padding: 30px 270px;
}
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class=" text-center">SỬA SLIDE</h3>
                <?php $dem=0;  ?>
                <hr>
                <!-- form có method là post action là slides/suaSlides -->

                <form method="POST" action="Slides/suaSlide"enctype="multipart/form-data">
           <?php foreach ($mangdl as $key => $value): ?>
              <?php $dem++;  ?>
              <h2>Slide số: <?= $dem;?></h2>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Tiêu đề slide</label>
                        <input type="text" class="form-control" name="title[]" value="<?= $value ['title'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Mô tả slide</label>
                        <input type="text" class="form-control" name="description[]" value="<?= $value ['description'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Link của nút</label>
                        <input type="text" class="form-control" name="button_link[]"value="<?= $value ['button_link'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Text của nút</label>
                        <input type="text" class="form-control" name="button_text[]" value="<?= $value ['button_text'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Upload ảnh</label>
                        <img src="<?= $value ['slide_image'] ?>" alt="" width="30%">
                        <input type="text" class="form-control-r" name="slide_image_old[]" value="<?= $value ['slide_image'] ?>">

                        <input type="file" class="form-control" name="slide_image[]" >
                    </div>
                    <?php endforeach ?>
                    <div class="form-group">
                        <!-- <label for="formGroupExampleInput2">lưu</label> -->
                        <br>
                        <input type="submit" class="form-control btn btn-success" name="lưu" placeholder="Another input" value="Lưu lại">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>