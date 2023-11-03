
<?php 
session_start();
if(!isset($_SESSION['username'])){
    header('Location: adminlogin.php');
    exit();
}

?>
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
            question     = $("#question").val();
            answer       = $("#answer").val();

            //check variable
            check         = 0;

            $("#enterform").text("");
            $("#questionerror").text("");
            $("#answererror").text("");

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
            if(question == "" || answer == "" ){
                check = 1;
                $("#enterform").text("enter all fields");
                // document.getElementById("enterform").textContent = "enter all fields";

            }


            //firstname validation
            if(question.length<3){
                check = 1;
                $("#questionerror").text("enter question properly");
                // document.getElementById("fnameerror").textContent = "enter name properly";

            }

            //secondname validation
            if(answer.length<3){
                check = 1;
                $("#answererror").text("enter answer properly");
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
                      
                    // Ajax call completed successfully 
                    alert("Form Submited Successfully"); 
                    $('form :input:not(:button)').val('');

                }, 
                error: function(data) { 
                      
                    // Some error in ajax call 
                    alert("some Error"); 
                } 
            }); 
            }); 


            });

        </script>
    </head>
    <body>
        <h1>Faq Form</h1>
        <div><span id="enterform"></span></div>
        <form id="myForm" method="post" action="Faqformbackend.php">
            <label for="question">Question</label>
            <input type="text" id="question" name="question" required>
            <span id="questionerror"></span>
            <br>

            <label for="answer">Answer</label>
            <input type="text" id="answer" name="answer" required>
            <span id="answererror"></span>
            <br>

            <input type="button" id="submitbutton" value="Submit Form">
        </form>
    </body>
</html>