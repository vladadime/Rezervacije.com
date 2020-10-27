<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once "functions.php";

    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        
        $result = queryMysql("SELECT * FROM objects WHERE id = $id");
            
        if($result->num_rows) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $name = "<span> Ime: " . $row['name'] . "</span>";
            $wt = "<span> Radno vreme: " . $row['time'] . "</span>";
            $contact = "<span> Kontakt: " . $row['contact'] . "</span>";
            $address = "<span> Adresa: " . $row['address'] . "</span>";
            $more = "<a class='btn' href='object.php?id=" . $row['id'] . "'>Vidi još</a>";
    
            echo "$name <br> $wt <br> $contact <br> $address <br> <br> $more";
        }
    }

}