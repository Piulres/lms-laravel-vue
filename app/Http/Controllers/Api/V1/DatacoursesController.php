<?php

namespace App\Http\Controllers\Api\V1;

use App\Datacourse;
use App\Http\Controllers\Controller;
use App\Http\Resources\Datacourse as DatacourseResource;
use App\Http\Requests\Admin\StoreDatacoursesRequest;
use App\Http\Requests\Admin\UpdateDatacoursesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class DatacoursesController extends Controller
{
    public function index()
    {
        

        return new DatacourseResource(Datacourse::with(['course', 'user'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('datacourse_view')) {
            return abort(401);
        }

        $datacourse = Datacourse::with(['course', 'user'])->findOrFail($id);

        return new DatacourseResource($datacourse);
    }

    public function store(StoreDatacoursesRequest $request)
    {
        if (Gate::denies('datacourse_create')) {
            return abort(401);
        }

        $datacourse = Datacourse::create($request->all());
        
        

        return (new DatacourseResource($datacourse))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateDatacoursesRequest $request, $id)
    {
        if (Gate::denies('datacourse_edit')) {
            return abort(401);
        }

        $datacourse = Datacourse::findOrFail($id);
        $datacourse->update($request->all());
        
        
        

        return (new DatacourseResource($datacourse))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('datacourse_delete')) {
            return abort(401);
        }

        $datacourse = Datacourse::findOrFail($id);
        $datacourse->delete();

        return response(null, 204);
    }
}
