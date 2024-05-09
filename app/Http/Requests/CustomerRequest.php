<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest{
   
    public function authorize(): bool{
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array{
        if(request()->isMethod('POST')){
            return [
                'name' => 'required|regex:/^[\pL\s\-]+$/u',
                'description' => 'nullable',
                'price' => 'required',
                'expiry_date' => 'nullable',
                'quantity' => 'required',
				'image' => 'nullable|mimes:jpg,jpeg,png|max:3000',
                'status' => 'nullable',
                'registerby' => 'nullable',
            ];
            
        } elseif(request()->isMethod('PUT')){
            return [
                'name' => 'required|regex:/^[\pL\s\-]+$/u',
                'description' => 'nullable',
                'price' => 'required',
                'expiry_date' => 'nullable',
                'quantity' => 'required',
				'image' => 'nullable|mimes:jpg,jpeg,png|max:3000',
                'status' => 'nullable',
                'registerby' => 'nullable',
            ];
        }
    }
}
