<?php include "header.php" ?>
  <?php include "siderbar.php" ?>
  <!-- ============================================================== -->
  <!-- Page wrapper  -->
  <!-- ============================================================== -->
  <div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Container fluid  -->
      <!-- ============================================================== -->
      <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Bread crumb and right sidebar toggle -->
          <!-- ============================================================== -->
          <div class="row page-titles">
              <div class="col-md-6 col-8 align-self-center">
                  <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
              </div>

          </div>
          <!-- ============================================================== -->
          <!-- End Bread crumb and right sidebar toggle -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-block">
                        <form action="" method="POST" enctype="multipart/form-data">
                        	<input type="file" name="files[]" multiple="" />
                        	<input type="submit" class="btn btn-info"/>
                        </form>
                        <?php
$con = mysqli_connect("localhost","root","","pizone");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
$query=mysqli_query($con,"SELECT * FROM image");
 		while($row = mysqli_fetch_array($query))
		{
			?>
    <table>
      <tr id="<?php echo $row['img_id'];?>">
    		<td>
    		<img src='uploads/<?php echo $row['img_name'];?>'    style=" height:320px;width:300px;"></td>
    		<td > <a href="up.php?img_id=<?php echo $row['img_id'];?>" ><span class="fa fa-remove delete"></span></a></td>
    	</tr>
    </table>

		 <?php
		}
		?>
		<?php
// 			if(isset($_GET['img_id']))
//         {
//                 $img_id = $_GET['img_id'];
// $query = mysqli_query($con,"DELETE FROM `image` WHERE img_id='$img_id'");
//}
          ?>
                      </div>
                  </div>
              </div>
          </div>
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Container fluid  -->
      <!-- ============================================================== -->
      <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
      <script type="text/javascript">
        $(".delete").click(function(){
            var id = $(this).parents("td").attr("id");
              $("#"+id).remove();
            if(confirm('Are you sure to remove this record ?'))
            {
                $.ajax({
                   url: 'deletee.php',
                   type: 'POST',
                   data: {id: id},

                });
            }
        });
      </script>
<?php
$con = mysqli_connect("localhost","root","","pizone");
if(isset($_FILES['files'])){

    $errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$img_name = $key.$_FILES['files']['name'][$key];
		$img_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$img_type=$_FILES['files']['type'][$key];
        if($img_size > 22097152){
			$errors[]='File size must be less than 2 MB';
        }
        $query = mysqli_query($con,"INSERT into image (`img_name`,`img_size`,`img_type`) VALUES('$img_name','$img_size','$img_type')");
        $desired_dir="user_data";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$img_name)==false){
                move_uploaded_file($file_tmp,"uploads/".$img_name);
            }else{									//rename the file if another one exist
                $new_dir="user_data/".$img_name.time();
                 rename($file_tmp,$new_dir);
            }
              mysqli_query($con, $query);
        }else{
                print_r($errors);
        }
    }
	if(empty($error)){
		//echo "Success";
	}
}
?>


<?php include "footer.php" ?>
