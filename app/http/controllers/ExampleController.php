<?php
namespace App\Http\Controllers;

use Foxdb\DB;
use App\Http\Models\User;
use Rakit\Validation\Validator;

class ExampleController {
  
  public function exampleRoute() 
  {
    $users = DB::table(User::TABLE)->get();
    $model_users = User::get();
    return blade()->run('index', [
      'users' => $users,
      'model_users' => $model_users
    ]);
  }

  public function exampleValidation()
  {
    // make it
    $validation = (new Validator())->make(input(), [
      'name'                  => 'required',
      'email'                 => 'required|email',
      'password'              => 'required|min:6',
      'confirm_password'       => 'required|same:password',
      'avatar'                => 'required|uploaded_file:0,500K,png,jpeg',
      'skills'                => 'array',
      'skills.*.id'           => 'required|numeric',
      'skills.*.percentage'   => 'required|numeric'
    ]);

    // then validate
    $validation->validate();

    if ($validation->fails()) {
      // handling errors
      $errors = $validation->errors();
      echo "<pre>";
      print_r($errors->firstOfAll());
      echo "</pre>";
      exit;
    } else {
      // validation passes
      echo "Success!";
    }
  }
}