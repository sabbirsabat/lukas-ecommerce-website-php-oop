<?php include 'inc/header.php'; ?>

<?php
/**
 * when login mode; then access this page.
 */
    $login =   Session::get("custLogin");
    if ($login == false) {
    header('Location:login.php');
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
            <table class="tblone">
                <tr>
                    <td width="20%">First Name</td>
                    <td width="5%">:</td>
                    <td><?php echo $result['first_name']; ?></td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td>:</td>
                    <td><?php echo $result['last_name']; ?></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><?php echo $result['username']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?php echo $result['email']; ?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>:</td>
                    <td><?php echo $result['gender']; ?></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>:</td>
                    <td><?php echo $result['phone']; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td> <a href="editprofile.php?proid=<?php echo $result['id']; ?>">Update Details</a></td>
                </tr>
            </table>
            <?php } } ?>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
