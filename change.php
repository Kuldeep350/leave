<?php include "header.php"?>
  <style>
   h1, p{
		margin-left:15%;
   }
   body{
		background-image:url("ks.jpg");
		}
  #a{
	padding:50px;
	align:center;
	margin-left:20%;
	margin-top:35px;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(100%,rgba(0,0,0,0.30)), color-stop(100%,rgba(0,0,0,0.30))); border-radius:10px;
	width:50%;
	color:lightblue;
	}
form{
		margin-left:20%;
	}
.btn{
	border-radius:5px;
	margin-top:5%;
	}
	 textarea
	 { margin-left: -3px;
	 border-radius:6px;
 		}
	 footer {
			 position: relative;
			 margin-top:70em;
			    width: 100%;
	 }
	</style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="col-xs-3" id="a">
<form class="form-horizontal" method="post" onsubmit="return validateForm()" name="myForm" id="form" onSubmit="if(!confirm('Is the form filled out correctly?')){return false;}">
<div>
        <h2 > hello my frindes</h2>
								<h1>Request for Leave</h1>
							<p>Request your leave details down below.</p>
						<div class="form-group">
						<label for="name" class="control-label col-sm-2" > name </label>
					<div class="col-sm-4">
						<input type="text" id="name" class="form-control" name="name"   placeholder="name ">
				</div>
				</div>
				<div class="form-group">
				<label for="name" class="control-label col-sm-2" > Email </label>
				<div class="col-sm-4">
				<input type="text" id="email" class="form-control" name="email" id="email"  placeholder="abc@gmail.com "/>
				</div>
			</div>
				<div class="form-group">
						<label for="name" class="control-label col-sm-2" > Phonenumber </label>
						<div class="col-sm-4">
				<input  type="text" id="tel" class="form-control" name="tel"   placeholder="+919977777777 "/>
			</div>
		</div>
		<h2>Details of Leave</h2>
		<div class="form-group">
				<label for="name" class="control-label col-sm-2" > Leave Start</label>
				<div class="col-sm-4">
			<input type="date" id="leavestart" class="form-control" name="leavestart"   />
		</div>
		</div>
			<div class="form-group">
					<label for="name" class="control-label col-sm-2" > Leave End</label>
			<div class="col-sm-4">
				<input  type="date" id="leaveend" class="form-control" name="leaveend"   />
		</div>
		</div>
			<div class="form-group">
					<label for="name" class="control-label col-sm-2" > Comments</label>
          <div class="col-sm-4">
						<textarea id="input_12" class="form-textarea" name="comment" cols="22" rows="0" data-component="textarea"></textarea>
          </div>
							<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" name="post" id="post"class="btn btn-primary"  >submit </button>
				</div>
				</div>
				</div>
				</form>
			</div>
    <?php
      $con = mysqli_connect("localhost","root","","pizone");
      if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

      if(isset($_POST['name']))
              {
      			$name = mysqli_real_escape_string($con,$_POST['name']);
      			$email = mysqli_real_escape_string($con,$_POST['email']);
      			$phonenumber = $_POST['tel'];
      			$leavestart = $_POST['leavestart'];
      			$leaveend = $_POST['leaveend'];
      	 		$comment = $_POST['comment'];
      			$status="pending";
            // $ctime = "'".$_POST['time']."'" ;
            // $ctime = "STR_TO_DATE(".$ctime.", '%d/%m/%Y')"  ;
            $time = date('H:i A');
            $time = date('H:i A', strtotime($time));
        date_default_timezone_set("Asia/Kolkata");
      	$time =date("h:i");
      	$time =date("h:i:sa");
       echo "<br>";
        "<br />Date and time (24 hour format): " . date("G:i:s");
       $time= date("G:i");
       echo "<br>";
       if($time >"09:02" && $time > "11:02")
      {
      	 //echo "not";
      echo '<script language="javascript">';
      echo 'alert(" Please message sent 10:00am to 11:00am")';
      echo '</script>';
       }
       else
       {
       	mysqli_query($con,"INSERT INTO `leaves`(`name`, `email`, `phonenumber`, `leavestart`, `leaveend`, `comment`,`permission`) VALUES ('$name','$email','$phonenumber','$leavestart','$leaveend','$comment','$status')");
      	mysqli_query($con,"INSERT INTO `history`(`name`, `email`, `phonenumber`, `leavestart`, `leaveend`, `comment`,`time`) VALUES ('$name','$email','$phonenumber','$leavestart','$leaveend','$comment',('$time') )");
       }
      		}
      mysqli_close($con);
      ?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script>
      function ValidateEmail(email) {
              var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
              return expr.test(email);
          };
      </script>
      <script>
      function tel(tel)
      {
      var filter = /^\(?(\d{3})\)?[-\. ]?(\d{3})[-\. ]?(\d{4})$/;
        return filter.test(tel);
      }
      </script>
      <script>
      $('form').on('submit', function (e) {
             var focusSet = false;
             var re = /^\w+([-+.'][^\s]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
             var emailFormat = re.test($("#email").val());// this return result in boolean type
             if (!ValidateEmail($("#email").val())) {
                 if ($("#email").parent().next(".validation").length == 0) // only add if not added
                 {
                     $("#email").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter email address</div>");
                 }
                 e.preventDefault(); // prevent form from POST to server
                 $('#email').focus();
                 focusSet = true;
             } else {
                 $("#email").parent().next(".validation").remove(); // remove it
             }
             if (!$('#name').val()) {
            if ($("#name").parent().next(".validation").length == 0) // only add if not added
            {
                $("#name").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter name</div>");
            }
            e.preventDefault(); // prevent form from POST to server
            $('#name').focus();
            focusSet = true;
        } else {
            $("#name").parent().next(".validation").remove(); // remove it
        }
             if (!tel($("#tel").val())) {
                 if ($("#tel").parent().next(".validation").length == 0) // only add if not added
                 {
                     $("#tel").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter mobile</div>");
                 }
                 e.preventDefault(); // prevent form from POST to server
            if (!focusSet) {
                $("#tel").focus();
            }
        } else {
            $("#tel").parent().next(".validation").remove(); // remove it
        }
        if (!$('#leavestart').val()) {
       if ($("#leavestart").parent().next(".validation").length == 0) // only add if not added
       {
           $("#leavestart").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter date</div>");
       }
       e.preventDefault(); // prevent form from POST to server
  if (!focusSet) {
      $("#leavestart").focus();
  }
} else {
  $("#leavestart").parent().next(".validation").remove(); // remove it
}
if (!$('#leaveend').val()) {
if ($("#leaveend").parent().next(".validation").length == 0) // only add if not added
{
   $("#leaveend").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter date</div>");
}
e.preventDefault(); // prevent form from POST to server
if (!focusSet) {
$("#leaveend").focus();
}
} else {
$("#leaveend").parent().next(".validation").remove(); // remove it
}
if (!$('#input_12').val()) {
if ($("#input_12").parent().next(".validation").length == 0) // only add if not added
{
   $("#input_12").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter message</div>");
}
e.preventDefault(); // prevent form from POST to server
if (!focusSet) {
$("#input_12").focus();
}
} else {
$("#input_12").parent().next(".validation").remove(); // remove it
}
         });
      </script>
<?php include "footer.php "?>
