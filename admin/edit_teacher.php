<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php  $get_id=$_GET['id'];  ?>
<body>
    <?php
    $table = '"Teacher"';
    $teacher_query=pg_query("select * from $table where teacher_id=$get_id")or die(pg_errormessage());
    $rows=pg_fetch_array($teacher_query);
    ?> 
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
                                    <label class="control-label" for="inputEmail">email</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="email" value="<?php echo $rows['email'] ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Password</label>
                                    <div class="controls">
                                        <input type="text" name="password" id="inputPassword" value="<?php echo $rows['password'] ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Name</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="name" value="<?php echo $rows['name'] ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Phone</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="phone" value="<?php echo $rows['phone'] ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Address</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="address" value="<?php echo $rows['address'] ?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Certificate</label>
                                    <div class="controls">
                                        <input type="text" id="inputEmail" name="certificate" value="<?php echo $rows['certificate'] ?>" required>
                                    </div>
                                </div>
									<div class="control-group">
	<label class="control-label" for="input01">Image:</label>
    <div class="controls">
	<input type="file" name="image" class="font"> 
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
                                if(file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {
								$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	                            $image_name= addslashes($_FILES['image']['name']);
	                            $image_size= getimagesize($_FILES['image']['tmp_name']);

				                move_uploaded_file($_FILES["image"]["tmp_name"],"src/uploads/" . $_FILES["image"]["name"]);			
			                    $image="src/uploads/" . $_FILES["image"]["name"];			
                                }
                                else {
                                    $email = $_POST['email'];
                                    $password = $_POST['password'];
                                    $name = $_POST['name'];
                                    $phone = $_POST['phone'];
                                    $address = $_POST['address'];
                                    $certificate = $_POST['certificate'];
                                    $image = $rows['picture'];
                                }

                                $table = '"Teacher"';
			                    pg_query("update $table SET email='$email',password='$password',name='$name',phone='$phone',certificate='$certificate',
                                address='$address',picture='$image' 
                                where teacher_id = $get_id
			                    ")or die(pg_errormessage());

                                header('location:teacher.php') or die(pg_errormessage());
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
