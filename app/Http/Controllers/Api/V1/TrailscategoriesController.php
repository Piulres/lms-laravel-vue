<?php

namespace App\Http\Controllers\Api\V1;

use App\Trailscategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\Trailscategory as TrailscategoryResource;
use App\Http\Requests\Admin\StoreTrailscategoriesRequest;
use App\Http\Requests\Admin\UpdateTrailscategoriesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class TrailscategoriesController extends Controller
{
    public function index()
    {
        

        return new TrailscategoryResource(Trailscategory::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('trailscategory_view')) {
            return abort(401);
        }

        $trailscategory = Trailscategory::with([])->findOrFail($id);

        return new TrailscategoryResource($trailscategory);
    }

    public function store(StoreTrailscategoriesRequest $request)
    {
        if (Gate::denies('trailscategory_create')) {
            return abort(401);
        }

        $trailscategory = Trailscategory::create($request->all());
        
        

        return (new TrailscategoryResource($trailscategory))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateTrailscategoriesRequest $request, $id)
    {
        if (Gate::denies('trailscategory_edit')) {
            return abort(401);
        }

        $trailscategory = Trailscategory::findOrFail($id);
        $trailscategory->update($request->all());
        
        
        

        return (new TrailscategoryResource($trailscategory))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('trailscategory_delete')) {
            return abort(401);
        }

        $trailscategory = Trailscategory::findOrFail($id);
        $trailscategory->delete();

        return response(null, 204);
    }
}
