<?php

namespace CodePublisher\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //dd($this->book);

        if ($this->book) {
            $user_id = auth()->user()->id;
            $book = \CodePublisher\Book::findOrFail($this->book);

            return $book->user_id == $user_id;
        } else {
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'price' => 'required|numeric'
        ];
    }

//    public function forbiddenResponse()
//    {
//        return redirect()->back()->withInput()->withErrors('Você não tem permição para editar esse livro!');
//    }
}
