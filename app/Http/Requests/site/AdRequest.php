<?php

namespace App\Http\Requests\site;

use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                {
                    return array();
                }
            case 'POST':
                {
                    return array(
                        'name'=>'required',
                        'desc'=>'required',
                        'city_id'=>'required',
                        'category_id'=>'required',

                    );
                }
            case 'PUT':
                {

                    return array(
                        'name'=>'required',
                        'desc'=>'required',
                        'city_id'=>'required',
                        'town_id'=>'required',
                        'category_id'=>'required',
                        'sub_category_id'=>'required',

                    );
                }
            case 'PATCH':

        }
    }
}
