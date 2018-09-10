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
                       <h3 class="text-themecolor m-b-0 m-t-0">Leave History</h3>
                       <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                           <li class="breadcrumb-item active">Leave History</li>
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
                   <!-- column -->
                   <div class="col-sm-12">
                       <div class="card">
                           <div class="card-block">
                               <h4 class="card-title">Leave History</h4>
                              <div class="table-responsive"><br><br>
                                   <table class="table">
<thead>
 <tr>

 <th>name</th>
 <th>Email</th>
 <th>phonenumber</th>
 <th>leavestart</th>
 <th>leaveend</th>
 <th>Comments</th>
 <th colspan=3>Action</th>
 </tr>
 </thead>
 <?php
$con = mysqli_connect("localhost","root","","pizone");
if ($con->connect_error) {
   die("Connection failed: " . $con->connect_error);
}
$query=mysqli_query($con,"SELECT `id`, `name`, `email`, `phonenumber`, `leavestart`, `leaveend`, `comment` FROM history");
   while($row = mysqli_fetch_array($query))
  {
    ?>
 <tr>
     <td> <?php echo  $row['name'];?></td>
     <td> <?php echo  $row['email'];?></td>
     <td> <?php echo  $row['phonenumber'];?></td>
     <td> <?php echo  $row['leavestart'];?></td>
     <td> <?php echo  $row['leaveend'];?></td>
     <td> <?php echo  $row['comment'];?></td>
     <form action="" method="post" id="form1">
     <td> <input type="checkbox" class="check" name="records[]" id="y"value="<?php echo $row['id'];?>"> </td>
 </tr>
      <?php
  }
  ?>
  </table>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>

           </div>
           <div class="modal-body">kuldeep</div>
           <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <button type="button" class="btn btn-primary">Save changes</button>
           </div>
       </div>
   </div>
</div>
      <div id="div" style="display:none" ><input type="submit" id="btn" name="delete" value="Delete" class="btn btn-info">
               </div>
</form>

               <?php
                   // if (isset($_POST['delete']))
                   // {
                   //     $numberofcheckbox = count($_POST['records']);
                   //     $i = 0;
                   //     while ($i<$numberofcheckbox) {
                   //       $keyToDelete = $_POST['records'][$i];
                   //       $query = mysqli_query($con,"DELETE FROM `history` WHERE id='$keyToDelete'");
                   //       $i++;
                   //     }
                   // }
               ?>
                       </div>
                   </div>
               </div>
               <!-- ============================================================== -->
               <!-- End PAge Content -->
               <!-- ============================================================== -->
           </div>
         </div>
           <!-- ============================================================== -->
           <!-- End Container fluid  -->
           <!-- ============================================================== -->
           </div>
           <script>
           $(document).ready(function () {

   $("#btn").click(function(){
        $('#myModal').modal('show');
   });
});
</script>
           <script>

$('.check').click(function() {
   if( $('.check:checked').length > 0 ) {
       $("#div").show();
   } else {
       $("#div").hide();
   }
});
</script>
           <?php include "footer.php" ?>
