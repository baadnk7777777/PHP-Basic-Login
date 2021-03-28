<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">

        <?php 
        if(!isset($_SESSION["name"])){
    ?>
        <a href="" data-toggle="modal" data-target="#modalSignup">Sign Up</a>
        <a href="" data-toggle="modal" data-target="#modallogin">Login</a>

        <?php 
        }else{
    ?>
        <a href=""><?php echo $_SESSION["name"]; ?></a>
        <a href="logout.php">Logout</a>

        <?php 
        }
    ?>

        <div class="Show">
            <div class="container-fluid">
                <?php 
                        if(isset($_SESSION["name"])){

                        
                    ?>

                <?php 
                        $myfile = fopen("account.txt","r") or die ("Unable to open file!.");

                        while(!feof($myfile)){
                            $str = fgets($myfile);
                            $arr ="";
                            if($str != "" ) {
                                $arr = explode(',', $str);
                                echo $arr[0] ;
                                echo "<br>";
                            }
                        }
                        fclose($myfile);
                    ?>

                <?php 
                        }
                    ?>
            </div>
        </div>



    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalSignup">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="frmsignup" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title  ">Signup</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="modalBodysignip">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtname" placeholder="Fullname" require>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtus" placeholder="Username" require>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="password" class="form-control" name="txtps" placeholder="Password" require>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer" id="footermodalsignup">
                        <button type="Submit" class="btn btn-primary" value="Submit">Submit</button>
                        <button type="reset" class="btn btn-secondary" value="Reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modallogin">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="frmlogin" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title  ">Login</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="modalBodylogin">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtus" placeholder="Username" require>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="password" class="form-control" name="txtps" placeholder="Password" require>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer" id="footermodallogin">
                        <button type="Submit" class="btn btn-primary" value="Submit">Submit</button>
                        <button type="reset" class="btn btn-secondary" value="Reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script>
    $(function() {
        $("#frmlogin").submit(function() {
            console.log("Submit Pass");
            event.preventDefault();
            $.ajax({
                url: "login.php",
                type: "POST",
                data: $('form#frmlogin').serialize(),
                success: function(data) {
                    console.log("data:" + data);
                    $("#modalBodylogin").html(data);
                    var btnClose =
                        '<button type="button" class="btn btn-success" data-dismiss="modal"> Close </button>';
                    $("#footermodallogin").html(btnClose);
                }
            });
        });
    });

    $(function() {
        $("#frmsignup").submit(function() {
            console.log("Submit Pass");
            event.preventDefault();
            $.ajax({
                url: "signup.php",
                type: "POST",
                data: $('form#frmsignup').serialize(),
                success: function(data) {
                    console.log("data:" + data);
                    $("#modalBodysignip").html(data);
                    var btnClose =
                        '<button type="button" class="btn btn-success" data-dismiss="modal"> Close </button>';
                    $("#footermodalsignup").html(btnClose);
                },
                error: function(data) {
                    console.log('An error occurred.');
                    console.log(data);
                }
            });
        });
    });

    $(function() {
        $("#modallogin,#modalSignup").on("hidden.bs.modal", function() {
            location.reload();
        });
    });
    </script>
</body>

</html>