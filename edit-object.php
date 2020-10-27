<?php

//session_start();

require_once "menu.php";

if($_SESSION['user'] != "admin") {
    header("Location: index.php");
    die();
}

require_once "Functional/functions.php";
    
$id = $_GET['id'];

$result = queryMysql("SELECT * FROM objects WHERE id = $id");

if($result->num_rows) {
	$row1 = $result->fetch_array(MYSQLI_ASSOC);
}

$oname = $address  = $text = $contact = $wt = $tip = "";

$onameError = $contactError = $wtError = $textError = $tipError = $menuError = $addressError = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty($_POST["name"])) {
        $onameError = "Name is required";
    }
    else {
        $oname = $connection->real_escape_string($_POST["name"]);
    }

    if(empty($_POST["contact"])) {
        $contactError = "Contact is required";
    }
    else {
        $contact = $connection->real_escape_string($_POST["contact"]);
    }
    
    if(empty($_POST["time"])) {
        $wtError = "Work time is required";
    }
    else {
        $wt = $connection->real_escape_string($_POST["time"]);
    }
    
    if(empty($_POST["address"])) {
        $addressError = "Address is required";
    }
    else {
        $address = $connection->real_escape_string($_POST["address"]);
    }

    if(empty($_POST["tip"])) {
        $tipError = "Type is required";
    }
    else {
        $tip = $connection->real_escape_string($_POST["tip"]);
    }

    if(empty($_POST["text"])) {
        $textError = "About you is required";
    }
    else {
        $text = $connection->real_escape_string($_POST["text"]);
        $text = preg_replace("/\s\s+/", " ", $text);
    }
    
    if($onameError == "" && $contactError == "" && $textError == "" && $tipError == "") {
        
        queryMysql("UPDATE objet SET 
                        name='$oname', 
                        contact='$contact',  
                        address='$address',
                        time='$wt', 
                        text='$text'
                        WHERE id = $id");

        // $res = queryMysql("SELECT id FROM objects WHERE name = '$oname'");
        // $id = $res->fetch_assoc()['id'];
        
        // if(isset($_FILES['logo']['name'])) {
        //     if(!file_exists('images')) {
        //         mkdir('images');
        //     }
        //     $saveto = "images/$id.jpg";
        //     move_uploaded_file($_FILES['logo']['tmp_name'], $saveto);
        //     $typeok = true;
        
        //     switch ($_FILES['logo']['type']) {
        //         case 'image/gif':
        //             $src = imagecreatefromgif($saveto);
        //             break;
        //         case 'image/jpeg':
        //         case 'image/pjpeg':
        //             $src = imagecreatefromjpeg($saveto);
        //             break;
        //         case 'image/png':
        //             $src = imagecreatefrompng($saveto);
        //             break;
        //         default:
        //             $typeok = false;
        //             break;
        //     }
            
        //     if($typeok) {
        //         list($w, $h) = getimagesize($saveto);
        //         $max = 100;
        //         $tw = $w;
        //         $th = $h;
        
        //         if($w > $h) {
                    
        //             if($w > $max) {
        //                 $tw = $max;
        //                 $th = $max / $w * $h;
        //             }
        //             else {
        //                 $tw = $th = $max;
        //             }
                    
        //         }
        //         else{
                    
        //             if ($h > $max) {
        //                 $th = $max;
        //                 $tw = $max / $h * $w;
        //             }
        //             else {
        //                 $tw = $th = $max;
        //             }
        //         }
        
        //         $tmp = imagecreatetruecolor($tw, $th);
        //         imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tw, $th, $w, $h);
        //         imageconvolution($tmp, array(array(-1, -1, -1),
        //                                 array(-1, 16, -1),
        //                                 array(-1, -1, -1)),
        //                         8, 0);
        
        //         imagejpeg($tmp, $saveto);
        //         imagedestroy($tmp);
        //         imagedestroy($src);
        //     }
        // }

        // if(isset($_FILES['menu']['name'])) {
        //     if(!file_exists('images/menu')) {
        //         mkdir('images/menu');
        //     }
        //     $saveto = "images/menu/$id.jpg";
        //     move_uploaded_file($_FILES['menu']['tmp_name'], $saveto);
        //     $typeok = true;
        
        //     switch ($_FILES['menu']['type']) {
        //         case 'image/gif':
        //             $src = imagecreatefromgif($saveto);
        //             break;
        //         case 'image/jpeg':
        //         case 'image/pjpeg':
        //             $src = imagecreatefromjpeg($saveto);
        //             break;
        //         case 'image/png':
        //             $src = imagecreatefrompng($saveto);
        //             break;
        //         default:
        //             $typeok = false;
        //             break;
        //     }
            
        //     if($typeok) {
        //         list($w, $h) = getimagesize($saveto);
        //         $max = 100;
        //         $tw = $w;
        //         $th = $h;
        
        //         if($w > $h) {
                    
        //             if($w > $max) {
        //                 $tw = $max;
        //                 $th = $max / $w * $h;
        //             }
        //             else {
        //                 $tw = $th = $max;
        //             }
                    
        //         }
        //         else{
                    
        //             if ($h > $max) {
        //                 $th = $max;
        //                 $tw = $max / $h * $w;
        //             }
        //             else {
        //                 $tw = $th = $max;
        //             }
        //         }
        
        //         $tmp = imagecreatetruecolor($tw, $th);
        //         imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tw, $th, $w, $h);
        //         imageconvolution($tmp, array(array(-1, -1, -1),
        //                                 array(-1, 16, -1),
        //                                 array(-1, -1, -1)),
        //                         8, 0);
        
        //         imagejpeg($tmp, $saveto);
        //         imagedestroy($tmp);
        //         imagedestroy($src);
        //     }
        // }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Dodaj objekat</title>

    <link rel="stylesheet" href="css/add_object.css">
    <script src="javascript/jquery-3.3.1.js"></script>
</head>

<body>
    <br><br><br><br><br><br><br><br><br><br>
    <div class="containerr">
        <div style="width:80%;">
            <form method='post' action='edit-object.php' enctype='multipart/form-data'>
                <div class="row">
                    <div class="col-25">
                        <label for="name">Ime</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="name" name="name" value="<?php echo $row1['name']?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="contact">Kontakt</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="contact" name="contact" value="<?php echo $row1['contact']?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="time">Radno vreme</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="time" name="time" value="<?php echo $row1['time']?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="address">Adresa</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="address" name="address" value="<?php echo $row1['address']?>">
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-25">
                        <label>Logo</label>
                    </div>
                    <div class="col-75">
                        <input type="file" name="logo" id="logo" style="float:left; margin-top:1%; color:white;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Meni</label>
                    </div>
                    <div class="col-75">
                        <input type="file" name="menu" id="menu" style="float:left; margin-top:1%; color:white;">
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-25">
                        <label for="text">O objektu</label>
                    </div>
                    <div class="col-75">
                        <textarea id="text" name="text" value="<?php echo $row1['text']?>" style="height:200px"></textarea>
                    </div>
                </div>
                <div class="row">
                    <select name="tip" id="">
                        <option value="kafana">kafana</option>
                        <option value="klub">klub</option>
                        <option value="kafic">kafic</option>
                        <option value="pivnica">pivnica</option>
                    </select>
                </div>
                <div class="row">
                    <input type="submit" id="submit" value="Potvrdi">
                </div>
            </form>
        </div>
    </div>
    <script src="javascript/add_object/add_object.js"></script>
</body>

</html>