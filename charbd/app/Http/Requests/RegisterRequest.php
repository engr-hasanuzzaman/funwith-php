<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
 *  @OA\Schema(
 *     title="Store User Request",
 *     description="New user request body",
 *  )
 */

class RegisterRequest extends FormRequest
{
 
    /** 
    * @OA\Property(
    *      type="string",
    *      title="name"
    * )
    * @var string
    * */
    public $name;

    /** 
     * @OA\Property(
     *  title="email"
     * ) 
     * 
     * @var string
     * */
    public $email;

    /** 
     * @OA\Property(
     *  title="password"
     * ) 
     * 
     * @var string
     * */
    public $password;

    /** 
     * @OA\Property(
     *  title="role_id"
     * ) 
     * 
     * @var integer
     * */
    public $role_id;

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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'role_id' => 'required'
        ];
    }
}
