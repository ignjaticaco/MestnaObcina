<html>
    <head>
        <meta charset="UTF-8">
        <meta name="google-signin-client_id" content="548013672380-r075g6cgqk4ekjgikkktmimk1qlo90r0.apps.googleusercontent.com">
        <title>index</title>
        <?php
        require 'steamauth/steamauth.php';
        ?>
        <script src="https://apis.google.com/js/platform.js"></script>
        <script>
        function onSignIn(googleUser) 
        {
            var id_token = googleUser.getAuthResponse().id_token;
            
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'http://localhost/MestnaObcina/google_oauth_sign_in.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() 
            {
                console.log(xhr.responseText);
                if(xhr.status === 200)
                {
                    var auth2 = gapi.auth2.getAuthInstance();
                    auth2.signOut().then(function ()
                    {
                        console.log('User signed out.');
                    });
            
                    auth2.disconnect();
                    window.location.replace("rent.php");
                }
                else 
                {
                    window.alert(xhr.responseText);
                }
            };
            xhr.send('idtoken=' + id_token);   
        };
        
        </script>
    </head>
    <body>
        <script>
            function checkLoginState()
            {
                FB.getLoginStatus(function(response) 
                {
                    console.log('statusChangeCallback');
                    console.log(response);
                    if (response.status === 'connected')
                    {
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', 'http://localhost/MestnaObcina/facebook_user_profile.php');
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhr.onload = function()
                        {
                            console.log(xhr.responseText);
                            if(xhr.status === 200)
                            {
                                FB.logout(function(response)
                                {
                                    
                                });
                                window.location.replace("rent.php");
                                
                            }
                            else 
                            {
                                window.alert(xhr.responseText);
                            }
                        };
                        xhr.send('idtoken=' + response.authResponse.accessToken);
                    }
                    else
                    {
                        document.getElementById('status').innerHTML = 'Please log ' +
                        'into this app.';
                    }
                });
            }
            
            window.fbAsyncInit = function() 
            {
                FB.init
                ({
                    appId      : '117324138939152',
                    cookie     : true,
                    xfbml      : true,
                    version    : 'v2.8'
                });
            };
            
            (function(d, s, id)
            {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
            var finished_rendering = function()
            {
                console.log("finished rendering plugins");
                var spinner = document.getElementById("spinner");
                spinner.removeAttribute("style");
                spinner.removeChild(spinner.childNodes[0]);
            };
        </script>
        <script>
            
        </script>
            <table>
                <tr><td><div class="g-signin2" data-onsuccess="onSignIn" data-cookiepolicy='single_host_origin'></div></td><td><fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button></div></td><td><?php echo loginbutton();?></td><td><a href="odjava.php">Odjava</a></tr>
            </table>
        </form>
    </body>
</html>
