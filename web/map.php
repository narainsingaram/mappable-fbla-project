<?php
    include("../template/navbar.php");

    // Update the SQL query to fetch additional fields
    $sql = "SELECT title, latitude, longitude, description, image FROM teacher_events WHERE latitude IS NOT NULL AND longitude IS NOT NULL";
    $result = $connection->query($sql);

    $events = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $events[] = $row;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map of Teacher Events</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #map {
            height: 100%;
            width: 100%;
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFq69d34t2H2ufrWFgwJYIjqPYZGoq03w"></script>
    <script>
        let map;
        let markers = [];

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 0, lng: 0},
                zoom: 2,
                streetViewControl: true // Enable Street View control
            });

            const events = <?php echo json_encode($events); ?>;

            events.forEach(event => {
                if (event.latitude && event.longitude) {
                    let position = {lat: parseFloat(event.latitude), lng: parseFloat(event.longitude)};
                    let marker = new google.maps.Marker({
                        position: position,
                        map: map,
                        title: event.title
                    });
                    markers.push(marker);

                    let infoWindow = new google.maps.InfoWindow({
                        content: `
                            <div>
                                <h3>${event.title}</h3>
                                <p><strong>Latitude:</strong> ${event.latitude}</p>
                                <p><strong>Longitude:</strong> ${event.longitude}</p>
                                <p><strong>Description:</strong> ${event.description}</p>
                                <p><img src="${event.image}" alt="${event.title}" style="max-width:100px;max-height:100px;"></p>
                            </div>
                        `
                    });

                    marker.addListener('click', () => {
                        infoWindow.open(map, marker);
                    });
                }
            });

            if (markers.length > 0) {
                let bounds = new google.maps.LatLngBounds();
                markers.forEach(marker => bounds.extend(marker.getPosition()));
                map.fitBounds(bounds);
            }

            // Request fullscreen for the map container
            document.getElementById('map').requestFullscreen();
        }
    </script>
</head>
<body onload="initMap()">
    <div id="map"></div>
</body>
</html>
