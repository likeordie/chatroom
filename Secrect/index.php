<?php
ob_start();
session_start();
    function loginForm(){
        $loginName = <<<EOF
            <div id="loginform" >
                <form action="index.php" method="POST">
                    <p>Please enter your name to continue: </p>
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" />
                    <input type="submit" name="enter" id="enter" value="Enter" />
                </form>
            </div>
        EOF;
        echo $loginName;
        
    }
    if(isset($_POST['enter'])){
        if($_POST['name']!=""){
            $_SESSION['name']=stripcslashes(htmlspecialchars($_POST['name']));
        }else{
            echo '<span class="error">Please type your name? </span>';
        }
    }
    if(isset($_GET['logout'])){ 
     
        //Simple exit message
        $fp = fopen("log.html", 'a');
        fwrite($fp, "<div class='msgln'><i>User ". $_SESSION['name'] ." has left the chat session.</i><br></div>");
        fclose($fp);
         
        session_destroy();
        header("Location: index.php"); //Redirect the user
    }

 
?>
<!DOCTYPE html>
<html>
    <head> 
        
        <meta charset="UTF-8">
        <title>Chat room</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        
        <?php
        if(!isset($_POST["name"])){
            loginForm();
        }else{
        ?>
        <div id="wrapper">
        <div id="menu">
            <p class="welcome">Welcome, <b><?php echo $_SESSION['name']; ?></b></p>
            <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
            <div style="clear:both"></div>
        </div>    
        <div id="chatbox"><?php
        if(file_exists("log.html") && filesize("log.html") > 0){
            $handle = fopen("log.html", "r");
            $contents = fread($handle, filesize("log.html"));
            fclose($handle);
             
            echo $contents;
        }
        ?></div>
         
        <form name="message" action="">
            <input name="usermsg" type="text" id="usermsg" size="63" />
            <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
        </form>
        </div>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
        <script type="text/javascript">
        // jQuery Document
    
                  $(document).ready(function(){
                        //If user wants to end session
                        $("#exit").click(function(){
                            var exit = confirm("Are you sure you want to end the session?");
                            if(exit==true){window.location = 'index.php?logout=true';}      
                        });
                    });
                    $("#submitmsg").click(function(){   
                        var clientmsg = $("#usermsg").val();
                        $.post("post.php", {text: clientmsg});              
                        $("#usermsg").attr("value", "");
                        return false;
                    });
                    function loadLog(){     
                        var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
                        $.ajax({
                            url: "log.html",
                            cache: false,
                            success: function(html){        
                                $("#chatbox").html(html); 
                                var newscrollHeight=$("#chatbox").attr("scrollHeight");
                                if(newscrollHeight>oldscrollHeight){
                                    $("#chatbox").animate({scrollTop:newscrollHeight})
                                }              
                            },
                        });
                    }
                    setInterval (loadLog, 1000);
                    // function loadlog(){
                    //     $.ajax({
                    //         url:"log.html",
                    //         cache:false;
                    //         success: function(html){
                    //             $("#chatbox").html(html);
                    //         }
                    //     });
                    // }

        </script>
        <?php
        }
        ?>

        <?php
         // $loginform= '
         //      <div id="wrapper">
         //        <div id="menu">
         //            <p class="wekcome">Welcome{$_POST['name']}-<b></b></p>
         //            <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
         //            <div style="clear: both;"></div>
         //        </div>
         //        <div id="chatbox">{

         //        }</div>
         //        <form name="message" action="">
         //            <input type="text" name="usermsg" id="usermsg" size="63">
         //            <input type="submit" name="submitmsg" id="submitmsg" value="Send" >
         //            </form>
         //    </div>
         //    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         //    <script type="text/javascript">
                    // $(document).ready(function(){
                    //     //If user wants to end session
                    //     $("#exit").click(function(){
                    //         var exit = confirm("Are you sure you want to end the session?");
                    //         if(exit==true){window.location = 'index.php?logout=true';}		
                    //     });
                    // });
                    // $("#submitmsg").click(function(){	
                    //     var clientmsg = $("#usermsg").val();
                    //     $.post("post.php", {text: clientmsg});				
                    //     $("#usermsg").attr("value", "");
                    //     return false;
                    // });
         //    </script>

         //    echo $loginform;
        ?>

       
        
        
    </body>
</html>
