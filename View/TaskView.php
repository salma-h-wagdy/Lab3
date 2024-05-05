<!DOCTYPE html>

<title> Task Main Page</title>
<head><style>
        table, th, td {
         border: 1px solid black;
         padding: 5px;
  }
  </style></head>
<body>

    <h1>List of all Tasks</h1>
    <table>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Due Date</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr> 
    </div>

    <?php

// $_GET["Command"] = "Show";

// include_once "../Controller/TaskController.php";
include_once"../Model/ReadClass.php";
$obj=new ReadTask();
$arr=$obj->ListallTasks();

for($i=0;$i<count($arr);$i++){
    echo"<td>".$arr[$i]->getTitle()."</td><td>".$arr[$i]->getDescription()."</td><td>".$arr[$i]->getDueDate()."</td><td>".$arr[$i]->getStatus()."</td>";
    $taskId = $arr[$i]->getId();
    if ($taskId !== null && $taskId !== "") {
        echo "<td><a href='EditTaskForm.php?id={$arr[$i]->getid()}'>Edit</a></td>";
        echo "<td><a href='../Controller/TaskController.php?Command=Delete&id={$arr[$i]->getid()}'>Delete</a></td>";
    }
    
    echo "</tr>";
}
?>
</table>
<button onclick="location.href='AddTaskForm.php';">Insert New Task</button><br>

</body>

</html>