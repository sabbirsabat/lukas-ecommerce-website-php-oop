<?php include 'inc/header.php'; ?>

<?php
$login =   Session::get("custLogin");
if ($login == false) {
 header('Location:login.php');
}
?>
<?php
    $cmrId = Session::get("cmrId");  
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {	
        $updateCmr = $cmr->customerUpdate( $_POST, $cmrId);
    } 
?>

<style>
    .tblone {
        width: 550px;
        margin: 0 auto;
        border: 2px solid #ddd;
    }

    .tblone tr td {
        text-align: justify;
    }

</style>
<div class="main">
    <div class="content">
        <div class="section group">

        <?php 
          $id = Session::get('cmrId');
          $getdata = $cmr->getCustomerData($id);
          if ($getdata) {
             while ($result = $getdata->fetch_assoc()) {
        ?>
            <form action="" method="post">
                <table class="tblone">
                    <?php 
                    if (isset($updateCmr)) {
                        echo "<tr><td colspan='2'>".$updateCmr."</td></tr>";
                    }

                    ?>
                    <tr>
                        <td colspan="2">
                            <h2>Update Profile Details</h2>
                        </td>
                    </tr>
                    <tr>
                        <td width="20%">First Name</td>
                        <td><input type="text" name="first_name" value="<?php echo $result['first_name']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="last_name" value="<?php echo $result['last_name']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username" value="<?php echo $result['username']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email" value="<?php echo $result['email']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td><input type="text" name="gender" value="<?php echo $result['gender']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td><input type="text" name="phone" value="<?php echo $result['phone']; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Update"></td>
                    </tr>
                </table>
                <form>
                    <?php } } ?>
        </div>
    </div>

</div>

<?php include 'inc/footer.php'; ?>
