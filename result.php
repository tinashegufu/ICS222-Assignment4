<!DOCTYPE html>
<html>
<head>
<title>Display</title>
<style>
    table, thead, tbody, tr { width: 100%; }
    table { table-layout: fixed }
    table > thead > tr > th { width: auto; }
    table {
    border-color: black;
    width: 100%;
    color: black;
    font-family: monospace;
    font-size: 15px;
    text-align: left;
    }
    th {
    background-color: gray;
    color: white;
    }
    tr:nth-child(even) {background-color: aqua}
    .btn{
        text-align: center;
    vertical-align: middle;
    padding: .3em;
    width: 10%;
    cursor: pointer;
    background-color: red;
    height: 40px;
    color: wheat;
    border-radius: 5px;
    border: 1px solid black;
    background-color: gray;
    cursor: pointer;
    }
</style>
</head>
<body>
<table>
    <tr>
        <th scope = "col">ENQUIRY ID</th>
        <th scope = "col">NAME</th>
        <th scope = "col">NUMBER</th>
        <th scope = "col">EMAIL</th>
        <th scope = "col">ENQUIRY</th>
        <th scope = "col">RESPONSE</th>
    </tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "webassignment");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, name, number, email, message,response FROM data";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"] . "</td><td>" . $row["number"]. "</td><td>". $row["email"]."</td><td>" .$row["message"]. "</td><td>" .$row["response"]. "</td> </tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
<input type="submit" value="Reply Enquiries" class="btn" onclick="window.location.href='reply.html'">
</body>
</html>