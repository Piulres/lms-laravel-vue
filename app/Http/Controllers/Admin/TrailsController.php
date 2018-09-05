<?php

namespace App\Http\Controllers\Admin;

use App\Trail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTrailsRequest;
use App\Http\Requests\Admin\UpdateTrailsRequest;

class TrailsController extends Controller
{
    /**
     * Display a listing of Trail.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {if ($_GATES_$) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('trail_delete')) {
                return abort(401);
            }
            $trails = Trail::onlyTrashed()->get();
        } else {
            $trails = Trail::all();
        }

        return view('admin.trails.index', compact('trails'));
    }

    /**
     * Show the form for creating new Trail.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {if ($_GATES_$) {
            return abort(401);
        }
        
        $categories = \App\Trailscategory::get()->pluck('title', 'id');

        $courses = \App\Course::get()->pluck('title', 'id');


        return view('admin.trails.create', compact('categories', 'courses'));
    }

    /**
     * Store a newly created Trail in storage.
     *
     * @param  \App\Http\Requests\StoreTrailsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrailsRequest $request)
    {if ($_GATES_$) {
            return abort(401);
        }
        $trail = Trail::create($request->all());
        $trail->categories()->sync(array_filter((array)$request->input('categories')));
        $trail->courses()->sync(array_filter((array)$request->input('courses')));



        return redirect()->route('admin.trails.index');
    }


    /**
     * Show the form for editing Trail.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {if ($_GATES_$) {
            return abort(401);
        }
        
        $categories = \App\Trailscategory::get()->pluck('title', 'id');

        $courses = \App\Course::get()->pluck('title', 'id');


        $trail = Trail::findOrFail($id);

        return view('admin.trails.edit', compact('trail', 'categories', 'courses'));
    }

    /**
     * Update Trail in storage.
     *
     * @param  \App\Http\Requests\UpdateTrailsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrailsRequest $request, $id)
    {if ($_GATES_$) {
            return abort(401);
        }
        $trail = Trail::findOrFail($id);
        $trail->update($request->all());
        $trail->categories()->sync(array_filter((array)$request->input('categories')));
        $trail->courses()->sync(array_filter((array)$request->input('courses')));



        return redirect()->route('admin.trails.index');
    }


    /**
     * Display Trail.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {if ($_GATES_$) {
            return abort(401);
        }
        
        $categories = \App\Trailscategory::get()->pluck('title', 'id');

        $courses = \App\Course::get()->pluck('title', 'id');
$datatrails = \App\Datatrail::where('trail_id', $id)->get();

        $trail = Trail::findOrFail($id);

        return view('admin.trails.show', compact('trail', 'datatrails'));
    }


    /**
     * Remove Trail from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {if ($_GATES_$) {
            return abort(401);
        }
        $trail = Trail::findOrFail($id);
        $trail->delete();

        return redirect()->route('admin.trails.index');
    }

    /**
     * Delete all selected Trail at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {if ($_GATES_$) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Trail::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Trail from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {if ($_GATES_$) {
            return abort(401);
        }
        $trail = Trail::onlyTrashed()->findOrFail($id);
        $trail->restore();

        return redirect()->route('admin.trails.index');
    }

    /**
     * Permanently delete Trail from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {if ($_GATES_$) {
            return abort(401);
        }
        $trail = Trail::onlyTrashed()->findOrFail($id);
        $trail->forceDelete();

        return redirect()->route('admin.trails.index');
    }
}
