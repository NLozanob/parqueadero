<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array{
        if(request()->isMethod('POST')){
            return [
                'product_id' =>'required',
                'order_id' =>'required',
                'price' =>'required',
                'quantity' =>'required',
                'subtotal' =>'required',
                'customer_id' =>'required',
                'date' =>'nullable',
                'value' =>'required',
                'status' => 'nullable',
                'route' => 'nullable',
                'registerby' => 'nullable',
            ];
            
        } elseif(request()->isMethod('PUT')){
            return [
                'product_id' =>'required',
                'order_id' =>'required',
                'price' =>'required',
                'quantity' =>'required',
                'subtotal' =>'required',
                'customer_id' =>'required',
                'date' =>'nullable',
                'value' =>'required',
                'status' => 'nullable',
                'route' => 'nullable',
                'registerby' => 'nullable',
            ];
        }
    }
}
