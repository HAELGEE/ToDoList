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
            <h2>Create Section</h2>
            <form method="GET" action="" style="display: flex; flex-direction: column;">
                <label for="input" style="margin-bottom: 1rem; font-size: 2rem;">Wich .txt?:</label>
                <input name="input" type="text">
                <label for="text" style="margin-top: 1rem; margin-bottom: 1rem; font-size: 2rem;">Text to add:</label>
                <input name="text" type="text">
            </form>
        </div>
        <div class="div-main">
            <?php
                if($_SERVER['REQUEST_METHOD'] == "GET"){
                    if(isset($_GET['input']) && isset($_GET['text'])){




                    }
                }
            ?>
        </div>
    </main>
</body>
</html>