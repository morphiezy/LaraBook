<?php

namespace App\Http\Controllers;

use App\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bukus = Buku::latest()->paginate(10);
        return view('index',compact('bukus')) 
        -> with('i', (request()->input('page', 1) - 1) * 2);
    }

    /**
     * Show the form for creating a new resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
        ]);
  
        Buku::create($request->all());
   
        return redirect()->route('index')->with('success','Buku Berhasil Dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buku  $Buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $Buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buku  $Buku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $data = Buku::find($id);
        return view('edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buku  $Buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        $this->validate($request,[
            'judul' => 'required',
            'pengarang' => 'required',
        ]);
        
        $post = Buku::find($id);
        $post->judul = $request->input('judul');
        $post->pengarang = $request->input('pengarang');
        $post->save();
  
        return redirect()->route('index')
                        ->with('success','Buku Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buku  $Buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Buku::where('id',$id)->delete();
        return redirect()->route('index')
                        ->with('success','Buku Berhasil dihapus');

    }
}
