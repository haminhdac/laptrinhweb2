<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categori;

class CategoriController extends Controller
{
    //hiển thị danh sách danh mục
    public function index()
    {

        $perPage = 5;
        $spdm = Categori::paginate($perPage);


    return view('admin_danhmucSP.index')->with('categoris',  $spdm);

    }

    //hiển thị form trên danh mục
    public function create()
    {
        return view('admin_danhmucSP.create_danhmucSP');
    }


    // them danh mục mới vào cơ sở dữ liệu
    public function AddNewDanhMucSP(Request $request)
    {
      // Validate request data
      $validatedData = $request->validate([
        'name' => 'required'

    ]);

    // Create new categori
    $category = new Categori();
    $category->name =$validatedData['name'];

    $category->save();

    return redirect()->route('admin_danhmucSP.index')->with('success', 'danh mục được thêm thành công!');
}

// hiển thị form chỉnh sửa
public function edit($id)
{
    $category= Categori::findOrFail($id);
return view('admin_danhmucSP.update_danhmucSP', compact('category'));
}
// cập nhật thông tin danh mục
public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255'
    ]);
    $category = Categori::findOrFail($id);

  // Update category name
  $category->name = $validatedData['name'];
  $category->save();


return redirect()->route('admin_danhmucSP.index')->with('success', 'update thành công!');
}


    // xóa danh mục

    public function destroy($id)
    {
        $category = Categori::findOrFail($id);
        $category->delete();

        return redirect()->route('admin_danhmucSP.index')->with('success', 'xóa danh mục thành công!');
    }
}
