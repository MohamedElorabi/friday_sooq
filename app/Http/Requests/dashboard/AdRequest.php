<?php

namespace App\Http\Requests\dashboard;

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



                    );
                }
            case 'PUT':
                {

                    return array(
                        'name'=>'required',
                        'desc'=>'required',
                        'mobile'=>'required',
                        'user_name'=>'required',
                        'price'=>'required',
                        'user_id'=>'required',
                        'country_id'=>'required',
                        'city_id'=>'required',
                        'town_id'=>'required',
                        'category_id'=>'required',
                        'sub_category_id'=>'required',
                        'active'=>'required',
                        'whatsapp'=>'required',
                        'call'=>'required',
                    );
                }
            case 'PATCH':

        }
    }
}
