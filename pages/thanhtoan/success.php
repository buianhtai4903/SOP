<?php 
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    if ( isset($_GET['vnp_ResponseCode']) && $_GET['vnp_ResponseCode'] == '00'|| isset($_GET['resultCode']) && $_GET['resultCode'] == '00') 
    {
        header('Location: ../thanhtoan/success_result.php');
    }
    else {
    
    }
    exit();
}
?>