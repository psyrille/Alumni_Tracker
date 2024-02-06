<?php
$home = URL::to('/');
?>

<div class="container-fluid">
    <h2><span class="text-success">Account Disapproved.</span></h2>
    

    <span>
        <br><br>
        NAME: <b>{{ mb_strtoupper($email_data['FirstName'] . ' ' . $email_data['LastName']) }}</b><br>
        MESSAGE: <b>{{ mb_strtoupper($email_data['Message']) }}</b>
    </span>
    <br><br>
    
</div>
