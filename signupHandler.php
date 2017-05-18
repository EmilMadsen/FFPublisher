<?php
session_start();

if (!isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["publisherName"]))
{
    header("location: login.php?error");
}

$email = $_POST['email'];
$password = $_POST['password'];
$publisherName = $_POST['publisherName'];

?>

Processing...

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/3.9.0/firebase.js"></script>
<script src="js/firebaseInit.js"></script>
<script src="js/myRedirect.js"></script>

<script>
        firebase.auth().createUserWithEmailAndPassword("<?php echo $email;?>", "<?php echo $password;?>").then(function(onResolve, onReject) {

            if(onResolve == null)
            {
                //header("location: signup.php?error");
            }
            if(onReject == null)
            {
                console.log("SUCCESS!");
                var user = firebase.auth().currentUser;
                //create User?



                console.log(user);
                writeUserData(user)

            }
        });

        var token;

        function writeUserData(user) {


            firebase.database().ref('users/' + user.uid).set({
                publisherName: "<?php echo $publisherName?>",
                role: "publisher"
            }).then(function(onResolve, onReject)
            {
                if(onResolve == null)
                {
                }
                if(onReject == null)
                {
                    firebase.auth().currentUser.getToken(/* forceRefresh */ false).then(function(idToken) {
                        // Send token to your backend via HTTPS
                        // ...
                        this.token = idToken;

                        post('/FFPublisher/loginHandler.php', {auth_token: this.token, publisherName: "<?php echo $publisherName?>"});

                    }).catch(function(error) {
                        // Handle error
                        console.log("ERROR WITH GET TOKEN");

                    });


                }
            });
        }

</script>
