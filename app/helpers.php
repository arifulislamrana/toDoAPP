<?php

if (! function_exists('getCurrentTime')) {
    
    function getCurrentTime() {
        return (new \DateTime())->format("Y-m-d h:i:s");
    }
}


if (! function_exists('getTaskStatus')) {
    
    function getTaskStatus(\App\Models\Task $task) {
        if ($task->end_time < getCurrentTime()) {
            return array_search(config('status.completed'), config('status'));
        }

        return array_search($task->status, config('status'));
    }
}



?>