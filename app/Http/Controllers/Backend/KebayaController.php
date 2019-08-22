<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Kebaya\CreateKebayaRequest;
use App\Imports\KebayaImport;
use App\Models\Kebaya;
use App\Exports\KebayaExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use DataTables;


class KebayaController extends Controller
{
    private $kebayaModel;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Kebaya $kebaya)
    {
        $this->kebayaModel = $kebaya;
    }

    public function dataTables()
    {
        $data = numrows($this->kebayaModel->all());
        return DataTables::of($data)
            ->editColumn('image',function ($data){
                $url = Storage::url($data->image);
                return "<img src='".$url."' width='100px'/>";
            })
            ->addColumn('action', function ($data) {
                return
                '<a href="'.route('kebaya.show', $data->id).'" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-search"></i></a>
                <a href="'.route('kebaya.edit', $data->id).'" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                <a href="'.route('kebaya.delete', $data->id).'" class="btn btn-danger btn-circle btn-sm "><i class="fas fa-trash"></i></a>';
            })
            ->rawColumns(['action','image'])
            ->make(true);
    }

    /** show datatable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.backend.kebayas.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.backend.kebayas.create');
    }

    /**
     * @param CreateKebayaRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required'
        ]);
        $image = $request->file('image')->store('public/images');

        $kebaya = new Kebaya([
            'name' => $request->get('name'),
            'image' => $image
        ]);
        $kebaya->save();

        return redirect()->route('kebaya.index')
            ->with('success','kebaya created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Kebaya $data)
    {
        return view('admin.backend.kebayas.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aov  $aov
     * @return \Illuminate\Http\Response
     */
    public function edit(Kebaya $data)
    {
        return view('admin.backend.kebayas.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aov  $aov
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kebaya $data)
    {
        $request->validate([
            'name'=>'required',
            'image' => 'required'
        ]);

        $data->update($request->all());

        return redirect('/kebaya')->with('success', 'Kebaya has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aov  $aov
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kebaya::find($id);
        $data->delete();

        return redirect()->route('kebaya.index')
            ->with('success','kebaya deleted successfully');
    }

    public function export()
    {
        return Excel::download(new KebayaExport(), 'kebaya.xlsx');
    }

    public function import(Request $request)
    {
        Excel::import(new KebayaImport(), request()->file('file'));

        return redirect('/kebaya')->with('success', 'All good!');
    }

    public function imp()
    {
        return view('admin.backend.kebayas.import');
    }
}
