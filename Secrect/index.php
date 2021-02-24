<?php
ob_start();
session_start();
    function loginForm(){
        $loginName = <<<EOF
            <div id="loginform" >
                <form action="index.php" method="POST">
                   
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" placeholder="Nhập tên bạn Ekk...." />
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
            echo '<span class="error">Nhập tên bạn êk? </span>';
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
        <link rel="stylesheet" href="collect.css" type="text/css">

        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

            
           

        <!-- -------------------------------------------------------- -->
        <!-- -------------------------------------------------------- -->
        <!-- -------------------------------------------------------- -->
        <!-- -------------------------------------------------------- -->
        <!-- -------------------------------------------------------- -->
        <?php
        if(!isset($_POST["name"])){
            loginForm();
        }else{
        ?>
        <p id="a6">Bộ sưu tập mùa xuân</p>
         <div class="slideshow-container">
              <div class="mySlides fade">
                <div class="numbertext">1 / 15--------------------</div>
                <img src="../images/img/1.jpg" style="width:100%">
                <div class="text"></div>
              </div>
              <div class="mySlides fade">
                <div class="numbertext">2 / 15</div>
                <img src="../images/img/2.jpg" style="width:100%">
                <div class="text"></div>
              </div>
              <div class="mySlides fade">
                <div class="numbertext">3 / 15</div>
                <img src="../images/img/3.jpg" style="width:100%">
                <div class="text"></div>
              </div>
              <div class="mySlides fade">
                <div class="numbertext">4 / 15</div>
                <img src="../images/img/4.jpg" style="width:100%">
                <div class="text"></div>
              </div>
              <div class="mySlides fade">
                <div class="numbertext">5 / 15</div>
                <img src="../images/img/5.jpg" style="width:100%">
                <div class="text"></div>
              </div>
              <div class="mySlides fade">
                <div class="numbertext">6 / 15</div>
                <img src="../images/img/6.jpg" style="width:100%">
                <div class="text"></div>
              </div>
              <div class="mySlides fade">
                <div class="numbertext">7 / 15</div>
                <img src="../images/img/7.jpg" style="width:100%">
                <div class="text"></div>
              </div>
              <div class="mySlides fade">
                <div class="numbertext">8 / 15</div>
                <img src="../images/img/8.jpg" style="width:100%">
                <div class="text"></div>
              </div>
              <div class="mySlides fade">
                <div class="numbertext">9 / 15</div>
                <img src="../images/img/9.jpg" style="width:100%">
                <div class="text"></div>
              </div>
              <div class="mySlides fade">
                <div class="numbertext">10 / 15</div>
                <img src="../images/img/10.jpg" style="width:100%">
                <div class="text"></div>
              </div>
              <div class="mySlides fade">
                <div class="numbertext">11 / 15</div>
                <img src="../images/img/11.jpg" style="width:100%">
                <div class="text"></div>
              </div>
              <div class="mySlides fade">
                <div class="numbertext">12 / 15</div>
                <img src="../images/img/12.jpg" style="width:100%">
                <div class="text"></div>
              </div>
              <div class="mySlides fade">
                <div class="numbertext">13 / 15</div>
                <img src="../images/img/13.jpg" style="width:100%">
                <div class="text"></div>
              </div>
              <div class="mySlides fade">
                <div class="numbertext">14 / 15</div>
                <img src="../images/img/14.jpg" style="width:100%">
                <div class="text"></div>
              </div>
              <div class="mySlides fade">
                <div class="numbertext">15 / 15</div>
                <img src="../images/img/15.jpg" style="width:100%">
                <div class="text"></div>
              </div>





    
              <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
              <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>


            <div style="text-align:center">
              <span class="dot" onclick="currentSlide(1)"></span>
              <span class="dot" onclick="currentSlide(2)"></span>
              <span class="dot" onclick="currentSlide(3)"></span>
              <span class="dot" onclick="currentSlide(4)"></span>
              <span class="dot" onclick="currentSlide(5)"></span>
              <span class="dot" onclick="currentSlide(6)"></span>
              <span class="dot" onclick="currentSlide(7)"></span>
              <span class="dot" onclick="currentSlide(8)"></span>
              <span class="dot" onclick="currentSlide(9)"></span>
              <span class="dot" onclick="currentSlide(10)"></span>
              <span class="dot" onclick="currentSlide(11)"></span>
              <span class="dot" onclick="currentSlide(12)"></span>
              <span class="dot" onclick="currentSlide(13)"></span>
              <span class="dot" onclick="currentSlide(14)"></span>
              <span class="dot" onclick="currentSlide(15)"></span>

            </div>
        <!-- ----11111111111111111111111111111111111111111111111 -->
        <div id="wrapper">
        
        <div id="menu">
            <p class="welcome">ChatBox<img id="icon"src="../images/man-angry.png"><b><?php echo $_SESSION['name']; ?></b></p>
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
                        // var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
                        $.ajax({
                            url: "log.html",
                            cache: false,
                            success: function(html){        
                                $("#chatbox").html(html); 
                                // var newscrollHeight=$("#chatbox").attr("scrollHeight");
                                // if(newscrollHeight>oldscrollHeight){
                                //     $("#chatbox").animate({scrollTop:newscrollHeight})
                                // }              
                            },
                        });
                    }
                    setInterval (loadLog, 1000);




                    // -------
                    var slideIndex = 1;
                        showSlides(slideIndex);

                        // Next/previous controls
                        function plusSlides(n) {
                          showSlides(slideIndex += n);
                        }

                        // Thumbnail image controls
                        function currentSlide(n) {
                          showSlides(slideIndex = n);
                        }

                        function showSlides(n) {
                          var i;
                          var slides = document.getElementsByClassName("mySlides");
                          var dots = document.getElementsByClassName("dot");
                          if (n > slides.length) {slideIndex = 1}
                          if (n < 1) {slideIndex = slides.length}
                          for (i = 0; i < slides.length; i++) {
                              slides[i].style.display = "none";
                          }
                          for (i = 0; i < dots.length; i++) {
                              dots[i].className = dots[i].className.replace(" active", "");
                          }
                          slides[slideIndex-1].style.display = "block";
                          dots[slideIndex-1].className += " active";
                        }
                    //-------
        </script>
        <?php
        }
        ?>
        
    </body>
</html>
