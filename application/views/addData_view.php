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
    *{margin: 12px;padding: 0px;}
    .container {
    background-color: #f0ffff52;
    color: whitesmoke;
}

body {
    width: 100%;
    height: 100%;
    background-image: url(https://cdn.pixabay.com/photo/2016/03/05/19/02/salmon-1238248_960_720.jpg);
    background-size: cover;

} 
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h3 class=" text-center">THÊM MỚI SLIDE</h3>
                <hr>
                <!-- form có method là post action là slides/addSlides -->
                <form method="POST" action="Slides/addSlides"enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Tiêu đề slide</label>
                        <input type="text" class="form-control" name="title" placeholder="Mô tả slide">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Mô tả slide</label>
                        <input type="text" class="form-control" name="description" placeholder="Mô tả slide">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Link của nút</label>
                        <input type="text" class="form-control" name="button_link" placeholder="Link của nút">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Text của nút</label>
                        <input type="text" class="form-control" name="button_text" placeholder="Text của nút">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Upload ảnh</label>
                        <input type="file" class="form-control" name="slide_image" placeholder="Another input">
                    </div>
                    
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Upload ảnh</label>
                        <input type="submit" class="form-control btn btn-success" name="submit" placeholder="Another input">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>