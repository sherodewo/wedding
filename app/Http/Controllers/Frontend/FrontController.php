<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Kebaya;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class FrontController extends Controller
{
    private $kebayamodel;

    public function __construct(Kebaya $kebaya){
        $this->kebayamodel = new Kebaya();
    }

    public function index()
    {
//        $data = $this->kebayamodel->name;
        return view('admin.frontend.index');
    }

    public function dataTables()
    {
        $data =numrows($this->kebayamodel->all());
        return DataTables::of($data)
            ->editColumn('name',function ($data) {
            })
            ->make(true);
    }
}