<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
                        'name_ar'=>'required',
                        'name_en'=>'required',
                        'store_id'=>'required',
                        'quantity'=>'required',
                        'price'=>'required',
                        'store_category_id'=>'required',


                    );
                }
            case 'PUT':
                {

                    return array(
                        'name_ar'=>'required',
                        'name_en'=>'required',
                        'store_id'=>'required',
                        'quantity'=>'required',
                        'price'=>'required',
                        'store_category_id'=>'required',

                    );
                }
            case 'PATCH':

        }
    }
}
