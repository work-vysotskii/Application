<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {

        $applications = App\Application::all();


        return $applications;
    }

    public function store(Request $request)
    {
        $this->validate($request,[

        ]);
        $application = new App\Application;
        $application->full_name = $request->full_name;
        $application->username = $request->username;
        $application->password = $request->password;
        $application->password_confirmation = $request->password_confirmation;
        $application->email = $request->email;
        $application->save();

        return $application;
    }
    public function edit(Request $request, $id)
    {

        $application = App\Application::find($id);
        $application->full_name = $request->full_name;
        $application->username = $request->username;
        $application->password = $request->password;
        $application->password_confirmation = $request->password_confirmation;
        $application->email = $request->email;
        $application->save();
        return $application;
    }
    public function delete(Request $request, $id)
    {

        $application = App\Application::find($id);

        $application->delete();


        return '';
    }
     public function approved(Request $request, $id)
     {
         $application = App\Application::find($id);
         $application->is_approved = true;
         $application->save();
         return $application;
     }

}