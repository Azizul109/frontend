<?php 

    if(isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['education'], $_POST['country'])){
        echo '</br> Your name is </br> '. $_POST['name'];
        echo '</br> Your email is </br> '. $_POST['email'];
        echo '</br> Your phone is </br> '. $_POST['phone'];
        echo '</br> Your degree is </br>'. $_POST['education'];
        echo '</br> Your country name is </br>'. $_POST['country'];
    }

?>

</body>
</html>