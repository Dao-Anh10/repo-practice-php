<?php

use Scripts\Lib\Db;
use Model\Task;

function getAllTask()
{
    try {
        $tasks = Db::$conndb->prepare('SELECT * FROM Task.todo_list');
        $tasks->execute();
        return $tasks->fetchAll();
    } catch (\Exception $e) {
        var_dump($e);
    }
}
function addTask($content, $alarmTime)
{
    try {
        $stmt = Db::$conndb->prepare("INSERT INTO Task.todo_list (content, GIO_BAO_THUC) VALUES (?,?)");
        $stmt->execute([$content, $alarmTime]);

        return $stmt->rowCount() == 1 ? 'SUCCESS' : 'ERROR';
    } catch (\Exception $e) {
        var_dump($e);
    }
}
function deleteTask($id)
{
    try {
        $stmt = Db::$conndb->prepare("DELETE FROM Task.todo_list WHERE item_id =:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->rowCount() == 1 ? 'SUCCESS' : 'ERROR';
    } catch (\Exception $e) {
        var_dump($e);
    }
}

function deleteAllTask()
{
    try {
        $stmt = Db::$conndb->prepare("DELETE FROM Task.todo_list");
        $stmt->execute();

        return $stmt->rowCount() > 0 ? 'SUCCESS' : 'ERROR';
    } catch (\Exception $e) {
        var_dump($e);
    }
}

function updateTask($id, $contentNew)
{
    try {
        $sql = "UPDATE Task.todo_list SET content=:content WHERE item_id=:id";
        $stmt = Db::$conndb->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':content' => $contentNew,
        ]);

        return $stmt->rowCount() == 1 ? 'SUCCESS' : 'ERROR';
    } catch (\Exception $e) {
        var_dump($e);
    }
}
