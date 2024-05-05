<?php
 include_once"TaskClass.php";
 
class ReadTask{


    
    
function getLineWithId($Id,$filename,$separator){
    if(!file_exists($filename)){return 0;}
    $file = fopen($filename, "r+") or die("Unable to open file!");
    while (!feof($file)) {
        $line = fgets($file);
        $ArrayLine = explode($separator, $line);
        if ($ArrayLine[0]==$Id) {
            fclose($file);
            return $line;
        }
    }
    fclose($file);
    return false;
}
function getLastId($filename,$separator){
    if(!file_exists($filename)){return 0;}
    $file = fopen($filename, "r+") or die("Unable to open file!");
    $lastId = 0;
    while (!feof($file)) {
        $line = fgets($file);
        $Info = explode($separator, $line);
        if ($Info[0]!="") {
            $lastId = (int)$Info[0];
        }
    }
    fclose($file);
    return $lastId;
}
function getTaskById($Id){
    $Task = new Task();
    $line=$this->getLineWithId($Id,$Task->filename,$Task->separator);
    $ArrayLine = explode($Task->separator, $line);
    $Task->setId($ArrayLine[0]); 
    $Task->setTitle($ArrayLine[1]); 
    $Task->setDescription($ArrayLine[2]);
    $Task->setDueDate($ArrayLine[3]);
    $Task->setStatus($ArrayLine[4]);
    return $Task;
} 
function ListallTasks(){
    $Task=new Task();
    $arr=[];
    $i=0;
    $file = fopen($Task->filename, "r+") or die("Unable to open file!");
while (!feof($file)) {
    $line = fgets($file);
    if (!empty(trim($line))) {
    $ArrayLine = explode($Task->separator, $line);
   $arr[$i]=$this->getTaskById($ArrayLine[0]);
   $i++;
    }
}
fclose($file);
return $arr;
}
}


?>