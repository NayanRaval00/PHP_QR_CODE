<?php 
include 'phpqrcode/qrlib.php';

function getUserNameFromEmail($email){
    $find = '@';
    //find a position no of @
    $positon = strpos($email, $find);
    //to create file name position index sudhi cut kari retur kare che substr(function)
    $usernmae = substr($email, 0, $positon);
    return $usernmae;
}
if (isset($_POST['submit'])) {
    $tempDir = 'temp/';
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    //create file name
    $filename = getUserNameFromEmail($email);
    $msg = $_POST['message'];

    $codeContents = 'mailto:'.$email.'?subject='.urldecode($subject).'&body='.urldecode($msg);

    QRcode::png($codeContents, $tempDir.''.$filename.' .png', QR_ECLEVEL_L, 5);
       
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cust/bootstrap.min.css">
    <title>Qr Code Genrater</title>
</head>
<style>
    body{
    background-color: orange;
}
</style>
<body>
    <div class="container">
        <form method="POST" class="form mt-5">
            <h3 style="color: black;">QR Genrator</h3>
            <div class="form-group input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Email </span>
                </div>
                <input required name="email" class="form-control" value="<?php ?>" placeholder="Email" type="email">
            </div>
            <div class="form-group input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Subject </span>
                </div>
                <input required name="subject" class="form-control" placeholder="Subject" pattern="[a-zA-Z .]+"
                    type="text">
            </div>
            <div class="form-group input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"> message </span>
                </div>
                <textarea required name="message" class="form-control" rows="10" cols="20"
                    pattern="[a-zA-Z0-9 .]+"></textarea>
            </div>

            <div class="form-group">

                <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Genrate QR CODE </button>
                <a hrref="download.php?filename=<?php echo $filename;?>" name="submit" class="btn btn-info btn-lg btn-block">Download QR CODE </a>
            </div>
        </form>
    </div>
</body>

</html>