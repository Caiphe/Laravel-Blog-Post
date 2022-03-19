<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'category_id'=> ['required', Rule::exists('categories', 'id')],
            'user_id' => ['nullable'],
            'title'=>'required|min:3',
            'excerpt' => 'required',
            'slug' => 'nullable',
            'body' =>'required',
            'thumbnail' => 'required|image'
        ];
    }

    public function prepareForValidation(){
        $this->merge([
            'category_id'=>htmlspecialchars($this->category_id),
            'user_id' => htmlspecialchars($this->user_id),
            'title'=> htmlspecialchars($this->title),
            'excerpt' => htmlspecialchars($this->excerpt),
            'slug' => htmlspecialchars($this->slug),
            'body' => htmlspecialchars($this->body),
            'thumbnail' => htmlspecialchars($this->thumbnail),
        ]);
    }
}
