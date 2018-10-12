<?php 
namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use App\Validators\Base\BaseValidator;

class AdminValidator extends BaseValidator {

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required',
            'email'  => 'required|email|unique:admin,email',
            'password'=> 'required|min:6|max:8',
            'confirm_password' => 'required_with:password|same:password|min:6|max:8',
            'birth_day' => 'required',
            'role_type' => 'required',
            'avatar' => 'nullable|mimes:jpeg,png,gif,jpg'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required',
            'email'  => 'required|email|unique:admin,email, :id',
            'birth_day' => 'required',
            'role_type' => 'required',
            'avatar' => 'nullable|mimes:jpeg,png,gif,jpg'
        ]
   ];

   // protected $messages = [
   //      'required' => 'Trường :attribute bắt buộc.'
   // ];

    // protected $attributes = [
    //     'rolr_type' => 'role type'
    // ];

}