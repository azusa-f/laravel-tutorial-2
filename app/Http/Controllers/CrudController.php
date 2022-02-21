<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


//検索、一覧表示、編集、詳細画面表示、削除
class CrudController extends Controller
{
    //検索
    public function getIndex(Request $rq)
    {
       $keyword = $rq->input('keyword');
       $query = \App\Models\Student::query();

       if(!empty($keyword))
       {
            $query->where('name', 'like', "%$keyword%"); 
            $query->orWhere('email', 'like', "%$keyword%"); 

       }
    
       // 全件取得 +ページネーション
       $students = $query->orderBy('id', 'desc')->paginate(5);
       
       //検索結果と検索ワードを返す
       return view('boot_template.index')->with('students', $students)
                                         ->with('keyword', $keyword);       
    }

    //新規登録の画面表示
    public function new_index()
    {
        return view('boot_template.new_index');
    }

    //新規登録バリデーション
    public function new_confirm(\App\Http\Requests\ValiCrudRequest $req)
    {
        $data = $req->all();
        return view('boot_template.new_confirm')->with($data);
    }
    
    //新規登録のDB登録処理
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

    //編集画面表示
    public function edit_index($id)
    {
        $student = \App\Models\Student::findOrFail($id);
        return view('boot_template.edit_index')->with('student',$student)
                                               ->with('id',$id);
    }

    //編集バリデーション
    public function edit_confirm(\App\Http\Requests\ValiCrudRequest $req)
    {
        $data = $req->all();
        return view('boot_template.edit_confirm')->with($data);
    }
    
    //編集内容DB登録処理
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
        return redirect()->to('boot_template/list')->with('flashmessage', '編集が完了しました。');
    }
   
    //詳細画面
    public function detail_index($id)
    {
        $student = \App\Models\Student::findOrFail($id);
        return view('boot_template.detail')->with('student', $student);
    }

    //削除処理
    public function us_delete($id)
    {
        $user = \App\Models\Student::find($id);
        $user->delete();
        //削除したら一覧表示画面にリダイレクトとダイアログ表示
        return redirect()->to('boot_template/list')->with('flashmessage', '削除が完了しました。');
    }

}
