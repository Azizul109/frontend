<?php 
    $server = "localhost";
    $username = "learn_php";
    $password = "root";
    $db = "lazy_form";
    $conn = mysqli_connect($server, $username, $password, $db);


    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lazy Form</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

</head>

<body>

<div class="container col-md-6">
    <div class="jumbotron bg-primary">
        <h3>Simple Form</h3>
    </div>
  <form method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Name*</label>
      <input type="text" class="form-control" placeholder="Your Name" name="name" required>
    </div>
    <div class="form-group col-md-6">
      <label>Email*</label>
      <input type="email" class="form-control" placeholder="Email" name="email" required>
    </div>
  </div>
  <div class="form-group">
    <label>Phone*</label>
    <input type="text" class="form-control" placeholder="017******" name="phone" required>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
          <label class="form-check-label">
            Male
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
          <label class="form-check-label">
            Female
          </label>
        </div>
      </div>
    </div>
  </fieldset>
  <div class="form-group">
    <label for="inputAddress2">Education*</label>
    <input type="text" class="form-control" placeholder="Degree name & passing year" name="education" required>
    <div id="new_gallery"><br>
        <button id="add_gallery" class="btn btn-primary col-md-4" placeholder="degree name & pass year">Add more education</button>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Country*</label>
      <input type="text" class="form-control" name="country" placeholder="Your country name" required>
    </div>
    <div class="form-group col-md-6">
      <label>District</label>
      <select id="selectBox" onchange="changeFunc();" class="form-control col-md-6" >
<option value="bangladesh">Bangladesh</option>
<option value="srilanka">Srilanka</option>
<option value="other">Others</option>
</select>
<input name="dd_number" placeholder="Add New" class="form-control" type="text" style="display: none" id="textboxes">
      
    </div>
    <div class="form-group col-md-2">
        <input type="submit" class="btn btn-primary" name="submit_user">
    </div>
  </div>
  
</form>


    <?php 
    
    $sql = "SELECT * FROM users";
    $run = mysqli_query($conn, $sql);

    echo 
    "
        <table class='table'>
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Education</th>
                <th>Country</th>
            </tr>
            </thead>
            <tbody>
    "
    ;
    $c = 1;
    while ($rows = mysqli_fetch_assoc($run)){
        echo "
            <tr>
                <td>$c</td>
                <td>$rows[name]</td>
                <td>$rows[email]</td>
                <td>$rows[phone]</td>
                <td>$rows[education]</td>
                <td>$rows[country]</td>
            </tr>
        ";
        $c++;
    }

    echo "</tbody>
        </table>
    ";

    ?>

</div>
    

<script>
  $(document).ready(function () {
    $("#add_gallery").click(function() {
        $("#new_gallery").append('<input name"new_gallery" class="col-md-6" /><a href="index.php" id="create_new_gallery" class="btn btn-primary col-md-2">Add</a>');
        $(this).remove();
        $("#create_new_gallery").on('click', function(){
           alert('1'); 
        });
    });
});

 function changeFunc() {
var selectBox = document.getElementById("selectBox");
var selectedValue = selectBox.options[selectBox.selectedIndex].value;
if (selectedValue=="other"){
$('#textboxes').show();
}
else {
alert("Sure");
$('#textboxes').hide();
}
}
  
</script>

<?php 
  if(isset($_POST['submit_user'])){
    $name = mysqli_real_escape_string($conn, strip_tags($_POST['name']));
    $email = mysqli_real_escape_string($conn, strip_tags($_POST['email']));
    $phone = mysqli_real_escape_string($conn, strip_tags($_POST['phone']));
    $education = mysqli_real_escape_string($conn, strip_tags($_POST['education']));
    $country = mysqli_real_escape_string($conn, strip_tags($_POST['country']));

    $ins_sql = "INSERT INTO users (name, email, phone, education, country) VALUES ('$name', '$email', '$phone', '$education', '$country')";

  if(mysqli_query($conn, $ins_sql)){ ?>
  <script>window.location="index.php";</script>
  <?php }

  }

  
  
  
  ?>


</body>

</html>