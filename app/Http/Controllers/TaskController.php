<?php

namespace App\Http\Controllers;

use App\Http\Resources\Task as TaskResource;
use App\Http\Resources\TaskCollection;
use App\Models\task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getAll()
    {
        return new TaskCollection(Task::all());
    }

    public function getByTaskId($row_id)
    {
        return new TaskResource(Task::findOrFail($row_id));
    }

    public function getTasksByCatId($par_cat_id)
    {
        $tasks = Task::where('par_cat_id', $par_cat_id)->get();
        return $tasks;
//       return new TaskCollection(Task::where('par_cat_id',$par_cat_id) );
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'due_date' => 'required',
        ]);

        $task = Task::create($request->all());

        return (new TaskResource($task))
            ->response()
            ->setStatusCode(201);
    }

    public function delete($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(null, 204);
    }
}
