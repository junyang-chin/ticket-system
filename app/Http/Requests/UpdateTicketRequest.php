<?php

namespace App\Http\Requests;

use App\Enums\TicketStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTicketRequest extends FormRequest
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
            'id' => 'prohibited',
            'title' => 'string',
            'description' => 'string',
            'category_id' => 'exists:categories,id',
            'ticket_status_id' => 'exists:ticket_statuses,id',
            'ticket_priority_id' => 'exists:ticket_priorities,id',
            'comment' => 'string'

        ];
    }
}
