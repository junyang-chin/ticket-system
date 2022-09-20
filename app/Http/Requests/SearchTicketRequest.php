<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchTicketRequest extends FormRequest
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
        return [
            //
            'search_user_id' => 'exists:users,id',
            'search_title' => 'string',
            'search_status' => 'string|exists:ticket_statuses,status',
            'search_category' => 'string|exists:categories,name'
        ];
    }
}
