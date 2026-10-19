<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    // start a query on the logged-in user's tasks (with parentheses, so you can keep building on it)
    // also load each task's category, so the view can print it (look up with())

    // if the URL has ?category=..., keep only that category's tasks
    // (look up $request->filled() and ->where())

    // sort: unfinished first, then by priority (1 first), then by due date
    // (look up orderBy(), you can chain several)

    // get the user's categories too, for the filter links and the dropdown

    // return the tasks.index view, passing both 'tasks' and 'categories'
    public function index(Request $request)
    {
        
    }

    public function store(Request $request)
    {
        // validate:
        //   task_name    required, string, max 255
        //   description  nullable, string
        //   category_id  required, and must be one of THIS user's categories
        //                (look up Rule::exists('categories', 'id')->where(...))
        //   priority     required, must be 1, 2 or 3 (look up the "in" rule)
        //   due_date     nullable, date
        // create the task through the user relationship, so user_id fills itself
        // redirect back
    }

    public function update(Request $request, Task $task)
    {
        // abort with 403 if the task isn't the logged-in user's
        // validate the same way as store
        // update the task, redirect back
    }

    public function toggle(Request $request, Task $task)
    {
        // abort with 403 if the task isn't the logged-in user's
        // flip is_done (true becomes false, false becomes true)
        // set completed_at to now() when it becomes done, or null when it becomes not done
        // save, redirect back
    }

    public function destroy(Request $request, Task $task)
    {
        // abort with 403 if the task isn't the logged-in user's
        // delete it, redirect back
    }
}