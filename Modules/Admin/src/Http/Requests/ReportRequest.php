<?php

declare(strict_types=1);

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
     * The product validation rules.
     *
     * @return array
     */
    public function rules()
    {
        switch ( $this->method() ) {
                case 'GET':
                case 'DELETE': {
                        return [ ];
                    }
                case 'POST': {
                        return [
                            'product_title'     => "required|unique:products,product_title" ,  
                            'product_category'  => 'required', 
                            'description'       => 'required',
                            'price'             =>  'required|numeric|min:0',
                            'discount'             =>  'required|numeric|min:0',
                            'photo'             => 'required|mimes:jpeg,bmp,png,gif'
                        ];
                    }
                case 'PUT':
                case 'PATCH': {
                     return [
                            'product_title'     => "required" ,  
                            'product_category'  => 'required', 
                            'description'       => 'required',
                            'price'             =>  'required|numeric|min:0',
                            'discount'             =>  'required|numeric|min:0',
                            'photo'             => 'mimes:jpeg,bmp,png,gif'
                        ];
                    
                }
                default:break;
            }
}
