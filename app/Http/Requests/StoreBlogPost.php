<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
    public function rules()
    {
        return [
        //'title' =>'bail|alpha|between:3,6',
        //'email' =>'bail|required|email|confirmed',
         // 'content' =>'required',
         // 'tos' =>'accepted',
         // 'website' =>'active_url',
         // 'start_date' =>'required|date',
         // 'end_date' =>'required|date|after:start_date',
         //'website' =>'active_url',
        ];
    }
}
