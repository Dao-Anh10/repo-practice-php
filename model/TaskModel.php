<?php

namespace Model;

class TaskModel
{
    private $item_id;
    private $content;

    private $alarmTime;
    public function __construct($item_id = null, $content = null, $alarmTime = null)
    {
        $this->item_id = $item_id;
        $this->content = $content;
        $this->alarmTime = $alarmTime;
    }

    public function getItemID()
    {
        return $this->item_id;
    }

    public function setItemID($id)
    {
        $this->item_id = $id;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getAlarmTime()
    {
        return $this->alarmTime;
    }

    public function setAlarmTime($alarmTime)
    {
        $this->alarmTime = $alarmTime;
    }
}
