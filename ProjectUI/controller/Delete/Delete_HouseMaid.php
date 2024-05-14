<?php
    require_once('../../model/Delete/deleteHouseMaid.php');
    $S_ID = $_GET['id'];

    Delete($S_ID);

    header('location: ../../View/Edit/EditHouseMaid.php');

?>