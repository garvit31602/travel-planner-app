 <?php 
        $servername="localhost";
        $username= "root";
        $password= "garvit2002";
        $dbname= "login-system";
        $conn = mysqli_connect($servername, $username, $password,$dbname);
        if (!$conn){
            die("Connection failed<br>". mysqli_connect_error());
        }
?>