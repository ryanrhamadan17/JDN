<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pop;
use App\Models\Catpop;
use DataTables;
use RealRashid\SweetAlert\Facades\Alert;
class PopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    //    $link=route('pop.index');
        if ($request->ajax()) {
            $data = Pop::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('pop.edit',$row->id).'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
   
                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                     return $btn;

                   
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('content.pop.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Pop::get();
        $catpop = Catpop::get();
        return view('content.pop.add', compact(['data', 'catpop']));
       // return view('content.pop.add',compact('data','catpop'));
       // return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return response()->json($request);
        $request->validate([
            'nama' => 'required',
            'desc' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'catpop_id' => 'required',
        ]);
        
        $data = Pop::create($request->all());
      
        if ($data) {
            Alert::success('Success', 'Data\'Berhasil ditambahkan');
            return redirect()->route('pop.index');
        }
        else {
            Alert::error('Failed', 'Registration failed');
            return back();
        }
       
          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $data = Pop::findOrFail($id);
        $catpop = Catpop::get();
        return view('content.pop.edit', compact(['data', 'catpop']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Pop $pop)
    {   
        $pop->update($request->all());


        Alert::success('Success', 'Data\'Berhasil ditambahkan');
            return redirect()->route('pop.index');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
