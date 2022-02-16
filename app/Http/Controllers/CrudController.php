<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function getIndex()
    {
       $query = \App\Models\Student::query();

       // 全件取得 +ページネーション
       $students = $query->orderBy('id','desc')->paginate(5);
       return view('boot_template.index')->with('students',$students);
    }

    public function new_index()
    {
        return view('boot_template.new_index');
    }

    public function new_confirm(\App\Http\Requests\ValiCrudRequest $req)
    {
        $data = $req->all();
        return view('boot_template.new_confirm')->with($data);
    }

    public function new_finish(Request $request)
    {
        // Studentオブジェクト生成
        $student = new \App\Models\Student;

        // 値の登録
        $student->name = $request->name;
        $student->email = $request->email;
        $student->tel = $request->tel;
        $student->message = $request->message;

        // 保存
        $student->save();

        // 一覧にリダイレクト
        return redirect()->to('crud');
    }

}
