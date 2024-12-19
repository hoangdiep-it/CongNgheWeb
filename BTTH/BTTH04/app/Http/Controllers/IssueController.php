<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Http\Request;

class IssueController extends Controller
{
   
    //Hiển thị danh sách các đồ án kiểu CÓ PHÂN TRANG dùng paginate
    public function index()
    {
        // Sử dụng paginate thay vì all()
        $issues = Issue::with('Computer')->paginate(10); // Lấy 5 bản ghi mỗi trang
        return view('issues.index', compact('issues'));
    }

    // Hiển thị form tạo đồ án mới
    public function create()
    {
        $computers = Computer::all(); // Lấy danh sách sinh viên để chọn
        return view('issues.create', compact('computers'));
    }

    // Lưu đồ án mới
    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'required|max:255',
            'reported_date' =>'required',
            'urgency' => 'required|max:255',
            'status' => 'required|max:255',
        ]);

        Issue::create($request->all());

        return redirect()->route('issues.index')->with('success', 'Đồ án đã được thêm thành công!');
    }

    // Hiển thị form chỉnh sửa đồ án
    public function edit($id)
    {
        $issue = Issue::findOrFail($id);
        $computers = Computer::all();
        return view('issues.edit', compact('issue', 'computers'));
    }

    // Cập nhật thông tin đồ án
    public function update(Request $request, $id) {
        // Kiểm tra dữ liệu đầu vào (validation)
        $request->validate([
          'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'required|max:255',
            'reported_date' =>'required',
            'urgency' => 'required|max:255',
            'status' => 'required|max:255',
        ]);
    
 
        $issue = Issue::find($id);
        
        // Cập nhật thông tin
        $issue->update($request->all());
    
        // Điều hướng trở lại trang index với thông báo thành công
        return redirect()->route('issues.index')->with('success', 'Đồ án được cập nhật thành công');
    }
    

    // Xóa đồ án
    public function destroy($id)
    {
        $issue = Issue::findOrFail($id);
        $issue->delete();

        return redirect()->route('issues.index')->with('success', 'Đồ án đã được xóa thành công!');
    }
}
