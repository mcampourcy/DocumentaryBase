<?php
//$cat_id = $viewData['cat_id'];
//$subcat_id = $viewData['subcat_id'];
$page = $viewData['page'];
//header
if(($page != 'mediaPost') && ($page != 'mediasDocument')){
    require_once PRIVATE_ROOT.'core/views/templates/headerView.php';
    //menu
    echo $viewData['menu'];
    ?>
    <div id="page-wrapper">
    <?php
}//endif
?>
    <?= $viewData['content']; ?>
<?php
if($page != 'mediaPost'){
    ?>
    </div>
    <?php
    require_once PRIVATE_ROOT . 'core/views/templates/footerView.php';
}//endif