<?php 
    session_start();
    $acc_file = "account.txt";
    $output = "";

    if(isset($_POST["txtus"])){
        $myfile = fopen($acc_file, "r") or die ("Unable to open file.");
        $sucess = false;
        while (!feof($myfile)) {
            $str = trim(fgets($myfile));
            if($str != ""){
                $arr = explode(",", $str);
                //explode ใช้แบ่งsting เป็นตัวๆ โดยที่นี้จะแบ่ง โดยใช้ , 

                if($arr[1] == $_POST["txtus"] && $arr[2] == $_POST["txtps"]) {
                    $sucess = true;
                    $_SESSION["name"] = $arr[0];
                    $output.="Login Success!";
                }
            }
        }
        fclose($myfile);
        if (!$sucess) $output.= "Wrong username or password.";
    }
    else $output.="Error: Not Found.";
    echo $output;
?>