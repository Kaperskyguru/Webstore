
<?php require('./include/head.php');?>
		<br />
	  <div class="container">   
		<div class="col-sm-9">
		  <div class="well"   style="margin-top: 0px; margin-left: 14px; margin-right: 14px; margin-top: -16px;">
			<h4 style="text-decoration: underline;">Account Control Panel</h4>
			<p>Hello User,</p>
			<p>From your account dashboard, you have the ability to view your account and update your account
			information. Select a link below to view or edit your information.</p>
		  </div>   
        <body>
 <input type="button" value="Hide" id="toggle_message" />
 <p id="message">You can see this paragraph</p>
 <script>
    $('#toggle_message').click(function () {
        var value= $('#toggle_message').attr('value');
        $('#message').toggle('fast');
        
        if (value == 'Hide') {
            $('#toggle_message').attr('value','Show');
        } else if (value == 'Show') {
            $('#toggle_message').attr('value','Hide');
        }
    });
 </script>
 
 <?php include('include/modal.php');?>
 
        </body>
    </html>