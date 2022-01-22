<?php

namespace App\Http\Controllers;

use App\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
   
    public function index()
    {
        $bukus = Buku::latest()->paginate(10);
        return view('index',compact('bukus')) 
        -> with('i', (request()->input('page', 1) - 1) * 2);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
        ]);
  
        Buku::create($request->all());
        return redirect()->route('index')->with('success','Buku Berhasil Dibuat.');
    }

    public function edit($id)
    { 
        $data = Buku::find($id);
        return view('edit',compact('data'));
    }

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
  
        return redirect()->route('index')->with('success','Buku Berhasil Diubah');
    }

    public function destroy($id)
    {
        Buku::where('id',$id)->delete();
        return redirect()->route('index')->with('success','Buku Berhasil dihapus');

    }
}
