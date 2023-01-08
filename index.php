<?php
include 'config.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <title>Map</title>
</head>

<body>
    <?php
    $sql = "SELECT * FROM stall";
    $result = mysqli_query($conn, $sql);
    ?>
    <div class="row m-auto">
        <div class="col-md-6 border shadow m-auto mt-5 p-0" id="map" style="position: relative;">
            <?php
            //Pins
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<p class="stallname m-0 p-1 border shadow text-center bg-white" data-bs-toggle="modal" data-bs-target="#detailsModal' . $row['stall_ID'] . '"style="position: absolute; left: ' . $row['latitude'] . '%; top: ' . ($row['longitude'] - 8) . '%; cursor:pointer;">' . $row['stall_name'] . '</p>';
                echo '<img src="img/pin.png" class="pin" style="position: absolute; left: ' . ($row['latitude'] - 0.78) . '%; top: ' . ($row['longitude'] - 3) . '%;">';

            ?>
                <!--Details Modal -->
                <div class="modal fade" id="detailsModal<?= $row['stall_ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="detailsModal<?= $row['stall_ID'] ?>"><?= $row['stall_name'] ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <img class="fit-image img-fluid" src="img/map.png" id="mapimage">
        </div>
    </div>
    <div class="row m-auto mt-2">
        <div class="col-md-6 m-auto p-0">
            <button type="button" class="btn btn-primary float-end" id="mark"><i class="fa fa-map-pin"></i>
                Mark
            </button>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Map</h5>
                </div>
                <div class="modal-body">
                    <form method="post" action="addmap.php">

                        <!-- Map ID -->
                        <input type="hidden" name="map_id" value="1">
                        <!-- Market ID -->
                        <input type="hidden" name="market_admin_id" value="2">
                        <!-- Vendor ID -->
                        <input type="hidden" name="vendor_id" value="3">

                        <div class="form-group mb-2">
                            <label>Stall Name</label>
                            <input class="form-control" placeholder="Enter your stall name" name="stall_name" required>
                        </div>
                        <div class="form-group mb-2">
                            <label>Latitude</label>
                            <input id="latitude" class="form-control" name="latitude">
                        </div>
                        <div class="form-group">
                            <label>Longitude</label>
                            <input id="longitude" class="form-control" name="longitude">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="addmap" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="jquery-3.6.0.min.js"></script>
<script src="function.js"></script>
<script>
    $(document).ready(function() {
        $("#mark").on("click", function() {
            if ($(this).text() == "Marking") {
                $(this).text("Mark");
                $("#mapimage").off("click");
                $("#mapimage").css("cursor", 'auto');
                $(".stallname").css("display", 'block');
            } else {
                $(this).text("Marking");
                $("#mapimage").css("cursor", 'pointer');
                $(".stallname").css("display", 'none');
                $("#mapimage").on("click", function(event) {
                    var x = event.pageX;
                    var y = event.pageY;
                    // Get the position and size of the image
                    var imageOffset = $('#mapimage').offset();
                    var imageWidth = $('#mapimage').width();
                    var imageHeight = $('#mapimage').height();
                    // Calculate the percentage of the coordinates
                    var xPercent = (x - imageOffset.left) / imageWidth * 100;
                    var yPercent = (y - imageOffset.top) / imageHeight * 100;
                    // Set the coordinates in the input fields
                    $('#latitude').val(xPercent);
                    $('#longitude').val(yPercent);
                    $('#exampleModal').modal('show');
                });
            }
        });
    });
</script>

</html>