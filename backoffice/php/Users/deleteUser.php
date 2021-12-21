<?php 
function deleteUser($id){
    //deletes a user
    global $dbh;
    $sql = "DELETE FROM `users` WHERE id=?";
    $sth = $dbh->prepare($sql);
    $sth->execute([$id]);
}
?>