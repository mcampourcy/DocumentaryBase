<!--JAVASCRIPT-->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="<?=FO_URL?>js/metisMenu.min.js"></script>
<script src="<?=FO_URL?>js/jquery.fancybox.pack.js"></script>
<script src="<?=FO_URL?>js/summernote.min.js"></script>
<script src="<?=FO_URL?>js/sb-admin-2.js"></script>
<script src="<?=FO_URL?>js/init.js"></script>
<?php
if(file_exists(PUBLIC_ROOT.'js/'.$page.'.js')){
    ?>
    <script src="<?=FO_URL?>js/<?=$page?>.js"></script>
    <?php
}
?>
</body>
</html>