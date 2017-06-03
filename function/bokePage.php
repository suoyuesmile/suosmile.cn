<?php 
    include_once('Page.class.php');
    $page = new Page($_GET['i'], $_GET['c']);
    $data = $page->showPage();
    echo json_encode($data);
?>
