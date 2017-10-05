<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <title>Document</title>

	<script>
        // initialize and setup facebook js sdk
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '219911391845666',//Change this
                xfbml      : true,
                version    : 'v2.10'
            });
            FB.getLoginStatus(function(response) {
                if (response.status === 'connected') {
                    console.log('you are connected');
                } else {
                    console.log('you are not connected');
                }
            });
        };
        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        // login with facebook
        function login() {
            FB.login(function(response) {
                if (response.status === 'connected') {
                    console.log('you are connected');
                    console.log("resposta do login:", response);
                    console.log("token", response.authResponse.accessToken);
                } else {
                    console.log('you are not connected');
                }
            });
        }

        function getFoto() {
            FB.api("/me?fields=name, picture.height(700)", function(response) {

                console.log("resposta: ", response);
                $(document).ready(function () {
                    $('#picture').val(response.picture.data.url);
                    $('#name').val(response.name);
                    $('#formulario').submit();
                });

            });
        }


	</script>


</head>
<body>
<form action="/img" method="post" id="formulario">
	<input type="hidden" name="name" id="name">
	<input type="hidden" name="picture" id="picture">
	<input type="button" value="Enviar" onclick="login()">
</form>


<p id="status"></p>



</body>
</html>