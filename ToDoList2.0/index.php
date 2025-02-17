<?php
if ($_SERVER['REQUEST_METHOD'] == "GET"){
    // Sparar ner min todolist.txt till en array
    $ongoingtask = 'todolist.txt';
    $data = [];

    if (file_exists($ongoingtask)) {
            $content = trim(file_get_contents($ongoingtask));
        if (!empty($content)) {
                $data = json_decode($content, true);
            if (!is_array($data)) {
            $data = [];
            }
        }
    }    

    // TAR BORT EN UPPGIFT I MIN TODOLIST
    if(isset($_GET['remove_button'])) {
        $indexToRemove = $_GET['remove_button'];

        unset($data[$indexToRemove]);
        $data = array_values($data);
        file_put_contents($ongoingtask, json_encode($data, JSON_PRETTY_PRINT));

        header("Location: 2.0.php");
        exit;
    }

    // LÄGGER TILL EN UPPGIFT I MIN TODOLIST
    if(isset($_GET['add_button'])) {
        if($_GET['todo_input'] != "") {
            
            $input = $_GET['todo_input'];        

            // Lägga till en ny uppgift
            $newTask = [
                "task" => $input,
                "done" => false
            ];

            $data[] = $newTask; // Lägg till uppgiften till arrayen

            file_put_contents($ongoingtask, json_encode($data, JSON_PRETTY_PRINT));
        }
    }
    
    // ÄNDRAR MIN INFORMATION I 'UPPGIFT'
    if(isset($_GET['ok'])) {
        if(isset($_GET['modify'])){

            $indexToModify = htmlspecialchars($_GET['modify']);

            $data[$_GET['ok']]['task'] = $indexToModify; // Ändra uppgift                

            file_put_contents($ongoingtask, json_encode($data, JSON_PRETTY_PRINT));
        }
    }

    // Sätter checkboxarna med true eller false
    function done($index){
        $ongoingtask = 'todolist.txt';
        $data = [];

        if (file_exists($ongoingtask)) {
                $content = trim(file_get_contents($ongoingtask));
            if (!empty($content)) {
                    $data = json_decode($content, true);
                if (!is_array($data)) {
                $data = [];
                }
            }
        } 
        if(isset($data[$index])) {
            if($data[$index]['done'] == true) {
                $data[$index]['done'] = false;
            } else {
                $data[$index]['done'] = true;
            }
        }
        file_put_contents($ongoingtask, json_encode($data, JSON_PRETTY_PRINT));
    }

    if(isset($_GET['klar'])){
   
        done($_GET['klar']);
        header("Location: 2.0.php");
        exit;        
    }

    if(isset($_GET['redigera'])){
        $index = $_GET['redigera'];

        if(isset($data[$index])){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="./style.css">
                <title>Document</title>
            </head>
            <body>
                
            </body>
            </html>
                <td>
                    <form method="GET">
                        <input type='text' name='modify' class='todo_input' placeholder="Ange ändrad Uppgift" value=<?php $data[$index]['task'] ?>>                    
                            </td>
                            <td>                                                    
                        <button type='submit' name='ok' value=<?=$index?>>OK</button>
                    </form>
                </td>
                <?php
                exit;
        }
    }
    
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>ToDo</title>
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
            <button type="submit" name="add_button">Lägg Till</button>
            <tbody>
            
                <!-- Bygger en Foreach för att printa ut alla i min todolist -->
                <?php foreach ($data as $index => $todo): ?>
                    <tr>                        
                        <td>
                            <p>
                                <?= htmlspecialchars($todo["task"]); ?>
                            </p>                                  
                        </td>                        
                        <td>
                            <form method="GET">
                                <button type='submit' name='redigera' value=<?= $index ?>>Redigera</button>  <!--Antingen så gör man så här i php formatet för att skriva ut-->                                           
                            </form>
                        </td>                            
                        <td>
                            <form method="GET">
                                <input type="hidden" name="klar" value="<?= $index; ?>">
                                <input type='checkbox' name='checkbox_of_doom' <?=($data[$index]['done'] == true ? "checked" : "")?> onchange="this.form.submit()" >  <!--Eller så gör man så här-->    
                            </form>
                        </td>                             
                        <td>
                            <form method="GET">
                                <Button type='submit' name='remove_button' value=<?php echo $index ?>>Ta bort</Button>
                            </form>
                        </td> 
                    </tr>
                <?php endforeach ?>                
            </tbody>
        </table>
    </form>
</body>
</html>