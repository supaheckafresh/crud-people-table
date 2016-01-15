<!-- Add 8 more records to people table and create php file that will echo all of the records    name challenge.php   send in the AM EMAIL Jason (will need to be in C9 and run server)  	
jasonleecooksey@gmail.com -->

<?php
    $title = $_GET["title"];
    if ($title == "" ) {
        $title = "My CRUD Cohort page.";
    }
    $header = "i am header";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <title>
        <?php echo $title; ?>
    </title>
</head>
<body>
    <h1>
         <?php echo $header; ?>
    </h1>
    <table class="table table-condensed">
        <tr>
            <td>CRandalLL</td>
            <td>password123</td>
        </tr>
    </table>
</body>
</html>


<!---- to get into mysql cmd type mysql-ctl cli>