<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Contact Form - PHP/MySQL Demo Code</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<script>
function set2fig(num) {
    // 桁数が1桁だったら先頭に0を加えて2桁に調整する
    var ret;
    if (num < 10) {
        ret = "0" + num;
    } else {
        ret = num;
    }
    return ret;
}
var msg;

function showClock2() {
    var nowTime = new Date();
    var nowHour = set2fig(nowTime.getHours());
    var nowMin = set2fig(nowTime.getMinutes());
    var nowSec = set2fig(nowTime.getSeconds());
    msg = +nowHour + ":" + nowMin + ":" + nowSec;
    document.getElementById("RealtimeClockArea2").innerHTML = msg;
    document.querySelector("#time").textContent = msg;
}
setInterval('showClock2()', 1000);
</script>



<body>
    <p id="RealtimeClockArea2"></p>
    <fieldset>
        <legend>Contact Form</legend>
        <form action="" method="post">
            
            <p>
                <label for="time">TIME:</label>
            <p id="time"></p>
            </p>
            <p>
                <label for="nfcId">NFC ID: </label>
                <input type="number" name="nfcid">
            </p>
            <p>
                <label for="person">PERSON:</label>
                <input type="number" name="person">
            </p>
            <p>&nbsp;</p>

            <input type="submit" name="formSubmit" value="submit">
        </form>
    </fieldset>

    <?php
    if (isset($_POST['formSubmit'])) {
        $id=$_POST['nfcid'];
        $per=$_POST['person'];
        $mysqli = new mysqli("localhost", "root", "", "db_register");
        if ($mysqli->connect_errno) {
            echo "Sorry,error";
            exit;
        }
        $nfcid='"'.$mysqli->real_escape_string($id).'"';
        $person='"'.$mysqli->real_escape_string($per).'"';
        $query="INSERT INTO data (NFC_id, PERSON) VALUES ($nfcid, $person)";
        $result=$mysqli->query($query);
        if($result){
          echo '<script type ="text/JavaScript">';  
          echo 'alert("Success")';  
          echo '</script>';
        }
        $mysqli->close();
}
?>

</body>

</html>