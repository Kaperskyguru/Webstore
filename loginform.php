


<!DOCTYPE html>
<html lang='en'>
  <head>
    <link rel="stylesheet" href="css/main.css" />
  </head>
    <body>
        <button onclick="document.getElementById('id01')
        .style.display='block'"
        style="width:auto;">Login</button>
        
        <div id="id01" class="modal">
            
            <form class="modal-content animate"
                  action="action_page.php">
                
                <div class="imgcontainer"><span onclick="document.getElementById('id01')
                .style.display='none'"
                class="close" title="Close">&times;</span>
                
                <img src="img.jpg"
                alt="Avatar"
                class="avatar"></div>
                
                <div class="container" title="Registration Section">
                    <label><b>Username</b></label>
                    <input class="form-control" type="text" placeholder="Enter Username" name="uname" required>
                    
                    <label><b>Password</b></label>
                    <input class="form-control" type="password" placeholder="Enter Password" name="psw" required>
                    
                    <input class="form-control" type="submit" name="submit" value="Login" 
                    <input class="form-control" type="checkbox" checked="checked">
                    Remember me
                </div>
                
                <div class="container"
                     style="background-color: #f1f1f1">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'"
                            class="cancelbtn">Cancel</button>
                    <span class="psw">Forgot
                    <a href="#">Password?</a></span>
                </div>
            </form>
        </div>
        
        <script>
            
            //Get the modal
            
            var modal = document.getElementById('id01');
            
            // When the user clicks anywhere outside of the modal, close it.
            
            window.onclick = function(event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    </body>
</html>