<?php

namespace App\Http\Controllers;

use App\Models\Gene;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies= DB::table('movies')
            ->join('genes','movies.gene_id','=','genes.id')
            ->select('movies.*','genes.name as gene')
            ->where('movies.deleted_at',null)
            ->orderBy('movies.id','desc')
            ->paginate(10);

        return view('movies.index',compact('movies'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genes = Gene::all();
        return view('movies.add',compact('genes'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $param=$request->validate(
            [
                'title'=>'required|unique:movies,title',
                'poster'=>'required|image|max:2048',
                'intro'=>'required',
                'release_date'=>'required|date|after_or_equal:today',
                'gene_id'=>'required'
            ],[
                'title.required'=>'Không được bỏ trống',
                'title.unique'=>'Đã tồn tại',
                'poster.required'=>'Không được bỏ trống',
                'poster.image'=>'Không phải ảnh',
                'poster.max'=>'Hình ảnh không được vượt quá 2MB.',
                'intro.required'=>'Không được bỏ trống',
                'release_date.required'=>'Không được bỏ trống',
                'release_date.after_or_equal'=>'Ngày không được nhỏ hơn ngày hiện tại.',
                'gene_id.required'=>'Không được bỏ trống',

            ]
        );
        $poster = "";

        if ($request->hasFile('poster')) {
            $poster = $request->file('poster')->store('images','public');
        }
        $param['poster']= $poster;
        Movie::query()->create($param);
        return redirect()->route('movie')->with('message', 'Thêm phim thành công!');

    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $movie= Movie::find($id);

        return view('movies.detail',compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $movie= Movie::find($id);
        $genes = Gene::all();
        return view('movies.update',compact('movie','genes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $param = $request->validate(
            [
                'title' => 'required|unique:movies,title,' . $movie->id,
                'poster' => 'nullable|image|max:2048',
                'intro' => 'required',
                'release_date' => 'required|date|after_or_equal:today',
                'gene_id' => 'required'
            ],
            [
                'title.required' => 'Không được bỏ trống',
                'title.unique' => 'Đã tồn tại',
                'poster.image' => 'Không phải ảnh',
                'poster.max' => 'Hình ảnh không được vượt quá 2MB.',
                'intro.required' => 'Không được bỏ trống',
                'release_date.required' => 'Không được bỏ trống',
                'release_date.after_or_equal' => 'Ngày không được nhỏ hơn ngày hiện tại.',
                'gene_id.required' => 'Không được bỏ trống',
            ]
        );

        if ($request->hasFile('poster')) {
            // Xóa poster cũ nếu có
            if ($movie->poster) {
                Storage::disk('public')->delete($movie->poster);
            }
            // Lưu poster mới
            $param['poster'] = $request->file('poster')->store('images', 'public');
        }

        $movie->update($param);
        return redirect()->route('movie')->with('message', 'Cập nhật phim thành công!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $movieDl=Movie::find($id)->delete();
        if ($movieDl) {
            Session::flash('success', 'Delete Successfully');
            return redirect()->route('movie');
        }

    }
}
