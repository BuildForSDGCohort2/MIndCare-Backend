<?php

namespace App\Http\Requests\Api\MentalConditionQuestion;

use App\Http\Requests\Api\BaseRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends BaseRequest
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
            'question' => [
                'required',
                Rule::unique('mental_condition_questions', 'question')->where('mental_condition_id',
                                                                                            $this->mentalConditionId())
            ],
            'options' => 'sometimes|required|array',
            'options.*.option' => 'required',
            'options.*.mark' => 'sometimes|required'
        ];
    }
}
