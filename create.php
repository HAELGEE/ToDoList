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

                <label for="input" style="margin-bottom: 1rem; font-size: 2rem;">To wich .txt do you want to add?:</label>
                <input name="things" type="text">

                <label for="text" style="margin-top: 1rem; margin-bottom: 1rem; font-size: 2rem;">Text to add:</label>
                <input name="text" type="text" style="margin-bottom: 1rem;">
                <button name="submit" type="submit">Submit</button>

            </form>
        </div>
        <div class="div-main">
            <?php
                if($_SERVER['REQUEST_METHOD'] == "GET"){

                    if(!empty($_GET['things']) && !empty($_GET['text'])){

                        $input = $_GET['things'];
                        $text = $_GET['text'];

                        if($input == "todolist"){

                            $filename = 'todolistJSON.txt';
                            $filename2 = 'todolist.txt';                        

                            $data = [];


                            // Sparar i Json format i en separat fil
                            if(file_exists($filename)) {

                                $content = trim(file_get_contents($filename));

                                if(!empty($content)) {

                                    $data = json_decode($content, true);
                                    if(!is_array($data)) {
                                        $data = [];
                                    }
                                }
                            }

                            $newTask = [
                                "task" => $text,
                                "done" => false
                            ];

                            $data[] = $newTask;

                            file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT));

                            echo "Din text: " . "'$text'" . " har nu blivit sparad i: " . "'$input'";

                            //Sparar i vanlig text för lättare läsning
                            $filename2 = 'todolist.txt';
                            if(file_exists($filename))
                            {
                             //Hämtar allt innehåll i fil som en string
                             $data2 = file_get_contents($filename2);
                            }

                            //Lägg in alla rader från fil till array
                            if (!empty($data2)) {
                             $data2 = explode("\n", trim($data2));
                            } else {
                             $data2 = [];
                            }
                            
                            //Lägg till sträng till vår array
                            $data2[] = $text;
                            
                            //Spara array till rader i fil
                            file_put_contents($filename2, implode("\n", $data2) . "\n");
                        }
                        elseif($_GET['things'] == "something") {

                            $filename = 'somethingJSON.txt';
                            $filename2 = 'something.txt';                        

                            $data = [];


                            // Sparar i Json format i en separat fil
                            if(file_exists($filename)) {

                                $content = trim(file_get_contents($filename));

                                if(!empty($content)) {

                                    $data = json_decode($content, true);
                                    if(!is_array($data)) {
                                        $data = [];
                                    }
                                }
                            }

                            $newTask = [
                                "task" => $text,
                                "done" => false
                            ];

                            $data[] = $newTask;

                            file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT));

                            echo "Din text: " . "'$text'" . " har nu blivit sparad i: " . "'$input'";

                            //Sparar i vanlig text för lättare läsning
                            $filename2 = 'something.txt';
                            if(file_exists($filename))
                            {
                             //Hämtar allt innehåll i fil som en string
                             $data2 = file_get_contents($filename2);
                            }

                            //Lägg in alla rader från fil till array
                            if (!empty($data2)) {
                             $data2 = explode("\n", trim($data2));
                            } else {
                             $data2 = [];
                            }
                            
                            //Lägg till sträng till vår array
                            $data2[] = $text;
                            
                            //Spara array till rader i fil
                            file_put_contents($filename2, implode("\n", $data2) . "\n");
                        } 
                        else {
                            echo "There is no .txt file named like that";                            
                        }
                    }             
                }
            ?>
        </div>
    </main>
</body>
</html>