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

                <div class="div-out" style="margin-bottom: 1rem;">

                    <div class="div-in">
                        <label for="all">Delete all</label>
                        <input type="checkbox" name="all" id="">
                    </div>

                </div>

                <button name="delete-button" type="submit">DELETE</button>
            </form>
            <p>Warning!</p>
            <p>When u press the button, the world will explode</p>
        </div>
        <div class="div-main">
            <?php
                if($_SERVER["REQUEST_METHOD"] = "GET"); {

                    if(isset($_GET['delete-button']) && isset($_GET['all']) && !isset($_GET['single'])){
                        
                        $myFile = fopen('todolist.txt', 'w');
                        $myFile2 = fopen('todolistJSON.txt', 'w');
                        fclose($myFile2);
                        fclose($myFile);
                        echo "Everything inside ToDoList is now removed";

                    } 
                    else {
                        
                        $todolist = file_get_contents('todolist.txt');
                        $todolistJSON = json_decode(file_get_contents('todolistJSON.txt'), true);

                        $something = file_get_contents('something.txt');
                        $somethingJSON = json_decode(file_get_contents('somethingJSON.txt'), true);

                        $merged = "ToDoList.txt:\n" . $todolist . "\n\n" . "Something.txt:\n" . $something;   

                        $data2 = [];
                        
                        if (!is_array($data2)) {
                        $data2 = []; // Säkerhetsåtgärd om filen har ogiltig JSON
                        }
                        
                        

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

                        
                        $todolist = explode("\n", trim($todolist));
                        $something = explode("\n", trim($something));

                    
                        echo "<u>ToDoList.txt:</u>";
                        foreach($todolist as $index => $input) {     
                            if(!is_null($todolist) && $todolist[0] != "")                       
                                echo "<p style='color: greenyellow; font-size: 2rem;'>$input <a href='?remove1=$index' class='cpknappen'> Delete </a></p>";
                        }

                        echo "<br><br><u>Something.txt:</u>";
                        foreach($something as $index => $input) {
                            if(!empty($something) && $something[0] != "") 
                                echo "<p style='color: greenyellow; font-size: 2rem;'>$input <a href='?remove2=$index' class='cpknappen'> Delete </a></p>";                         
                        }
                        
                        $filename1 = 'todolist.txt';
                        $filename11 = 'todolistJSON.txt';
                        $filename2 = 'something.txt';
                        $filename22 = 'somethingJSON.txt';
                        
                        if(isset($_GET['remove1'])) {
                            unset($todolist[$_GET['remove1']]); 
                            $todolist = array_values($todolist);
                            file_put_contents($filename1, implode("\n", $todolist) . "\n");

                            unset($todolistJSON[$_GET['remove1']]);                                 
                            $todolistJSON = array_values($todolistJSON);
                            file_put_contents($filename11, json_encode($todolistJSON, JSON_PRETTY_PRINT));

                            header("Location: delete.php");
                            exit;                               
                        }

                        if(isset($_GET['remove2'])) {                            
                            unset($something[$_GET['remove2']]);
                            $something = array_values($something);
                            file_put_contents($filename2, implode("\n", $something) . "\n");

                            unset($somethingJSON[$_GET['remove2']]);                                 
                            $somethingJSON = array_values($somethingJSON);
                            file_put_contents($filename22, json_encode($somethingJSON, JSON_PRETTY_PRINT));

                            header("Location: delete.php");
                            exit;
                        }                             
                    }
                }                
            ?>
        </div>
    </main>
</body>
</html>