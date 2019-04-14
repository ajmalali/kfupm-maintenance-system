<?php
    const DBHOST = 'localhost';
    const DBNAME = 'Maintenance';
    const DBUSER = 'root';
    const DBPASSWORD = '';

    $link = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME) OR DIE('Unable to connect to database! Please try again later.');
