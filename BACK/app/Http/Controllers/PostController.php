<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Models\Artikel;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // var_dump($_SESSION);
        $data=DB::table('artikels')->orderBy('id', 'desc');
        // $data->where('id',$_SESSION['auth']->id)->get();
        $data=$data;       
        // Artikel::orderBy('times', 'DESC')->get();
        // dd($data);
        return view('artikel/index',['artikels'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'location' => 'required',
            'date' => 'required'
        ]);

        $newImage = date('His').uniqid() . '-' . $request->title . '-' .
        $request->image->extension();

        //Ini masalahnya gak tampil Gus, klo udah nemu kasih tau ya
        // oke

        $request->image->move(public_path('/evenpkg/'), $newImage);
        $bukti = url('/').'/evenpkg/'.$newImage;


        $pin=array(
            'slug' => 0,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $bukti,
            // 'times' => $request->date,
            'location' => $request->location,
            'date' => date('d-m-Y'),
        );
            DB::table('artikels')->insert($pin);
            return redirect()->back()->with(['alert'=>'Data Berhasil dimasukan']);
            // return back()->with();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
