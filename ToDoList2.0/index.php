<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
    <div>
        <h2>ATT GÖRA</h2>
    </div>
    <form method="GET" action="">        
        <table class="blueTable">
            <thead>
                <tr>
                    <th>Uppgift</th>
                    <th>Redigera</th>
                    <th>Klar</th>
                    <th>Ta bort</th>
                </tr>
            </thead>           
            <input type="text" name="todo_input" class="todo_input" placeholder="Uppgift att lägga till">
            <button name="add_button">Lägg Till</button>
            <tbody>
                <?php
                    if($_SERVER['REQUEST_METHOD'] === "GET") {

                        if(empty($_GET['todo_input'])) {   
                            
                            $filename = 'todolist.txt';
                            
                            $data = [];

                            if (file_exists($filename)) {
                                    $content = trim(file_get_contents($filename));
                                if (!empty($content)) {
                                        $data = json_decode($content, true);
                                    if (!is_array($data)) {
                                    $data = []; // Säkerhetsåtgärd om filen har ogiltig JSON
                                    }
                                }
                            }

                            // Skriver ut array för att visa allt som finns innan man lägger till saker
                            foreach($data as $index => $output) {
                                foreach($output as $task => $value) {                                                                        
                                    if($task == "task") {
                                        if($data[$index]['done'] == true) {
                                            // echo var_dump($data[$index]['done']);
                                            echo "  <tr>                   
                                                        <td>
                                                            <p>
                                                                $value
                                                            </p>
                                                        </td>                 
                                                        <td>
                                                            <button name='redigera'>Redigera</button>                                                        
                                                        </td>
                                                        <td>
                                                            <input type='checkbox' name='checkbox_of_doom' value='$index' checked>
                                                        </td>
                                                        <td>
                                                            <Button type 'submit' name='remove_button' value='$index'>Ta bort</Button>
                                                        </td>
                                                    </tr>";     
                                        }  else  {                                                
                                            echo "  <tr>                   
                                                        <td>
                                                            <p>
                                                                $value
                                                            </p>
                                                        </td>                 
                                                        <td>
                                                            <button name='redigera'>Redigera</button>                                                        
                                                        </td>
                                                        <td>
                                                            <input type='checkbox' name='checkbox_of_doom' value='$index'>
                                                        </td>
                                                        <td>
                                                            <Button type 'submit' name='remove_button' value='$index'>Ta bort</Button>
                                                        </td>
                                                    </tr>";
                                        }  
                                    } 
                                }                             
                            }
                           
                        }
                        
                        // Med denna If-satsen så skrivs arrayen ut EFTER att man lagt till något
                        elseif($_GET['todo_input'] != "" && empty($_GET['add_button'])) {    

                            $input = $_GET['todo_input'];
                            $filename = 'todolist.txt';
                            
                            $data = [];

                            if (file_exists($filename)) {
                                    $content = trim(file_get_contents($filename));
                                if (!empty($content)) {
                                        $data = json_decode($content, true);
                                    if (!is_array($data)) {
                                    $data = []; // Säkerhetsåtgärd om filen har ogiltig JSON
                                    }
                                }
                            }

                            // Lägga till en ny uppgift
                            $newTask = [
                                "task" => $input,
                                "done" => false
                            ];

                            $data[] = $newTask; // Lägg till uppgiften till arrayen

                            // Exempel på att ändra en uppgift
                            // if (count($data) > 0) {
                            //     $data[0]['task'] = "Köp ägg"; // Ändra uppgift
                            // }

                            
                            foreach($data as $index => $output) {
                                foreach($output as $task => $value) {
                                    if($task == "task") {
                                        if($data[$index]['done'] == true) {
                                            // echo var_dump($data[$index]['done']);
                                            echo "  <tr>                   
                                            <td>
                                            <p>
                                            $value
                                            </p>
                                            </td>                 
                                            <td>
                                            <button name='redigera'>Redigera</button>                                                        
                                            </td>
                                            <td>
                                            <input type='checkbox' name='checkbox_of_doom' value='$index' checked>
                                            </td>
                                            <td>
                                            <Button type 'submit' name='remove_button' value='$index'>Ta bort</Button>
                                            </td>
                                            </tr>";     
                                        }  else  {                                                
                                            echo "  <tr>                   
                                            <td>
                                            <p>
                                            $value
                                            </p>
                                            </td>                 
                                            <td>
                                            <button name='redigera'>Redigera</button>                                                        
                                            </td>
                                            <td>
                                            <input type='checkbox' name='checkbox_of_doom' value='$index'>
                                            </td>
                                            <td>
                                            <Button type 'submit' name='remove_button' value='$index'>Ta bort</Button>
                                            </td>
                                            </tr>";
                                        }  
                                    }                              
                                }
                            }                        
                        }  //Här ändrar jag innehållet
                        
                        // Exempel på att markera en uppgift som klar (här markeras den första uppgiften som klar)
                         if ($_GET['checkbox_of_doom'] == true) {
                            $data[$_GET['checkbox_of_doom']]['done'] = true; // Markera som klar}

                            // Skriv tillbaka till filen som JSON
                            file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT));
                            header("Location: index.php");
                            exit;
                        }
                        
                        if(isset($_GET['redigera'])) {
                            $indexToModify = $_GET['redigera'];     
                            
                            foreach($data as $index => $output) {
                                
                                foreach($output as $task => $value) {
                                    if($task == "task") {
                                        if($index == $indexToModify) {                                        
                                            echo "  <tr>                   
                                            <td>
                                            <p>
                                            <input type='text' name='modify_input' class='todo_input'>
                                            </p>
                                            </td>                 
                                                        <td>
                                                            <button name='ok' value='$index'>OK</button>
                                                        </td>
                                                        <td>                                                                
                                                        </td>
                                                        <td>                                                                
                                                        </td>
                                                    </tr>";                                                  
                                        } 
                                    } 
                                } 
                            }

                            if(isset($_GET['ok'])) {
                                $data[$indexToModify]['task'] = $_GET['modify_input']; // Ändra uppgift
                            }
                            if(isset($_GET['modify_input'])) {
                                var_dump($_GET['modify_input']);
                            }
                            file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT));

                            header("Location: index.php");
                            exit;
                        }     

                        // Här tar jag bort valda Index
                        if(isset($_GET['remove_button'])) {
                            
                            $indexToRemove = $_GET['remove_button'];

                            unset($data[$indexToRemove]);
                            $data = array_values($data);
                            file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT));

                            header("Location: index.php");
                            exit;
                        }                    
                    }
                ?>    
            </tbody>
        </table>
    </form>
</body>
</html>