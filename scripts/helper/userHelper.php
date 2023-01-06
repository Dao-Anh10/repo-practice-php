<?php

use Model\UserModel;
use Scripts\Lib\Db;

function findUsers()
{
    try {
        $users = Db::$conndb->prepare('SELECT * FROM Task.User');
        $users->execute();

        $datas = array();
        foreach ($users->fetchAll() as &$item) {
            array_push($datas, new UserModel($item['Username'], $item['Pass'], $item['Email']));
        }

        return $datas;
    } catch (\Exception $e) {
        var_dump($e);
    }
}

function findUser($username)
{
    try {
        $users = Db::$conndb->prepare('SELECT * FROM Task.User WHERE Username=:username');
        $users->execute([
            ':username' => $username,
        ]);

        return $users->fetch(\PDO::FETCH_OBJ);
    } catch (\Exception $e) {
        var_dump($e);
    }
}
function addUser($user)
{
    try {
        $stmt = Db::$conndb->prepare("INSERT INTO Task.User (Username, Pass, Email)
                                            VALUES (?, ?, ?)");
        $stmt->execute([
            $user->getUsername(),
            $user->getPass(),
            $user->getEmail(),
        ]);

        return $stmt ? 'SUCCESS' : 'ERROR';
    } catch (\Exception $e) {
        var_dump($e);
    }
}
