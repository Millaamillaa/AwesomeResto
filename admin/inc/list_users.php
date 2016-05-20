<?php

$getUsers = $db->prepare('SELECT * FROM users');
$getUsers->execute();
$users = $getUsers->fetchAll(PDO::FETCH_ASSOC);
if(!empty($users)) {
    $count = 1;
    echo '<ul class="list-group">';
    // loop that prints all the users
    foreach ($users as $key => $value) {
        echo '<li class="list-group-item">' .
             $count . '. '                   .
             $value['firstname']            .
             ' <span class="label '         .
             // condition to check $value role: if role is admin print label-success, else print label-primary
             (($value['role'] == "admin")?"label-success":"label-primary") .
             '">'                           .
             $value['role']                 .
             '</span></li>';
             $count++;
    }
    echo '</ul>';
}
else {
    echo '<div class="alert alert-info" role="alert">Il n\'y a pas d\'utilisateurs</div>';
}

?>
