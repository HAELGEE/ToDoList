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
                <input name="things" type="text">

                <label for="text" style="margin-top: 1rem; margin-bottom: 1rem; font-size: 2rem;">Text to add:</label>
                <input name="text" type="text">
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

                            $filename = 'todolist.txt';
                            if(file_exists($filename))
                            {
                             //Hämtar allt innehåll i fil som en string
                             $data = file_get_contents($filename);
                            }

                            //Lägg in alla rader från fil till array
                            if (!empty($data)) {
                            $data = explode("\n", trim($data));
                            } else {
                                $data = [];
                            }
                            
                            //Lägg till sträng till vår array
                            $data[] = $text;
                            
                            //Spara array till rader i fil
                            file_put_contents($filename, implode("\n", $data));

                            echo "Din text:" . "'$text'" . "har nu blivit sparad i: " . "'$input'";

                        }
                        elseif($_GET['things'] == "something") {

                            $filename = 'something.txt';
                            if(file_exists($filename))
                            {
                             //Hämtar allt innehåll i fil som en string
                             $data = file_get_contents($filename);
                            }

                            //Lägg in alla rader från fil till array
                            if (!empty($data)) {
                             $data = explode("\n", trim($data));
                            } else {
                             $data = [];
                            }
                            
                            //Lägg till sträng till vår array
                            $data[] = $text;
                            
                            //Spara array till rader i fil
                            file_put_contents($filename, implode("\n", $data));

                            echo "Din text:" . $text . " har nu blivit sparad i: " . $input;

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