<?php include 'main.php';

  if(isset($_POST['accept'])) {


  }


  if(isset($_POST['deny'])) {

    $request_id = $_POST['deny'];

    $sql_account_deny  = "UPDATE `requests` ";
    $sql_account_deny .= "SET `request_status` = 'closed' ";
    $sql_account_deny .= "WHERE `request_id` = '$request_id'";

    mysqli_query($connect, $sql_account_deny) or die(mysqli_error($connect));

  }


?>
<body>
   <a href="main.php"><h5>Account Requests</h5></a>
    <hr />
    <div class="account_requests_view">
      <?php
      $sql_getRequests =  "SELECT `request_id`,`first_name`, `email`, `message`, `request_status` FROM requests";

        $result = mysqli_query($connect, $sql_getRequests);

        while ($row = mysqli_fetch_assoc($result)) {

          if ($row['request_status'] == "open") {

          echo '<b>Name: </b>'.$row["first_name"]. '<br />'.
          '<b>Email: </b>' .$row["email"]. '<br />'.
          '<b>Message: </b>' .$row["message"]. '<br />'.
          "<form action=\"account_requests.php\" method=\"POST\">".
          "<button type=\'submit\' name =\"accept\" value='".$row['request_id']."' />Accept</button>".
          "<button type=\'submit\' name =\"deny\" value='".$row['request_id']."'>Deny</button></form><br /><br />";

        }
      }
       ?>
    </div>

</body>
<script>
$(document).ready(function() {

  $('.ui-main-button-group').hide("fast");
  $('.account_requests_view').show();

});


</script>
