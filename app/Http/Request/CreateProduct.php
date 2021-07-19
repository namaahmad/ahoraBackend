<?php

namespace  App\Http\Request;

class CreateProduct extends ApiRequest
{
    /**
     * Get data to be validated from the request.
     *
     * @return array
     */
    // protected function validationData()
    // {
    //     return $this->get('article') ?: [];
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|int|min:1000',
            'quantity' => 'required|int|min:0',
        ];
    }
}