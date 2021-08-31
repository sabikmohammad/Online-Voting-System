<?php
  session_start();
  if(!isset($_SESSION['userdata']))
  {
      header("location: ../");
  }
  $userdata=$_SESSION['userdata'];
  $groupsdata=$_SESSION['groupsdata'];
  if($_SESSION['userdata']['status']==0)
  {
      $status='<b style= "color:red" >Not Voted</b>';
  }
  else
  {
      $status='<b style= "color:green" >Voted</b>';
  }
?>
<html>

<head>
    <title>Online Voting System - Dashboard</title>
    <link rel="stylesheet" href="../routes/css/stylesheet.css">
</head>

<body>
<style>
#backbutton {
        padding: 5px;
        font-size: 15px;
        background-color: #3499db;
        color:white;
        border-radius: 5px;
        float: left;
    margin:10px;}
#logoutbutton {
        padding: 5px;
        font-size: 15px;
        background-color: #3499db;
        color:white;
        border-radius: 5px;
        float:right;
    margin:10px;}
#profile{
    background-color: white;
    width: 30%;
    padding: 20px;
    float:left;
}
#Group
{
    background-color: white;
    width: 50%;
    padding: 20px;  
    float:right; 
}
#votebutton
{
    padding: 5px;
        font-size: 15px;
        background-color: #3499db;
        color:white;
        border-radius: 5px;
        float: left;  
}
#profilenames
{
    float:left;
}
#groupsnames{
    float:left;
}
#mainpannel{
    padding: 10px;
}
#voted{
    padding: 5px;
        font-size: 15px;
        background-color: red;
        color:white;
        border-radius: 5px;
        float: left; 
}
</style>
<div id="mainsection">
    <center> 
<div id="headersection">
<a href="../" ><button id="backbutton">Back</button></a>
<a href="../routes/logout.php">   <button id="logoutbutton">Logout</button></a>
    <h1> Online Voting System </h1>
        </div>
</center>
    <hr>
    <div id="mainpanel">
    <div id="Profile">
        <center><img src="../uploads/<?php echo $userdata['photo']?>" height="100" width="100"></center><br><br>
        <div id="profilenames">
        <b>Name:</b><?php echo $userdata['name']?><br><br>
        <b>Mobile:</b><?php echo $userdata['mobile']?><br><br>
        <b>Address:</b><?php echo $userdata['address']?><br><br>
        <b>Status:</b><?php echo $status?><br><br>
</div>
    </div>
    <div id="Group">
        <?php
    if($_SESSION['groupsdata'])
    {
         for($i=0; $i<count($groupsdata); $i++)
         {
             ?>
             <div>
               <img style="float:right" src="../uploads/<?php echo $groupsdata[$i]['photo']?>" height="100" width="100">
               <div id="groupsname">
                 <b>Group Name: </b><?php echo $groupsdata[$i]['name']?><br><br>
                 <b>ID:</b><?php echo $groupsdata[$i]['id']?><br><br>
                 <form action="../api/vote.php" method="POST" enctype="multipart/form-data">
                     <input type="hidden" name="gid" value='<?php echo $groupsdata[$i]['id'] ?>'>
                     <?php
                     if($_SESSION['userdata']['status']==0)
                     {
                         ?>
                     <input type="submit" name="votebutton" value="vote" id="votebutton"><br><br>
                     <?php
                     }
                     else{
                        ?>
                        <button disabled  type="button" name="votebutton" value="vote" >Voted </button><br><br>
                        <?php
                     }
                     ?>
                 </form>
             </div>
                    </div>
             <hr>
             <?php
         } 
    }
    else
  {
      header("location: ../");
  }
?>
    </div>

</body>

</html>