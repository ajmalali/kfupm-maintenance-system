<?php
    require_once('../../config.php');

    session_start();
    $userID = $_SESSION['id'];

    $sql = "SELECT * FROM user NATURAL JOIN requester WHERE id = $userID";

    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_array($result);
        $name = $row['name'];
        echo "<div class=\"form-group\">
                        <label for=\"name\">Name</label>
                        <input type=\"text\" class=\"form-control\" id=\"name\" value='$name'>
                    </div>";
        $id = $row['id'];
        echo "<div class=\"form-group\">
                        <label for=\"id\">ID</label>
                        <input type=\"text\" class=\"form-control\" id=\"id\" value='$id'>
                    </div>";
        $email = $row['email'];
        echo "<div class=\"form-group\">
                        <label for=\"email\">Email</label>
                        <input type=\"text\" class=\"form-control\" id=\"email\" value='$email'>
                    </div>";
        $mobile = $row['mobile'];
        echo "<div class=\"form-group\">
                        <label for=\"mobile\">Mobile Number</label>
                        <input type=\"text\" class=\"form-control\" id=\"mobile\" value='$mobile'>
                    </div>";
        $pass = $row['password'];
        echo "<div class=\"form-group\">
                        <label for=\"pass\">Password</label>
                        <input type=\"text\" class=\"form-control\" id=\"pass\" value='$pass'>
                    </div>";
    }
