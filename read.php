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
            <h2>Read Section</h2>
            <form method="GET" action="" style="display: flex; flex-direction: column;">
                <input name="things" type="text">
                <button name="submit" type="submit">Submit</button>
            </form>
        </div>
        <div class="div-main">
            <?php
                if($_SERVER["REQUEST_METHOD"] == "GET") {


                    if(isset($_GET['submit']) == ""){
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
                                                
                        foreach($data as $inp) {
                            echo $inp;
                            echo "<br>";
                        }         
                    }



                    if(isset($_GET['things'])){
                        $input = strtolower($_GET['things']);
                        $output = "";

                        $todolist = file_get_contents('todolist.txt');
                        $something = file_get_contents('something.txt');

                        $merged = "ToDoList.txt:\n" . $todolist . "\n\n" . "Something.txt:\n" . $something;

                        file_put_contents('all.txt', $merged);

                        if($input == "todolist")
                            $output = 'todolist.txt';
                        elseif($input == "something")
                            $output = 'something.txt';      
                        elseif($input == "all")
                            $output = 'all.txt';                    
                        else
                            echo "Nothing found";
                        
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
                                                    
                        foreach($data as $inp) {
                            echo $inp;
                            echo "<br>";
                        }  
                    }
                }
            ?>            
        </div>
        
    </main>
</body>
</html>