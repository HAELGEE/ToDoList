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
            <h2>Update Section</h2>
            <form method="POST" action="" style="display: flex; flex-direction: column;">                
                
                <button name="submit" type="submit" >Submit</button>
            
        </div>
        <div class="div-main">
        <?php
            $filename = 'todolistJSON.txt';
            $data = [];

            // Ladda JSON om filen finns
            if (file_exists($filename)) {
                $content = file_get_contents($filename);
                $data = json_decode($content, true);
                if (!is_array($data)) {
                    $data = [];
                }
            }

            if (!empty($data)) {
                echo "<u>ToDoList:</u>";
                foreach ($data as $index => $task) {
                    $checked = $task['done'] ? 'checked' : '';

                    // Dold input säkerställer att även avmarkerade checkboxar skickas
                    echo "<p style='color: greenyellow; font-size: 1.5rem;'>
                            ".$task['task']."
                            <input type='hidden' name='tasks[$index]' value='0'>
                            <input type='checkbox' name='tasks[$index]' value='1' class='check-of-doom' $checked>                            
                            </p>";
                }
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tasks'])) {
                foreach ($data as $index => &$task) {
                    $task['done'] = $_POST['tasks'][$index] == '1';
                }
                
                file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT));

                header("Location: update.php");
                exit;
            }
        ?> 
        </form>
    </div>

    </main>
</body>
</html>