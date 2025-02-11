<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>

   
</head>
<body>
    <header>
        <div class="div-header">
            <h1>TASK FORCE</h1>
        </div>
        <div class="div-header">
            <a href="create.php">Create</a>
            <a href="read.php">Read</a>
            <a href="update.php">Update</a>
            <a href="delete.php">Delete</a>
        </div>
    </header>
    
    <main>
        <div class="div-main">
            <h2>Delete Section</h2>
            <form method="GET" action="">
                <button name="delete-button">DELETE</button>
            </form>
            <p>Warning!</p>
            <p>When u press the button, the world will explode</p>
        </div>
        <div class="div-main">
            <?php
                if($_SERVER["REQUEST_METHOD"] = "GET"); {

                    // $delete = $_POST['delete-button'];

                    // if($delete)
                    //     echo "Hej";
                    // else
                    //     echo "icke";
                    

                }
            ?>
        </div>
    </main>
</body>
</html>