<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//バリデーション
class ValiCrudRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

     //チェック項目
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'tel' => 'required',
            'message' => 'required'
            
        ];
    }

    //不備があった際に表示するメッセージ
    public function messages() {
        return [
            "required" => "必須項目です。",
        ];
      }
}
