<?php

namespace App\Http\Controllers\Api\V1;

use App\Coursescategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\Coursescategory as CoursescategoryResource;
use App\Http\Requests\Admin\StoreCoursescategoriesRequest;
use App\Http\Requests\Admin\UpdateCoursescategoriesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class CoursescategoriesController extends Controller
{
    public function index()
    {
        

        return new CoursescategoryResource(Coursescategory::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('coursescategory_view')) {
            return abort(401);
        }

        $coursescategory = Coursescategory::with([])->findOrFail($id);

        return new CoursescategoryResource($coursescategory);
    }

    public function store(StoreCoursescategoriesRequest $request)
    {
        if (Gate::denies('coursescategory_create')) {
            return abort(401);
        }

        $coursescategory = Coursescategory::create($request->all());
        
        

        return (new CoursescategoryResource($coursescategory))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateCoursescategoriesRequest $request, $id)
    {
        if (Gate::denies('coursescategory_edit')) {
            return abort(401);
        }

        $coursescategory = Coursescategory::findOrFail($id);
        $coursescategory->update($request->all());
        
        
        

        return (new CoursescategoryResource($coursescategory))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('coursescategory_delete')) {
            return abort(401);
        }

        $coursescategory = Coursescategory::findOrFail($id);
        $coursescategory->delete();

        return response(null, 204);
    }
}
