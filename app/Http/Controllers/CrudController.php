<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function getIndex(Request $rq)
    {
       $keyword = $rq->input('keyword');
       $query = \App\Models\Student::query();

       if(!empty($keyword))
       {
        $query->where('name','like',"%$keyword%"); 
        $query->orWhere('email','like',"%$keyword%"); 

       }
    
       // 全件取得 +ページネーション
       
       $students = $query->orderBy('id','desc')->paginate(5);

       return view('boot_template.index')->with('students',$students)
                                         ->with('keyword',$keyword);

       
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
        return redirect()->to('boot_template/list')->with('flashmessage','登録が完了しました。');
    }

    public function edit_index($id)
    {
        $student = \App\Models\Student::findOrFail($id);
        return view('boot_template.edit_index')->with('student',$student)
                                               ->with('id',$id);
    }

    public function edit_confirm(\App\Http\Requests\ValiCrudRequest $req)
    {
        $data = $req->all();
        return view('boot_template.edit_confirm')->with($data);
    }

    public function edit_finish(Request $request, $id)
    {
        //該当レコードを抽出
        $student = \App\Models\Student::findOrFail($id);

        //値を代入
        $student->name = $request->name;
        $student->email = $request->email;
        $student->tel = $request->tel;
        $student->message = $request->message;

        //保存（更新）
        $student->save();

        //リダイレクト
        return redirect()->to('boot_template/list')->with('flashmessage','編集が完了しました。');
    }
   
    //詳細画面
    public function detail_index($id)
    {
        $student = \App\Models\Student::findOrFail($id);
        return view('boot_template.detail')->with('student',$student);
    }

    public function us_delete($id)
    {
        $user = \App\Models\Student::find($id);
        $user->delete();
        return redirect()->to('boot_template/list')->with('flashmessage','削除が完了しました。');
    }

}
