<footer class="fclass">
    <?php include 'footer-widget.php'; ?>
    <!-- Scroll Top Button -->
    <button class="btn-scroll-top"><i class="ion-chevron-up"></i></button>

    <div class="footer-bottom">
        <div id="bottom-footer">
            <ul class="footer-link">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Work</a></li>
                <li><a href="#">Team</a></li>
                <li><a href="#">Pricing</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
             <?php 
                $tmOption = new ThemeOption();
                /**
                 * Show get copyright Value
                 */
                $getCPR = $tmOption->getCopyRightValue();
                if ($getCPR) {
                while ($result = $getCPR->fetch_assoc()) {
                ?>   
            <div class="copyright"><?php echo $result['copyright']; ?></div>
                <?php } } ?>
            <div class="footer-bottom-cms">
                <div class="footer-payment">
                    <ul>
                        <li class="mastero"><a href="#"><img alt="" src="assets/img/payment/mastero.jpg"></a></li>
                        <li class="visa"><a href="#"><img alt="" src="assets/img/payment/visa.jpg"></a></li>
                        <li class="currus"><a href="#"><img alt="" src="assets/img/payment/currus.jpg"></a></li>
                        <li class="discover"><a href="#"><img alt="" src="assets/img/payment/discover.jpg"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
