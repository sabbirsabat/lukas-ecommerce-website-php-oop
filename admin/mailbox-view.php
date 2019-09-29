<?php include 'inc/addjust.php'; ?>
<?php include '../Classes/Contact.php'; ?>
<?php include_once '../helpers/Format.php'; ?>

<?php 
$cntct    = new Contact();
$fm       = new Format();

if (!isset($_GET['msgid']) || $_GET['msgid'] == NULL) {

    echo "<script> window.location = 'mailbox.php'; </script>";
} else {
     $id=$_GET['msgid'];
}
?>


<div class="mailbox-view-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-md-3 col-sm-3 col-xs-12">
                <div class="hpanel responsive-mg-b-30">
                    <div class="panel-body">
                        <ul class="mailbox-list">
                            <li class="active">
                                <a href="mailbox.php">
                                    <i class="fa fa-paper-plane"></i> Inbox
                                       <?php 
                                    /**
                                     * Show inbox count 
                                     */                                
                                        $inboxcnt = $cntct->inboxCount();                                    
                                    ?>                                   
                                    <span class="pull-right"><?php echo $inboxcnt ?></span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="mailbox-sent.php">
                                    <i class="fa fa-paper-plane"></i> Sent
                                    <?php 
                                    /**
                                     * Show inbox count 
                                     */                                
                                        $sentcnt = $cntct->sentCount();                                    
                                    ?>    
                                    <span class="pull-right"><?php echo $sentcnt ?></span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="mailbox-draft.php">
                                    <i class="fa fa-pencil"></i> Draft
                                              <?php 
                                    /**
                                     * Show draft count 
                                     */                                
                                        $draftcnt = $cntct->draftCount();                                    
                                    ?> 
                                    <span class="pull-right"><?php echo $draftcnt ?></span>
                                </a>
                            </li>
                             <li class="active">
                                <a href="mailbox-trash.php">
                               
                                    <i class="fa fa-trash"></i> Trash
                                          <?php 
                                    /**
                                     * Show trash count 
                                     */                                
                                        $trashcnt = $cntct->trashCount();                                    
                                    ?>
                                    <span class="pull-right"><?php echo $trashcnt ?></span>
                                </a>
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
                   <?php 
                    /**
                     * Mail View Method
                     */                                
                        $mailView = $cntct->viewMessage($id);
                        if ($mailView) {  
                            while ( $result = $mailView->fetch_assoc()) {                   
                    ?>
                <div class="hpanel email-compose mailbox-view mg-b-15">
                    <div class="panel-heading hbuilt">

                        <div class="p-xs h4">
                            <small class="pull-right">
                                08:26 PM (16 hours ago)
                            </small> Email view

                        </div>
                    </div>
                    <div class="border-top border-left border-right bg-light">
                        <div class="p-m custom-address-mailbox">

                            <div>
                                <span class="font-extra-bold">Subject: </span> <?php echo $result['subject']; ?>
                            </div>
                            <div>
                                <span class="font-extra-bold">From: </span>
                                <a href="#"><?php echo $result['email']; ?></a>
                            </div>
                            <div>
                                <span class="font-extra-bold">Date: </span> <?php echo $fm->formatDate($result['date']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body panel-csm">
                        <div>
                            <p><?php echo $result['message']; ?></p>                         
                        </div>
                    </div>

                    <div class="border-bottom border-left border-right bg-white mg-tb-15">
                        <p class="m-b-md">
                            <span><i class="fa fa-paperclip"></i> 3 attachments - </span>
                            <a href="#" class="btn btn-default btn-xs">Download all in zip format <i class="fa fa-file-zip-o"></i> </a>
                        </p>

                        <div>
                            <div class="row">
                                <div class="col-sm-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="hpanel">
                                        <div class="panel-body file-body incon-ctn-view">
                                            <i class="fa fa-file-pdf-o text-info"></i>
                                        </div>
                                        <div class="panel-footer">
                                            <a href="#">Document_2016.doc</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="hpanel">
                                        <div class="panel-body file-body incon-ctn-view">
                                            <i class="fa fa-file-audio-o text-warning"></i>
                                        </div>
                                        <div class="panel-footer">
                                            <a href="#">Audio_2016.doc</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="hpanel">
                                        <div class="panel-body file-body incon-ctn-view">
                                            <i class="fa fa-file-excel-o text-success"></i>
                                        </div>
                                        <div class="panel-footer">
                                            <a href="#">Sheets_2016.doc</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="panel-footer text-right">
                        <div class="btn-group">
                            <a href="replymsg.php?msgid=<?php echo $result['id']; ?>"><button class="btn btn-default"><i class="fa fa-reply"></i> Reply</button></a>
                            <button class="btn btn-default"><i class="fa fa-arrow-right"></i> Forward</button>
                            <button class="btn btn-default"><i class="fa fa-print"></i> Print</button>
                            <a onclick="return confirm('Are you sure to trash this mail ?')" href="mailbox-trash.php?trashid=<?php echo $result['id']; ?>"><button class="btn btn-default"><i class="fa fa-trash-o"></i> Remove</button></a>
                        </div>
                    </div>
                </div>
                <?php } } ?>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
