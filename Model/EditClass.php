<?php
include_once"TaskClass.php";
class Edit{
    function EditTask($Taskinfo){
        $Task=new Task();
        $filename = $Task->filename;
        $file = file($filename);

        foreach ($file as $key => $line) {
            $TaskLine = explode($Task->separator, $line);
            if ($TaskLine[0] == $Taskinfo[0]) {
                $file[$key] = $Taskinfo;
                break;
            }
        }

        // Write updated user data back to file
        file_put_contents($filename, implode("", $file));
        header("Location:../View/TaskView.php");
            exit();
    }
}


?>