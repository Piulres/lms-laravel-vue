<?php

namespace App\Http\Controllers\Api\V1;

use App\Datatrail;
use App\Http\Controllers\Controller;
use App\Http\Resources\Datatrail as DatatrailResource;
use App\Http\Requests\Admin\StoreDatatrailsRequest;
use App\Http\Requests\Admin\UpdateDatatrailsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class DatatrailsController extends Controller
{
    public function index()
    {
        

        return new DatatrailResource(Datatrail::with(['trail', 'user'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('datatrail_view')) {
            return abort(401);
        }

        $datatrail = Datatrail::with(['trail', 'user'])->findOrFail($id);

        return new DatatrailResource($datatrail);
    }

    public function store(StoreDatatrailsRequest $request)
    {
        if (Gate::denies('datatrail_create')) {
            return abort(401);
        }

        $datatrail = Datatrail::create($request->all());
        
        

        return (new DatatrailResource($datatrail))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateDatatrailsRequest $request, $id)
    {
        if (Gate::denies('datatrail_edit')) {
            return abort(401);
        }

        $datatrail = Datatrail::findOrFail($id);
        $datatrail->update($request->all());
        
        
        

        return (new DatatrailResource($datatrail))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('datatrail_delete')) {
            return abort(401);
        }

        $datatrail = Datatrail::findOrFail($id);
        $datatrail->delete();

        return response(null, 204);
    }
}
