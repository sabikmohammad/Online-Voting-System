<?php
session_start();
include("connect.php");
$gidd=$_POST['gid'];
$vid=$_SESSION['userdata']['id'];
$update_votes=mysqli_query($connect," UPDATE user SET votes=+1 WHERE id='$gidd' ");
$update_user_votes=mysqli_query($connect," UPDATE user SET status=1 WHERE id='$vid' ");
if($update_votes and $update_user_votes)
{
$groups=mysqli_query($connect,"SELECT * FROM user where role=2");
$groupsdata=mysqli_fetch_all($groups,MYSQLI_ASSOC);
$_SESSION['userdata']['status']=1;
$_SESSION['groupsdata']=$groupsdata;
echo '
<script>
alert("Voting Successful");
window.location="../routes/dashboard.php";
</script>
';
}
else
{
    echo '
    <script>
    alert("SOME ERROR");
    window.location="../";
    </script>
    ';
}

?>