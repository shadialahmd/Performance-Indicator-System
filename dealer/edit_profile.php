<?php include('session.php'); ?>
<?php include('header.php'); ?>

<body>

    <div id="wrapper">
		<?php include('navbar.php'); ?>
		<br><br>
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit Profile</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				 
					<div style="height:20px;"></div>
						<?php
							$e=mysqli_query($con,"select * from employee left join emp_position on emp_position.positionid=employee.positionid where employeeid='".$_SESSION['id']."'");
							$er=mysqli_fetch_array($e);
						?>
                <!-- /.row -->
						
						<div class="row">
							<div class="col-lg-3">
								<div>
								<?php
								if($er['photo'] == ""){
									?>
									<img src="../img/profile.jpg" width="200px" height="200px" class="thumbnail">
									<?php
								}
								else{
									?>
									<img src="../<?php echo $er['photo']; ?>" width="200px" height="200px" class="thumbnail">
									<?php
								}
								?>
								</div>
							</div>
							<div class="col-lg-9">
								<form role="form" method="POST" action="save_profile.php" enctype="multipart/form-data">
								<div class="form-group input-group">
									<span style="width:110px;" class="input-group-addon">First Name:</span>
									<input type="text" style="width:480px;" class="form-control" value="<?php echo $er['firstname']; ?>" name="firstname"> 
								</div>
								<div class="form-group input-group">
									<span style="width:110px;" class="input-group-addon">Middle Name:</span>
									<input type="text" style="width:480px;" class="form-control" value="<?php echo $er['middlename']; ?>" name="middlename"> 
								</div>
								<div class="form-group input-group">
									<span style="width:110px;" class="input-group-addon">Last Name:</span>
									<input type="text" style="width:480px;" class="form-control" value="<?php echo $er['lastname']; ?>" name="lastname"> 
								</div>
								<div class="form-group input-group">
									<span style="width:110px;" class="input-group-addon">Address:</span>
									<input type="text" style="width:480px;" class="form-control" value="<?php echo $er['address']; ?>" name="address"> 
								</div>
								<div class="form-group input-group">
									<span style="width:110px;" class="input-group-addon">Contact Info:</span>
									<input type="text" style="width:480px;" class="form-control" value="<?php echo $er['contact_info']; ?>" name="contact_info"> 
								</div>
								<div class="form-group input-group">
									<span style="width:110px;" class="input-group-addon">Birthdate:</span>
									<input type="date" style="width:480px;" class="form-control" value="<?php echo $er['birthdate']; ?>" name="birthdate"> 
								</div>
								<div class="form-group input-group">
									<span style="width:110px;" class="input-group-addon">Gender:</span>
									<select  style="width:480px;" class="form-control" name="gender">
										<option value="<?php echo $er['gender']; ?>"><?php echo $er['gender']; ?></option>
										<option>
											<?php
												if ($er['gender']=="Male"){
													echo "Female";
												}
												else{
													echo "Male";
												}
											?>
										</option>
									</select>
								</div>
								<div class="form-group input-group">
									<span style="width:110px;" class="input-group-addon">Photo:</span>
									<input type="file" style="width:480px;" class="form-control" name="image">
								</div>
								
									<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Save</button> <a href="profile.php" class="btn btn-success btn-sm"><i class="fa fa-times"></i> Cancel</a>
								
								</form>
							</div>
						</div>
						
                <!-- /.row -->
				
            </div>
            <!-- /.container-fluid -->
        </div>
	</div>
	
	<?php include('scripts.php'); ?>
	<?php include ('modal.php'); ?>
	
</body>
</html>