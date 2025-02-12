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
                <button name="delete-button" type="submit">DELETE</button>
            </form>
            <p>Warning!</p>
            <p>When u press the button, the world will explode</p>
        </div>
        <div class="div-main">
            <?php
                if($_SERVER["REQUEST_METHOD"] = "GET"); {
                    // echo var_dump($_GET['delete-button']);

                    if(isset($_GET['delete-button'])){

                        $myFile = fopen('todolist.txt', 'w');
                        fclose($myFile);

                    } else {

                        $todolist = file_get_contents('todolist.txt');
                        $something = file_get_contents('something.txt');
                        $merged = "ToDoList.txt:\n" . $todolist . "\n\n" . "Something.txt:\n" . $something;   

                        file_put_contents('all.txt', $merged);
                        $output = 'all.txt';

                        if(file_exists($output)) {
                            $data = file_get_contents($output);
                        }
                        if(!empty($data)) {
                            $data = explode("\n", trim($data));
                        } else {
                            $data = [];
                        }
                        
                        echo "<br>";
                        echo "<br>";

                        // foreach($data as $inp) {
                        //     echo $inp;
                        //     echo "<br>";
                        // }     
                        $todolist = explode("\n", trim($todolist));
                        $something = explode("\n", trim($something));

                        echo "ToDoList.txt:<br>";
                        foreach($todolist as $inp) {
                            echo "$inp<br>";
                        }
                        echo "Something.txt:<br>";
                        foreach($something as $inp) {
                            echo "$inp<br>";
                        }
                        
                    }
                }
            ?>
        </div>
    </main>
</body>
</html>