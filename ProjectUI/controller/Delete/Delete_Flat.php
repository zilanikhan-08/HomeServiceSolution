<?php
    require_once('../../model/Delete/deleteFlat.php');
    $S_ID = $_GET['id'];
    
    Delete($S_ID);
    header('location: ../../View/Edit/EditFlat.php');

?>