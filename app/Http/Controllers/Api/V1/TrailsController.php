<?php

namespace App\Http\Controllers\Api\V1;

use App\Trail;
use App\Http\Controllers\Controller;
use App\Http\Resources\Trail as TrailResource;
use App\Http\Requests\Admin\StoreTrailsRequest;
use App\Http\Requests\Admin\UpdateTrailsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class TrailsController extends Controller
{
    public function index()
    {
        

        return new TrailResource(Trail::with(['categories', 'courses'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('trail_view')) {
            return abort(401);
        }

        $trail = Trail::with(['categories', 'courses'])->findOrFail($id);

        return new TrailResource($trail);
    }

    public function store(StoreTrailsRequest $request)
    {
        if (Gate::denies('trail_create')) {
            return abort(401);
        }

        $trail = Trail::create($request->all());
        $trail->categories()->sync($request->input('categories', []));
        $trail->courses()->sync($request->input('courses', []));
        

        return (new TrailResource($trail))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateTrailsRequest $request, $id)
    {
        if (Gate::denies('trail_edit')) {
            return abort(401);
        }

        $trail = Trail::findOrFail($id);
        $trail->update($request->all());
        $trail->categories()->sync($request->input('categories', []));
        $trail->courses()->sync($request->input('courses', []));
        
        

        return (new TrailResource($trail))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('trail_delete')) {
            return abort(401);
        }

        $trail = Trail::findOrFail($id);
        $trail->delete();

        return response(null, 204);
    }
}
