<!DOCTYPE html>
<head>

    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>
    <?php
    include_once "../Model/ReadClass.php";
    include_once "../Model/TaskClass.php";

    if(isset($_GET['id'])) {
        $taskId = $_GET['id'];
        $readTask = new ReadTask();
        $taskList = $readTask->ListallTasks();
        
        $task = null;
        foreach($taskList as $t) {
            if($t->getId() == $taskId) {
                $task = $t;
                break;
            }
        }

        if($task) {
            ?>
            <form action="../Controller/TaskController.php?Command=Edit" method="POST">
                <input type="hidden" name="id" value="<?php echo $task->getId(); ?>">
                Title: <input type="text" name="Title" value="<?php echo $task->getTitle(); ?>"><br>
                Description: <input type="text" name="Description" value="<?php echo $task->getDescription(); ?>"><br>
                Due Date: <input type="date" name="DueDate" value="<?php echo $task->getDueDate(); ?>"><br>
                Status:<input type="text" name="status" value="<?php echo $task->getStatus(); ?>"><br>
                <input type="radio" name="status" value="pending" id="pending" <?php if($task->getStatus() == "pending") echo "checked"; ?>>
                <label for="pending">Pending</label>
                <input type="radio" name="status" value="in_progress" id="in_progress" <?php if($task->getStatus() == "in_progress") echo "checked"; ?>>
                <label for="in_progress">In Progress</label>
                <input type="radio" name="status" value="completed" id="completed" <?php if($task->getStatus() == "completed") echo "checked"; ?>>
                <label for="completed">Completed</label><br>
                <input type="submit" value="Save Changes">
            </form>
            <?php
        } else {
            echo "Task not found.";
        }
    } else {
        echo "ID not provided.";
    }
    ?>
</body>
</html>
