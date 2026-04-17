<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Hiển thị danh sách
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('student_code', 'like', "%{$search}%")
                    ->orWhere('full_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $students = $query->orderBy('id', 'desc')->paginate(10);
        return view('students.index', compact('students'));
    }

    // Form thêm
    public function create()
    {
        return view('students.create');
    }

    // Xử lý thêm
    public function store(Request $request)
    {
        // Validate dữ liệu
        $validator = Validator::make($request->all(), [
            'student_code' => 'required|unique:students',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'phone' => 'nullable|string|max:15',
            'birth_date' => 'required|date',
            'gender' => 'required|in:Nam,Nữ',
            'address' => 'required|string',
            'class_name' => 'required|string',
            'major' => 'required|string',
            'gpa' => 'nullable|numeric|min:0|max:4',
            'status' => 'required|in:active,inactive,graduated'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Thêm sinh viên
        $student = Student::create($request->all());

        if ($student) {
            return redirect()->route('students.index')
                ->with('success', 'Thêm sinh viên thành công!');
        } else {
            return back()->with('error', 'Thêm sinh viên thất bại!')->withInput();
        }
    }

    // Xem chi tiết
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    // Form sửa
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    // Xử lý sửa
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        // Validate dữ liệu
        $validator = Validator::make($request->all(), [
            'student_code' => 'required|unique:students,student_code,' . $id,
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'phone' => 'nullable|string|max:15',
            'birth_date' => 'required|date',
            'gender' => 'required|in:Nam,Nữ',
            'address' => 'required|string',
            'class_name' => 'required|string',
            'major' => 'required|string',
            'gpa' => 'nullable|numeric|min:0|max:4',
            'status' => 'required|in:active,inactive,graduated'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Cập nhật sinh viên
        $updated = $student->update($request->all());

        if ($updated) {
            return redirect()->route('students.index')
                ->with('success', 'Cập nhật sinh viên thành công!');
        } else {
            return back()->with('error', 'Cập nhật thất bại!')->withInput();
        }
    }

    // Xóa
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Xóa sinh viên thành công!');
    }
}
