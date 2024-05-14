<?php
    require_once('../../model/Delete/deleteGarage.php');
    $S_ID = $_GET['id'];
    
    Delete($S_ID);
    header('location: ../../View/Edit/EditGarageService.php');

?>