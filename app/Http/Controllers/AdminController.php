<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Attraction;
use App\Genre;
use App\Http\Requests\StoreAttractionRequest;
use App\Http\Requests\UpdateAttractionRequest;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        return view('admin.index', array());
    }

    public function attractions(Request $request = null)
    {
        $search = $request->get('search');

        $attractions = $search ? Attraction::searchText($search)->paginate(7) : Attraction::paginate(7);

        return view('admin.attractions.index', array('attractions' => $attractions, 'search' => $search));
    }

    public function create()
    {
        $genres = Genre::pluck('name', 'id');

        return view('admin.attractions.create', array('genres' => $genres));
    }

    public function store(StoreAttractionRequest $request)
    {
        $attraction = Attraction::create($request->except('image'));
        $file = $request->file('image');
        $file->move(public_path() . '/img/attractions/', $attraction->id . '.' . $file->getClientOriginalExtension());

        return redirect('/admin/attractions');
    }

    public function edit($id)
    {
        $genres = Genre::pluck('name', 'id');
        $attraction = Attraction::find($id);

        return view('admin.attractions.edit', array('attraction' => $attraction, 'genres' => $genres));
    }

    public function update(UpdateAttractionRequest $request, $id)
    {
        $attraction = Attraction::find($id);
        $attraction->update($request->except('image'));

        if (Input::hasFile('image')) {
            $file = $request->file('image');
            $file->move(public_path() . '/img/attractions/', $attraction->id . '.' . $file->getClientOriginalExtension());
        }

        return redirect('/admin/attractions');
    }

    public function destroy ($id) {
        Attraction::destroy($id);

        return redirect('/admin/attractions');
    }
}
