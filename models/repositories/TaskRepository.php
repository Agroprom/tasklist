<?php

namespace app\models\repositories;

use app\models\repositories\iTaskRepository;
use mhndev\yii2Repository\AbstractSqlArRepository;

/**
 * Description of TaskRepository
 *
 * @author agroprom
 */


class TaskRepository extends AbstractSqlArRepository implements iTaskRepository
{

    public function create(array $data) {
        
        $this->model->load($data);
        $this->model->id = (string) \Ramsey\Uuid\Uuid::uuid4();
        $this->model->save();                
    }
    
    public function updateOneById($id, array $data = [])
    {
        $task = $this->query->where(['id'=>$id])->one();        
        $task->load($data);
        $task->save();
    }
    
    
}