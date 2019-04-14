<!--Services Offered-->
<div class="container" id="services-offered">
    <div class="row">
        <div class="col-md-12 mb-5">
            <h2 class="display-4">Services Offered</h2>
            <hr>
            <p>We offer the following services</p>
            <div class="row">
                <?php
                    include_once('config.php');

                    $sql = "SELECT name, image, description FROM servicetype";
                    $result = mysqli_query($link, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            $name = $row['name'];
                            $image = $row['image'];
                            $description = $row['description'];

                            echo "<div class=\"col-lg-4 col-md-6 col-sm-12 mb-4\">
                                <div class=\"card\">
                                    <img src=\"$image\" class=\"card-img-top\" alt=\"...\">
                                             <div class=\"card-body text-center\">
                                    <h5 class=\"card-title\">$name</h5>
                                    <p class=\"card-text\">$description.</p>
                                    <div class=\"text-center\">
                                        <a href=\"#\" class=\"btn btn-primary col-md-8 mt-3\">Request Service</a>
                                    </div>
                                </div>
                            </div>
                        </div>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>
