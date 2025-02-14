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
            <form method="GET" action="" style="display: flex; flex-direction: column;">                
                <!-- <input name="things" type="text" style="margin-bottom: 1rem;"> -->
                <button name="submit" type="submit" >Submit</button>
            </form>
        </div>
        <div class="div-main">
            <?php
                if($_SERVER["REQUEST_METHOD"] == "GET") {


                    if(isset($_GET['submit']) != null){
                        $filename = 'todolist.txt';
                        
                        $data = [];

                        if(file_exists($filename)) {

                            $content = trim(file_get_contents($filename));

                            if(!empty($content)) {

                                $data = json_decode($content, true);
                                if(!is_array($data)) {
                                    $data = [];
                                }
                            }
                        }

                        // $newTask = [
                        //     "task" => $text,
                        //     "done" => false
                        // ];

                        $data[] = $newTask;
                        
                        if(count($data) > 0) {
                            $data[0]['task'];
                        }

                                        
                        // echo "<p style='color: greenyellow; font-size: 2rem;'>$input <a href='?remove1=$index' class='cpknappen'> Delete </a></p>";

                        $todolist = explode("\n", trim($todolist));
                        $something = explode("\n", trim($something));

                    
                        echo "<u>ToDoList.txt:</u>";
                        foreach($todolist as $index => $input) {     
                            if(!is_null($todolist) && $todolist[0] != "")                       
                                echo "<p style='color: greenyellow; font-size: 2rem;'>$input <a href='?update1=$index' class='cpknappen'> X </a></p>";
                        }

                        echo "<br><br><u>Something.txt:</u>";
                        foreach($something as $index => $input) {
                            if(!empty($something) && $something[0] != "") 
                                // echo "<p style='color: greenyellow; font-size: 2rem;'>$input <a href='?update2=$index' class='cpknappen'> X </a></p>";                         
                                echo "<p style='color: greenyellow; font-size: 1.5rem;'>$input <input type='checkbox' name='check-of-doom' class='check-of-doom'
                                <?php 

                                ?></p>";                         
                        }  
                        
                        echo "<button class='Submit-button' name='submit-button'>SUBMIT</button>";

                       
                        
                    }
                }
            ?>  
                     
        </div>
        
    </main>
</body>
</html>