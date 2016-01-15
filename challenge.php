<?php
    $title = $_GET["title"];
    if ($title == "" ) {
        $title = "My CRUD Cohort CHALLENGE page.";
    }
    $header = "i am header";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Nothing+You+Could+Do' rel='stylesheet' type='text/css'>
    <title>
        <?php echo $title; ?>
    </title>
</head>
<div class="container">
    <body>
        <div class="row">
            <h1 class="col-md-6 col-md-offset-3 cursive">
             <?php echo $header; ?>
            </h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="row">
                    <a target="_blank" id="toggle-add-person" onclick="displayAddPersonForm()">Add Person</a>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3">
                
                <form id="add-person-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                
                    first name: <input type="text" name="firstname"><br/>
                    last name: <input type="text" name="lastname"><br/>
                    password: <input type="text" name="password">
                    <input type="submit"><br/><br/>
    
                </form>
            </div>
        </div>
        
        <!-- result people table -->
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <table class="table table-condensed">
                    <?php
                        
                        //connect to database and display people table
                        $conn = connect('crud');
                        
                        $q = "SELECT * FROM people";
                        $result = mysqli_query($conn, $q);
                        
                        //display people table header
                        echo "<tr class=\"table-header\">
                                <td>ID</td>
                                <td>first</td>
                                <td>last</td>
                                <td>password</td>
                            </tr>";
                        
                        displayPeople($result);
                        
                        $conn->close();
                        
                        
                        // add new person
                        $newFirst = $newLast = $newPassword = "";
                        
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            
                            $conn = connect('crud');
                            
                            //TODO: figure out how to properly escape the inputs
                            $newFirst = $_POST["firstname"];
                            $newLast = $_POST["lastname"];
                            $newPassword = $_POST["password"];
                            
                            $insert = "INSERT INTO people (firstname, lastname, password) 
                                VALUES ('" 
                                . $_POST["firstname"] . "', '"
                                . $_POST["lastname"] . "', '"
                                . $_POST["password"] . "');";
                            
                            mysqli_query($conn, $insert);
                            
                            // also echo just the new row at the bottom of table
                            $q = "SELECT * FROM people ORDER BY ID DESC LIMIT 1";
                            $result = mysqli_query($conn, $q);
                            displayPeople($result);
                            
                            $conn->close();
                        }
                        
                        
                        function connect($database) {
                            $conn = "";
                            
                            $host = "127.0.0.1";
                            $user = "supaheckafresh";
                            $pass = "";
                            $db = $database;
                            
                            $conn = mysqli_connect($host, $user, $pass, $db)or die(mysql_error());
                            
                            return $conn;
                        }
                        
                        function displayPeople($result) {
                        
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>" 
                                    . "<td>" . $row['ID'] . "</td>"
                                    . "<td>" . $row['firstname'] . "</td>"
                                    . "<td>" . $row['lastname'] . "</td>"
                                    . "<td>" . $row['password'] . "</td>" . "</tr>";
                            }
                        }
                    ?>
                </table>
            </div>
        </div>
        
    <script type="text/javascript" src="js/scripts.js"></script>
    
    </body>
</div>
</html>