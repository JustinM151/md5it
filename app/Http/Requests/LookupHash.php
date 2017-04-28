<?php

namespace App\Http\Requests;

use App\Md5it\Services\ThrottleService;
use Illuminate\Foundation\Http\FormRequest;

class LookupHash extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return mixed
     */
    public function authorize()
    {
        $throttle = new ThrottleService($this->ip(),3);
        if($throttle->userCanSendRequest()) {
            return true;
        }
        return redirect()->back()->withErrors(['Easy there turbo! Users can only submit 1 request per 3 seconds.']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'hash'=>'required|min:32'
        ];
    }
}
