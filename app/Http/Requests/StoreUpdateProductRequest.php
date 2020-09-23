<?php

//AULA Validações no Laravel 6 com Form Request
//1º Passo: digite no terminal: php artisan make:request StoreUpdateProductRequest


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

     //Verifica se a pessoa tem autorização pra fazer 
    public function authorize()
    {
        return true;//DEIXA TRUEEEEEEEEEE
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    //Vai definir as regras, as validações
    public function rules()
    {
        return [
            'name'=>'required|min:3|max:50',//obrigatória, min 3 caracteres e max 50
            'description'=>'nullable|min:3|max:10000',//não obrigatória, min 3 caracteres e max 10000
            'photo'=>'required|image',//obrigatória, tem q ser imagem
        ]; //agr vai no ProdutoController.php e coloque StoreUpdateProductRequest $request 
    }

    //aqui personaliza as mensagens caso elas não forem preenchidas
    public function messages()
    {
        return[
            'name.required' => 'Nome é totalmente obrigatório!',
            'name.min' => 'Precisa ter no mínimo do mínimo 3 caracteres!',
            'photo.required' => 'Precisa ter um fotinha!',
        ];
    }
}
