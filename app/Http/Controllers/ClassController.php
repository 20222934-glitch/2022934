<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Hiển thị danh sách lớp học
    public function index(Request $request)
    {
        $query = ClassModel::query();

        // Tìm kiếm
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('class_code', 'like', "%{$search}%")
                    ->orWhere('class_name', 'like', "%{$search}%")
                    ->orWhere('major', 'like', "%{$search}%")
                    ->orWhere('homeroom_teacher', 'like', "%{$search}%");
            });
        }

        // Lọc theo khóa học
        if ($request->has('course') && $request->course != '') {
            $query->where('course', $request->course);
        }

        // Lọc theo học kỳ
        if ($request->has('semester') && $request->semester != '') {
            $query->where('semester', $request->semester);
        }

        // Lọc theo trạng thái
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $classes = $query->orderBy('id', 'desc')->paginate(10);

        return view('classes.index', compact('classes'));
    }

    // Hiển thị form thêm lớp học
    public function create()
    {
        return view('classes.create');
    }

    // Xử lý thêm lớp học
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'class_code' => 'required|unique:classes',
            'class_name' => 'required|string|max:100',
            'major' => 'required|string|max:100',
            'course' => 'required|string|max:20',
            'total_students' => 'nullable|integer|min:0',
            'homeroom_teacher' => 'required|string|max:100',
            'academic_year' => 'required|integer|min:2000|max:2030',
            'semester' => 'required|in:1,2,3',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        ClassModel::create($request->all());

        return redirect()->route('classes.index')
            ->with('success', 'Thêm lớp học thành công!');
    }

    // Hiển thị chi tiết lớp học
    public function show($id)
    {
        $class = ClassModel::findOrFail($id);
        return view('classes.show', compact('class'));
    }

    // Hiển thị form sửa lớp học
    public function edit($id)
    {
        $class = ClassModel::findOrFail($id);
        return view('classes.edit', compact('class'));
    }

    // Xử lý cập nhật lớp học
    public function update(Request $request, $id)
    {
        $class = ClassModel::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'class_code' => 'required|unique:classes,class_code,' . $id,
            'class_name' => 'required|string|max:100',
            'major' => 'required|string|max:100',
            'course' => 'required|string|max:20',
            'total_students' => 'nullable|integer|min:0',
            'homeroom_teacher' => 'required|string|max:100',
            'academic_year' => 'required|integer|min:2000|max:2030',
            'semester' => 'required|in:1,2,3',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $class->update($request->all());

        return redirect()->route('classes.index')
            ->with('success', 'Cập nhật lớp học thành công!');
    }

    // Xóa lớp học
    public function destroy($id)
    {
        $class = ClassModel::findOrFail($id);

        // Kiểm tra xem lớp có sinh viên không
        if ($class->students()->count() > 0) {
            return back()->with('error', 'Không thể xóa lớp học vì còn sinh viên trong lớp!');
        }

        $class->delete();

        return redirect()->route('classes.index')
            ->with('success', 'Xóa lớp học thành công!');
    }
}
