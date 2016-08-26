<?php
    require_once("../includes/database.php");
?>

<?php
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if(mysqli_connect_errno())
    {
        die("Database connection failed " .
                    mysqli_connect_error() .
                    " (" . mysqli_connect_errno() .
                    ")");
    }
?>

<?php
    $institute_id = $_GET["id"];
    echo $institute_id;
?>

<?php
    $query = "SELECT * FROM markers WHERE marker_id = {$institute_id}";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $marker_id = $row["marker_id"];
    $name = $row["name"];
    $address = $row["address"];
    $lat = $row["lat"];
    $lng = $row["lng"];
    $type = $row["type"];
    //echo $lat;
?>
<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Google Maps Multiple Markers</title> 
  <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
</head> 
<body>
  <div id="map" style="width: 300px; height: 250px;"></div>

  <script type="text/javascript">
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

      marker = new google.maps.Marker({
        position: new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>),
        map: map
      });

      (function(marker, i) {
        // add click event
        google.maps.event.addListener(marker, 'click', function() {
            infowindow = new google.maps.InfoWindow({
                content: '<?php echo $name; ?>'
            });
            infowindow.open(map, marker);
        });
    })(marker, i);
    
  </script>
</body>
</html>
