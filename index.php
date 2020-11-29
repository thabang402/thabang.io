<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>
    
    <style type="text/css">
        [18:18, 28/11/2020] Iam The Melanin: :root{
    --font-color:#555;
    --font-hover-color:orange;
}
body{
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
    font-family:"Raleway", sans-serif;
    background-color:#627b8a;
}

.container{
    width:300px;
    box-shadow: 0 15px 35px rgba(50,50,93,.1),0 5px 15px rgba(0,0,0,.07);
    padding:2em;
    background-color:#fff;
}
.form-group{
    margin-bottom:1.5em;
    transition:all .3s;
}
.form-label{
    font-size:.75em;
    color:var(--font-color);
    display:block;
    opacity:0;
    transition: all .3s;
    transform:translateX(-50px);
}
.form-control{
    box-shadow:none;
    border-radius:0;
    border-color:#ccc;
    border-style:none none solid none;
    width:100%;
    font-size:1.25em;
    transition:all .6s;
}
.form-control::placeholder{
    color:#aaa;
}
.form-control:focus{
    box-shadow:none;
    border-color:var(--font-hover-color);
    outline:none;
}
.form-group:focus-within{
    transform:scale(1.1,1.1);
}

.form-control:invalid:focus{
    border-color:red;
}
.form-control:valid:focus{
    border-color:green;
}

.btn{
    background: 0 0 #fff;
    border:1px solid #aaa;
    border-radius:3px;
    color:var(--font-color);
    font-size:1em;
    padding:10 50px;
    text-transform:uppercase;
}
.btn:hover{
    border-color:var(--font-hover-color);
    color:var(--font-hover-color);
}
textarea{
    resize:none;
}



.focused > .form-label{
    opacity:1;
    transform:translateX(0px);

}
</style>
 <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="webform.css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
    <script src="main.js"></script>
</head>

<body>
    <div class="container" style="margin-top:100px;">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3" align="center">
                <input id="name" placeholder="Name" class="form-control">
                <input id="email" placeholder="Email" class="form-control">
                <input id="subject" placeholder="Subject" class="form-control">
                <textarea class="form-control" id="body" placeholder="Your Email"></textarea>
                <div class="g-recaptcha brochure__form__captcha" data-sitekey="6Lc0BvEZAAAAAKPG3hiMZtUU8bNcYBtnNU9hKSzj"></div>
                <input type="button" onclick="sendEmail()" value="Send An Email" class="btn btn-primary">
            </div>
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        if (response.status == "success")
                            alert('Email Has Been Sent!');
                        else {
                            alert('Please Try Again!');
                            console.log(response);
                        }
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>



<script src="https://www.google.com/recaptcha/api.js"></script>




</body>
</html>