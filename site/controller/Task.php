<?php

namespace Site\Controller;

use Scripts\Lib\Db;
use Model\TaskModel;

include_once('scripts/helper/taskHelper.php');

class Task extends Base
{
    public function show($req)
    {
        $params = explode('/', $req);
        $status = !empty($params[0]) ?  $params[0] : '';
        $msg = !empty($params[1]) ?  $params[1] : '';

        $tasks = array();
        foreach (getAllTask() as &$item) {
            array_push($tasks, new TaskModel($item['item_id'], $item['content'], $item['GIO_BAO_THUC']));
        }


        $this->view->render($this->getTemplate('homePage'), [
            'tasks' => $tasks,
            'msg' . $status => $msg
        ]);
    }

    public function add($req)
    {
        if (isset($_POST["content"])) {
            $result = addTask($_POST["content"], $_POST["alarm-time"]);
            if ($result == 'SUCCESS') {
                header("location:$this->baseURL/site/task/show/1/Thêm mới thành công");
            }
        }
    }
    public function delete($req)
    {
        if (isset($_GET['id'])) {
            $result = deleteTask($_GET['id']);
            if ($result == 'SUCCESS') {
                header("location:$this->baseURL/site/task/show/1/xóa thành công");
            }
        }
    }

    public function deleteAll($req)
    {
        $result = deleteAllTask();
        if ($result == 'SUCCESS') {
            header("Location: $this->baseURL/site/task/show/1/Bạn đã xóa hết các task");
            exit();
        }

        header("Location: $this->baseURL/site/task/show/0/Không có task để xóa");
    }

    public function update($req)
    {
        if (isset($_POST['id']) && isset($_POST['contentNew'])) {
            $result = updateTask($_POST['id'], $_POST['contentNew']);

            if ($result == 'SUCCESS') {
                header("Location: $this->baseURL/site/task/show/1/cật nhật thành công");
            }
        }
    }
}
