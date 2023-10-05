<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Traits\CrudTrait;

class TaskController extends Controller
{
    use CrudTrait;

    protected function getModel()
    {
        return Task::class; // Replace with your model class
    }

    protected function getValidationRulesForCreate()
    {
        return [
            'project_name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'assigned_to' => 'required|string|max:255',
        ];
    }

    protected function getValidationRulesForUpdate()
    {
        return [
            'status' => 'required|string|max:255',
            'assigned_to' => 'required|string|max:255',
        ];
    }
}