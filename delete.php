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

                    <div class="div-in">
                        <label for="single">Delete single</label>
                        <input type="checkbox" name="single" id="">
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
                        fclose($myFile);

                        echo "Everything inside ToDoList is now removed";

                    } 
                    elseif(isset($_GET['delete-button']) && isset($_GET['single']) && !isset($_GET['all'])) {

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

                           
                        $todolist = explode("\n", trim($todolist));
                        $something = explode("\n", trim($something));

                       
                        echo "<u>ToDoList.txt:</u>";
                        foreach($todolist as $index => $input) {     
                            if(!empty($todolist))                       
                                echo "<p style='color: greenyellow; font-size: 2rem;'>$input <a href='?remove1=$index' class='cpknappen'> Delete </a></p>";
                        }

                        echo "<br><br><u>Something.txt:</u>";
                        foreach($something as $index => $input) {
                            if(!empty($something)) 
                                echo "<p style='color: greenyellow; font-size: 2rem;'>$input <a href='?remove2=$index' class='cpknappen'> Delete </a></p>";                         
                        }

                        
                        //Tar bort den valda i den index ifrån listan
                        if(isset($_GET['remove1'])) {
                            unset($todolist[$_GET['remove1']]);    
                            
                        }
                        if(isset($_GET['remove2'])) {
                            unset($something[$_GET['remove2']]);
                        }                        
                    } 
                    elseif(isset($_GET['delete-button'])){
                        echo "Something is <u>missing</u> or wrong!";
                    }
                }
            ?>
        </div>
    </main>
</body>
</html>