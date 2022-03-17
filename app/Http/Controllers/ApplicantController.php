<?php

namespace App\Http\Controllers;

use App\models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function create(){
        return view('apply.create');
    }

    public function store(){
        $attributes = request()->validate([
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'phone_number' => ['required'],
            'email' => ['max:255'],
            'home_address' => ['required', 'max:255'],
            'preferred_hours_amount' => ['max:255'],
            'commute_preference' => ['max:255'],
            'valid_dot_card' => ['required', 'max:255'],
            'availability' => ['required', 'max:255'],
            'special_considerations' => ['max:255'],
            'usps_experience' => ['required'],
            'employment_history' => ['required'],
            'criminal_history' => ['required'],
            'driver_class' => ['required', 'min:1'],
            'questions_for_employer' => ['max:255']
        ]);

        Applicant::create($attributes);

        return redirect('/')->with('success', "Your application has been submitted.");
    }
}
