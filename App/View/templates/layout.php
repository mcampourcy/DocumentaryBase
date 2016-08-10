<?php
$filename = substr(key($datas), 0, -4);
require_once TEMPLATE_ROOT.'headerView.php';

echo $viewData['menu'];
echo $viewData['content'];

require_once TEMPLATE_ROOT.'footerView.php';