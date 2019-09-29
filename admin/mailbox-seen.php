<?php include 'inc/addjust.php'; ?>
<?php include '../Classes/Contact.php'; ?>
<?php include_once '../helpers/Format.php'; ?>

<?php 
$cntct    = new Contact();
$fm       = new Format();
?>
<?php
    if (isset($_GET['seenid'])) {
        $seenid = $_GET['seenid'];
 $seen_message   = $cntct->moveToSeenBox($seenid);
}
?>

<div class="mailbox-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-md-3 col-sm-3 col-xs-12">
                <div class="hpanel responsive-mg-b-30">
                    <div class="panel-body">
                        <ul class="mailbox-list">
                            <a href="mailbox-compose.php" class="btn btn-success compose-btn btn-block m-b-md">Compose</a>
                            <li class="active">
                                <a href="#">
                                    <i class="fa fa-envelope"></i> Seen
                                            <?php 
                                    /**
                                     * Show seen count 
                                     */                                
                                        $seencnt = $cntct->seenCount();                                    
                                    ?>
                                    <span class="pull-right"><?php echo $seencnt ?></span>
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
                <div class="hpanel mg-b-15">
                    <div class="panel-heading hbuilt mailbox-hd">
                        <div class="text-center p-xs font-normal">
                            <div class="input-group">
                                <input type="text" class="form-control input-sm" placeholder="Search email in your inbox..."> <span class="input-group-btn"> <button type="button" class="btn btn-sm btn-default">Search
                                    </button> </span></div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6 col-md-6 col-sm-6 col-xs-12 mg-b-15">
                                <div class="btn-group">
                                    <a href="mailbox-seen.php"><button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Refresh</button></a>
                                   <!--  
                                    <button class="btn btn-default btn-sm"><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-default btn-sm"><i class="fa fa-exclamation"></i></button>
                                    <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                                    <button class="btn btn-default btn-sm"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-default btn-sm"><i class="fa fa-tag"></i></button> 
                                    -->
                                </div>
                            </div>
                            <div class="col-md-6 col-md-6 col-sm-6 col-xs-12 mailbox-pagination mg-b-15">
                                <div class="btn-group">
                                    <button class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i></button>
                                    <button class="btn btn-default btn-sm"><i class="fa fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-mailbox">
                                <tbody>
                                    <?php 
                                        /**
                                         * Show Mail List
                                         */                                
                                            $getReadMails = $cntct->getAllSeenMailList();
                                            if ($getReadMails) {
                                                $i = 0;
                                                while ( $result = $getReadMails->fetch_assoc()) {
                                                    $i++;
                                        ?>
                                    <tr class="unread">
                                        <td class="">
                                            <div class="checkbox checkbox-single checkbox-success">
                                                <input type="checkbox" name="checkbox">
                                                <label></label>
                                            </div>
                                        </td>
                                        <td><a onclick="return confirm('Are you sure to trash this mail ?')" href="mailbox-trash.php?trashid=<?php echo $result['id']; ?>"><button title="trash" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button></a></td>
                                        <td><a href="mailbox-view.php?msgid=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></td>
                                        <td><a href="mailbox-view.php?msgid=<?php echo $result['id']; ?>"><?php echo $fm->textShorten($result['message'],70); ?></a>
                                        </td>
                                        <td><i class="fa fa-paperclip"></i></td>
                                        <td class="text-right mail-date"><?php echo $fm->formatDate($result['date']); ?></td>
                                    </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="panel-footer">
                      <a href="mailbox.php"> <i class="fa fa-eye"> </i> inbox </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
