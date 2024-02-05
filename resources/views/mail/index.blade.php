<?php
$home = URL::to('/');
?>

<div class="container-fluid">
    <h2><span class="text-success">CONGRATULATIONS!</span></h2>
    <span>YOU HAVE SUCCESSFULLY REGISTERED TO THE SLSU ONLINE ADMISSION!</span>

    <span>
        <br><br>
        NAME: <b>{{ mb_strtoupper($email_data['FirstName'] . ' ' . $email_data['LastName']) }}</b><br>
        MESSAGE: <b>{{ mb_strtoupper($email_data['Message']) }}</b>
    </span>
    <br><br>
    <div>NEXT STEPS TO DO:
        <ol>
            <li class="li">Login to your account. <a target = "_blank" href="{{ $home }}">CLICK HERE</a></li>
            <li class="li">Complete the registration process by verifying your email and contact number.</li>
            <li class="li">Upload the required documents.</li>
            <li class="li">Upload a copy of your 2x2 picture with white background and nametag</li>
        </ol>
    </div>
</div>
