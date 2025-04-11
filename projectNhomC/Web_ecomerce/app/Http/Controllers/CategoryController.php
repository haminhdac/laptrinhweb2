<?php
namespace App\Models;
namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class CategoryController extends Controller
{
    use HasApiTokens, HasFactory, Notifiable;
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

// hàm hiển thị  danh sách danh mục và phân trang
     public function index()
    {
        $perPage = 5;
        $categories = Category::paginate($perPage);
       return view('admin_category.index', compact('categories'));
    }

    public function create()
    {
        // return view('categories.create');
        return view('admin_category.createCategory');
    }

    // Thêm danh mục mới vào cơ sở dữ liệu
    public function AddNewcategory(Request $request)
    {
        // Nhận dữ liệu từ yêu cầu
        $name = $request->input('name');
        $type_name = $request->input('type_name');
        $type_id = $request->input('type_id');
        $type_logo = $request->input('type_logo');
        $type_idlogo = $request->input('type_idlogo');

        // Tạo một đối tượng mới của mô hình Category
        $category = new Category();
        $category->name = $name;
        $category->type_name = $type_name;
        $category->type_id = $type_id;
        $category->type_logo = $type_logo;
        $category->type_idlogo = $type_idlogo;

        // Lưu đối tượng mô hình vào cơ sở dữ liệu
        $category->save();

        // Chuyển hướng người dùng sau khi thêm thành công
        return redirect()->route('admin_category.index')->with('success', 'danh mục được thêm thành công!');
    }

    // update danh mục
    public function update(Request $request, $id)
    {
        // Nhận dữ liệu từ yêu cầu
        $name = $request->input('name');
        $type_name = $request->input('type_name');
        $type_id = $request->input('type_id');
        $type_idlogo = $request->input('type_idlogo');

        // Tìm kiếm danh mục cần cập nhật
        $category = Category::findOrFail($id);

        // Cập nhật thông tin danh mục
        $category->name = $name;
        $category->type_name = $type_name;
        $category->type_id = $type_id;
        $category->type_idlogo = $type_idlogo;

        // Kiểm tra xem có hình ảnh type_logo được tải lên không
        if ($request->hasFile('type_logo')) {
            $imageName = time() . '.' . $request->file('type_logo')->getClientOriginalExtension();
            $request->file('type_logo')->move(public_path('img'), $imageName);
            $category->type_logo = $imageName;
        }
        $category->save();
        return redirect()->route('admin_category.index')->with('success', 'Cập nhật thành công!');
    }

    // hiển thị form chỉnh sửa
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin_category.updateCategori', compact('category'));
    }
    // hàm xóa danh mục
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin_category.index')->with('success', 'xóa danh mục thành công!');
    }

    // Tìm kiếm sản phẩm theo type_name của category
public function searchByCategory(Request $request)
{
    // Nhận từ khóa tìm kiếm từ yêu cầu
    $searchKeyword = $request->input('search');

    // Thực hiện truy vấn để tìm kiếm sản phẩm
    $products = Product::whereHas('category', function ($query) use ($searchKeyword) {
        $query->where('type_name', 'like', "%$searchKeyword%");
    })->get();

    // Trả về view hiển thị kết quả tìm kiếm
    return view('search_results', compact('products'));
}

}
