<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<script>
function HandleBrowseClick()
{
    var fileinput = document.getElementById("browse");
    fileinput.click();
}

function Handlechange()
{
    var fileinput = document.getElementById("browse");
    var textinput = document.getElementById("filename");
    textinput.value = fileinput.value;
}
</script>

    <div class="contain">
    <form action="update.php" method="POST" enctype="multipart/form-data">
    <h2>GramworkX File Upload</h2>
    <?php
    if(isset($_GET['msg']))echo $_GET['msg']; 
    ?>
    
        <p>Device Model  <select name="model" id="id1" required>
            <option value="">--Select Device--</option>
            <option value="gwx100">gwx100</option>
            <option value="gwx200">gwx200</option>
        </select></p>
        <!--<p>Firmware Vision <input type="text" name="number" id="id2" required> 
        Select Firmware <input type="file" name="file" id="id3" required></p>-->

        <div class="two-col">
    <div class="col1">
        <label for="field1">Firmware Vision</label>
        <input id="id2" name="number" type="text">
    </div>

    <div class="col2">
        <label for="field2">Select Firmware</label>
        <input type="text" id="filename" readonly="true">
        <input type="file" id="browse" name="fileuploadbtn" style="display: none" size="60" onChange="Handlechange();">
        <input type="button" value="Browse" id="fakeBrowse"   onclick="HandleBrowseClick();"/>
    </div>
</div>


    <p>* All fields are mandatory</p>
    <button type="submit" name="submit">Upadte new firmware</button>
    </form>
    </div>
    
    <h2>Firmware Table</h2>

    <br>
    <?php
$conn = mysqli_connect("localhost","root","","fileuploaddata","3306");
if ($conn-> connect_error){
    die("Connection failed:" . $conn-> connect_error);
}
$sql = "SELECT * FROM fileuploadtable WHERE 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>GWX Device</th><th>Firmware Vrsion</th><th>File Path</th><th>Created At</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["model"]. "</td><td> " . $row["number"]. "</td><td> " . $row["file"]. "</td><td> " . $row["date"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}


    ?>

        
</body>
</html>