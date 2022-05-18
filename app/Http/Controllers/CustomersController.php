<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Models\Customer;

class CustomersController extends Controller
{

    public function index()
    {
        $customers = Customer::all();

        return response()->json($customers, 200);
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);

        return response()->json($customer, 200);
    }

    public function create(Request $request)
    {

        $rule = [
            'title' => 'required|string',
            'name' => 'required|string',
            'surname' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'profile_image' => 'image|required_if:use_placeholder,0'
        ];

        $validator = Validator::make($request->all(), $rule);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $customer = new Customer();
        $customer->title = $request->input('title');
        $customer->name = $request->input('name');
        $customer->surname = $request->input('surname');
        $customer->phone = $request->input('phone');
        $customer->email = $request->input('email');

        if ($request->input('use_placeholder') === 0) {

            $imgName = sha1(time()) . $request->img->extension();
            $validator->img->move(public_path('/img/'), $imgName);
            $customer->profile_image = 'img/' . $imgName;
        } else {

            if ($request->input('title') === 'Mr.') {
                $customer->profile_image = 'img/man_placeholder_' . random_int(1, 6) . '.svg';
            } else {
                $customer->profile_image = 'img/woman_placeholder_' . random_int(1, 6) . '.svg';
            }
        }

        $customer->save();

        return response()->json($customer, 201);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);


        $rule = [
            'title' => 'required|string',
            'name' => 'required|string',
            'surname' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email'
        ];

        $validator = Validator::make($request->all(), $rule);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $customer->title = $request->input('title');
        $customer->name = $request->input('name');
        $customer->surname = $request->input('surname');
        $customer->phone = $request->input('phone');
        $customer->email = $request->input('email');
        $customer->save();

        return response()->json($customer, 201);
    }

    public function delete($id)
    {
        $customer = Customer::findOrFail($id);

        $customer->delete();

        return response()->json([], 200);
    }
}
