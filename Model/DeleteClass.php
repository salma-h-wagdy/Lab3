<?php

class Delete{

    function deleteTask($id,$file,$separator) {
        $filename = $file;
        $file = file($filename);
    
        foreach ($file as $key => $line) {
            $TaskLine = explode($separator, $line);
            
            if ($TaskLine[0] == $id) {
              
                $file[$key] = "";
                file_put_contents($filename, implode("", $file));
                header("Location:../View/TaskView.php");
                exit();
            
            }
        }
    }
}

?>