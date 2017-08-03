<?php

namespace CodePublisher\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        //dd($this->id); // null
        //dd($this->name);
        //dd($this->category); // 1 // category/{category}

        //\Lang::get('validation.required');
        return [
            'name' => 'required|max:255|unique:categories,name,' . $this->category
        ];
    }

    public function messages()
    {
        return [
            //'required' => 'O :attribute é obrigatório',
            //'unique' => 'O :attribute digitado já existe'

            //'name.required' => 'O nome é obrigatório',
            //'name.unique' => 'O nome digitado já existe'
        ];
    }

    public function attributes()
    {
        return [
            //'name' => 'nome'
        ];
    }
}
