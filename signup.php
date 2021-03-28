<?php 
     session_start();
    $acc_file = "account.txt";
     $output="";
   // $output.= var_dump($_POST);
    
    if (isset($_POST["txtus"])) {
        $myfile = fopen($acc_file, "a+") or die ("Unable to open file.");
        $txt = $_POST["txtname"].",".$_POST["txtus"].",".$_POST["txtps"]."\n";
        $result = fwrite($myfile, $txt);
        fclose($myfile);

        if ($result == false) {
            $output.="Cannot Wite to file userLiset.txt";
        }
        else{
            $_SESSION["name"] = $_POST["txtname"];
            $output.= $_POST["txtname"]."Success Signup.";
        }
    }
    else $output.= "Error: Not Found.";
    echo $output;
?>