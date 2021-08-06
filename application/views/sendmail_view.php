<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="<?php echo base_url() ?>template/backend/vendor/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>template/backend/1.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>template/backend/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>template/backend/vendor/fonts/css/all.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>template/backend/1.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 pt-5 ">
                <h2>FORM GỬI EMAIL</h2>
                <form action="Sendmail/do_send" method="post">
                    <div class="form-group">
                        <label for="my-input">Email người gửi</label>
                        <input id="my-input"name="ten" class="form-control" type="text" >
                    </div>
                    <div class="form-group">
                        <label for="my-input">Email người nhận</label>
                        <input id="my-input"name="nguoinhan" class="form-control" type="text" >
                    </div>
                    <div class="form-group">
                        <label for="my-input">Nội dung</label>
                        <input id="my-input" class="form-control" type="text" name="">
                        <textarea name="noidung" id="" cols="30" rows="10" class="pt-2"></textarea>
                    </div>
                    <div class="form-group">

                        <input id="my-input" class="form-control btn btn-outline-danger" type="submit" value="Gửi">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>