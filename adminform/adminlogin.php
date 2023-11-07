

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- <script src="jquery-latest.js"></script> -->
        <!-- Remember to include jQuery :) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

        <!-- jQuery Modal -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
        <title>Student Form</title>
        <style>
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }

        input[type=text]{
            width: 50%;
            margin: 8px 0;
            padding: 14px 20px;
        }

        input[type=button]{
            width: 50%;
            margin: 8px 0;
            padding: 14px 20px;
        }

        #questionerror,#answererror{
            display: block;
            color: red;
            margin: 5px 0 0 0;
        }

        .button {
            /* background-color: #4CAF50; */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }


        </style>
        <script>

            $(document).ready(function(){

            $("#submitbutton").click(function(ev) { 

            //validation
            username     = $("#username").val();
            password     = $("#password").val();

            //check variable
            check         = 0;

            $("#enterform").text("");
            $("#usernameerror").text("");
            $("#passworderror").text("");

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
            if(username == "" || password == "" ){
                check = 1;
                $("#enterform").text("enter all fields");
                // document.getElementById("enterform").textContent = "enter all fields";

            }


            //firstname validation
            if(username.length<3){
                check = 1;
                $("#usernameerror").text("enter username properly");
                // document.getElementById("fnameerror").textContent = "enter name properly";

            }

            //secondname validation
            if(password.length<3){
                check = 1;
                $("#passworderror").text("enter password properly");
                // document.getElementById("fnameerror").textContent = "enter name properly";

            }

            if(check == 1){
                return false;
            }


            //form submission
            
            var form = $("#myForm"); 
            var url = form.attr('action'); 
            $.ajax({ 
                type: "POST", 
                url: url, 
                data: form.serialize(), 
                success: function(data) {
                    if (data.status === "admin") {
                        window.location.href = "Faqform.php";
                    } else if (data.status === "notadmin") {
                        window.location.href = "Faqdisplay.php";
                    } else {
                        alert("Invalid credentials");
                        $('form :input:not(:button)').val('');
                    }
                },
                error: function(data) { 
                    alert("some Error"); 
                } 
            }); 
            }); 


            });

        </script>
    </head>
    <body>
        <h1>Login</h1>
        <div><span id="enterform"></span></div>
        <form id="myForm" method="post" action="adminloginbackend.php">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <span id="usernameerror"></span>
            <br>

            <label for="password">Password</label>
            <input type="text" id="password" name="password" required>
            <span id="passworderror"></span>
            <br>

            <input type="button" id="submitbutton" value="Submit Form">
        </form>
    </body>
</html>