<?php include 'inc/addjust.php'; ?>
<?php include '../Classes/Contact.php'; ?>
<?php include_once '../helpers/Format.php'; ?>

<?php 
$cntct    = new Contact();
$fm       = new Format();

?>
<?php
if (!isset($_GET['msgid']) || $_GET['msgid'] == NULL) {

    echo "<script> window.location = 'mailbox.php'; </script>";
} else {
     $id=$_GET['msgid'];
}
?>
<?php
/**
*Contact data Insert Method call
*/

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {	
	$replymessage = $cntct->replyMessage( $_POST, $id );
} 
?>

<div class="mailbox-compose-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-md-3 col-sm-3 col-xs-12">
                <div class="hpanel responsive-mg-b-30">
                    <div class="panel-body">
                        <ul class="mailbox-list">
                            <li>
                                <a href="mailbox.php">
                                    <span class="pull-right">12</span>
                                    <i class="fa fa-envelope"></i> Inbox
                                </a>
                            </li>
                            <li>
                                <a href="mailbox-sent.php"><i class="fa fa-paper-plane"></i> Sent</a>
                            </li>
                            <li>
                                <a href="mailbox-draft.php"><i class="fa fa-pencil"></i> Draft</a>
                            </li>
                            <li>
                                <a href="mailbox-trash.php"><i class="fa fa-trash"></i> Trash</a>
                            </li>
                            </li>
                        </ul>
                        <hr>
                        <ul class="mailbox-list">
                            <li>
                                <a href="#"><i class="fa fa-plane text-danger"></i> Travel</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart text-warning"></i> Finance</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-users text-info"></i> Social</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-tag text-success"></i> Promos</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-flag text-primary"></i> Updates</a>
                            </li>
                        </ul>
                        <hr>
                        <ul class="mailbox-list">
                            <li>
                                <a href="#"><i class="fa fa-gears"></i> Settings</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-info-circle"></i> Support</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-md-9 col-sm-9 col-xs-12">

                <div class="hpanel email-compose mg-b-15">
                    <div class="panel-heading hbuilt">
                        <div class="p-xs h4">
                            Reply
                        </div>
                        <?php 
                        /**
                        * Message : Add Message send or fail
                        */
                        if (isset($replymessage)) {
                            echo $replymessage;
                        }
                        ?>
                    </div>
                    <?php 
                    /**
                     * Mail Reply Value Method
                     */                                
                        $mailView = $cntct->replyMessageValue($id);
                        if ($mailView) {  
                            while ( $result = $mailView->fetch_assoc()) {                   
                    ?>
                    <form method="post" action="" class="form-horizontal">
                        <div class="panel-heading hbuilt">
                            <div class="p-xs">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label text-left">To:</label>
                                    <div class="col-sm-11">
                                        <input type="text" name="toEmail" class="form-control input-sm" value="<?php echo $result['email']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label text-left">From:</label>
                                    <div class="col-sm-11">
                                        <input type="text" name="fromEmail" class="form-control input-sm" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label text-left">Subject:</label>
                                    <div class="col-sm-11">
                                        <input type="text" name="subject" class="form-control input-sm" placeholder="Enter Email subject">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body no-padding">
                            <textarea class="summernote6" name="message">  </textarea>
                        </div>

                        <div class="panel-footer">
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button class="btn btn-default"><i class="fa fa-edit"></i> Save</button>
                                    <button class="btn btn-default"><i class="fa fa-trash"></i> Discard</button>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary ft-compse">Send email</button>
                            <div class="btn-group">
                                <button class="btn btn-default"><i class="fa fa-paperclip"></i> </button>
                                <button class="btn btn-default"><i class="fa fa-image"></i> </button>
                            </div>
                        </div>
                    </form>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
