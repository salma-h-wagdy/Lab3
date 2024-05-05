<!DOCTYPE html>
<head>
    <title>Task Insertion</title>

</head>
<body>
<h1>Please insert Task:</h1>
    <form action="../Controller/TaskController.php?Command=Add" method="POST">
        <tr>

            Title: <input type="text" name="Title">
            Description: <input type="text" name="Description">
            Due Date: <input type="date" name="DueDate">
            Status:
            <input type="radio" name="status" value="pending" id="pending">
            <label for="pending">Pending</label>
            <input type="radio" name="status" value="in_progress" id="in_progress">
            <label for="in_progress">In Progress</label>
            <input type="radio" name="status" value="completed" id="completed">
            <label for="completed">Completed</label>
        </tr>
        <tr>
            <td colspan="5"><input type="submit" ></td>
        </tr>
    </form>
   
    
</table>
</body>
</html>
