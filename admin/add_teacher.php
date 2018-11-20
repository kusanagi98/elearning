<?php include('header.php'); ?>
<?php include('session.php'); ?>
<body>

    <div class="row-fluid">
        <div class="span12">

            <?php include('navbar.php'); ?>

            <div class="container">

                <div class="row-fluid">

                    <div class="span12">
                        <div class="hero-unit-3">
                            <a href="teacher.php" class="btn btn-success"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
                            <br>
                            <br>
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Email</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Password</label>
                                    <div class="controls">
                                        <input type="text" name="password" id="inputPassword" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Name</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="name" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Phone</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="phone" placeholder="Phone" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Address</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="address" placeholder="Address" required>
                                    </div>
                                </div>   
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Certificate</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="certificate" placeholder="Certificate" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="input01">Image:</label>
                                    <div class="controls">
                                        <input type="file" name="image" class="font" required> 
                                    </div>
                                </div>                             
                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" name="save" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save</button>
                                    </div>
                                </div>

                            </form>

                            <?php
                            if (isset($_POST['save'])) {
                                $email = $_POST['email'];
                                $password = $_POST['password'];
                                $name = $_POST['name'];
                                $phone = $_POST['phone'];
                                $address = $_POST['address'];
                                $certificate = $_POST['certificate'];

                                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "src/uploads/" . $_FILES["image"]["name"]);
                                $pic_location = "src/uploads/" . $_FILES["image"]["name"];

                                $table = '"Teacher"';
                                pg_query("insert into $table (name,phone,email,password,address,certificate,picture,created_at)
                        values ('$name','$phone','$email','$password','$address','$certificate','$pic_location',now())         
") or die(pg_errormessage());
                                header('location:teacher.php');
                            }
                            ?>
                        </div>

                    </div>
                </div>
                <?php include('footer.php'); ?>
            </div>
        </div>
    </div>
</body>
</html>


