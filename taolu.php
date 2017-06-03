<?php 
    include_once('function/Page.class.php');
    $page = new Page($_GET['n'], 'HTML');
    $data = $page->showPage();
    echo json_encode($data);
?>
