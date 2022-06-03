<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_GET['form_submitted'])):?>
    <h2>Search results for <?php echo $_GET['search_term'];?></h2>
    <?php?>
    
    ?>
    <form action="search_engine.php" method="get">
        Search term:
        <input type="text" name="search_term"><br>
        <input type="hidden" name="form_submitted" value="1" />
        <input type="submit" value="Submit">
    </form>
    <?php endif?>
</body>
</html>