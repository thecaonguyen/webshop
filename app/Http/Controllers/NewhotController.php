<?php

namespace App\Http\Controllers;

use App\Newhot;
use Illuminate\Http\Request;

class NewhotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Newhot::all();
        return view('admin.new.index', [
               'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.new.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
         ]);

        $new = new Newhot(); // khởi tạo model
        $new->name = $request->input('name');

        // Upload file
        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/new/';
            // Thực hiện upload file
            $request->file('image')->move($path_upload,$filename); // upload lên thư mục public/uploads/new

            $new->image = $path_upload.$filename;
        }

        // Trạng thái
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $new->is_active = $request->input('is_active');
        }
        $new->url = $request->input('url');
        $new->summary = $request->input('summary');
        $new->description = $request->input('description');
        $new->save();

        // chuyển hướng đến trang
        return redirect()->route('admin.new.index');
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);

        $new = Newhot::findorFail($id);; // khởi tạo model
        $new->name = $request->input('name');
        $new->slug = str_slug($request->input('name'));

        // Thay đổi ảnh
        if ($request->hasFile('new_image')) {
            // xóa file cũ
            @unlink(public_path($new->image));
            // get file mới
            $file = $request->file('new_image');
            // get tên
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/new/';
            // upload file
            $request->file('new_image')->move($path_upload,$filename);

            $new->image = $path_upload.$filename;
        }

        // Trạng thái
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $new->is_active = $request->input('is_active');
        }

        $new->url = $request->input('url');
        $new->summary = $request->input('summary');
        $new->description = $request->input('description');
        $new->save();

        // chuyển hướng đến trang
        return redirect()->route('admin.new.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // gọi tới hàm destroy của laravel để xóa 1 object
        Newhot::destroy($id);

        // Trả về dữ liệu json và trạng thái kèm theo thành công là 200
        return response()->json([
            'status' => true
        ], 200);
    }
}
