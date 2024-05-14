<?php
    require_once('../../model/Delete/deleteMovers.php');
    $S_ID = $_GET['id'];

    Delete($S_ID);

    header('location: ../../View/Edit/EditMoverService.php');

?>
