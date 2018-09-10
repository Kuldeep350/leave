<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
* { font-family:Arial; }
a { color:#999; text-decoration: none; }
a:hover { color:#802727; }
input { padding:5px; border:1px solid #999; border-radius:4px; -moz-border-radius:4px; -web-kit-border-radius:4px; -khtml-border-radius:4px; }
</style>
</head>
<body>
  <h>Kuldeep Singh</h>
    <form action="" method="post">
  	<div id="InputsWrapper">
  		<div><input type="text" name="mytext[]" id="field_1" value=""><a href="#" class="removeclass"></a></div>
  	</div>
  	<div id="AddMoreFileId">
  		<a href="#" id="AddMoreFileBox" class="btn btn-info">Add field</a><br><br>
  	</div>
  	<div id="lineBreak"></div>
  	<input type="submit" id="submit" name="send" value="Send">
  </form>
    </body>
    </html>
    <script>
    $(document).ready(.() {
  var MaxInputs       = 5; //maximum extra input boxes allowed
  var InputsWrapper   = $("#InputsWrapper"); //Input boxes wrapper ID
  var AddButton       = $("#AddMoreFileBox"); //Add button ID
  var x = InputsWrapper.length; //initlal text box count
  var FieldCount=1; //to keep track of text box added
  //on add input button click
  $(AddButton).click(function (e) {
          //max input box allowed
          if(x <= MaxInputs) {
              FieldCount++; //text box added increment
              //add input box
              $(InputsWrapper).append('<div><input type="text" name="mytext[]" id="field_'+ FieldCount +'"/> <a href="#" class="removeclass">Remove</a></div>');
              x++; //text box increment
              $("#AddMoreFileId").show();
              $('#AddMoreFileBox').html("Add field");
              // Delete the "add"-link if there is 3 fields.
              if(x == MaxInputs ) {
                  $("#AddMoreFileId").hide();
               	$("#lineBreak").html("<br>");
              }
          }
          return false;
  });
  $("body").on("click",".removeclass", function(e){ //user click on remove text
          if( x > 1 ) {
                  $(this).parent('div').remove(); //remove text box
                  x--; //decrement textbox
              	$("#AddMoreFileId").show();
              	$("#lineBreak").html("");
                  // Adds the "add" link again when a field is removed.
                  $('AddMoreFileBox').html("Add field");
          }
  	return false;
  })
  });
  </script>
