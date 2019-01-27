<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Models\Company;

/**
 *
 * @property mixed company
 */
class CompanyRequest extends FormRequest
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
            case 'POST':
                {
                    return [
                        'name' => 'required|max:255',
                        'email' => 'nullable|email|unique:companies',
                        'website' => 'nullable|max:255|unique:companies',
                        'logo' => 'nullable|image|max:1999'
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name' => 'required|max:255',
                        'email' => 'nullable|email|unique:companies' . $this->company->id,
                        'website' => 'nullable|max:255|unique:companies' . $this->company->id,
                        'logo' => 'nullable|image|max:1999'
                    ];
                }
            default:
                break;
        }
    }
}
