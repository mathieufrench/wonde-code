<?php

namespace App\Http\Controllers;

use App\Services\WondeApiService;
use Illuminate\Http\Request;

class CoreController extends Controller
{


    /*
    *
    *   Ideally in here we'd split these out for specific funtions relevent to employee, class etc, but for clarity and ease of review in this instand I decided to keep it all in one file.
    *
    */

    public function index()
    {
        $wondeClient = new WondeApiService();
        $employees = $wondeClient->getEmployees();

        // would probably refine the data to only contain employee names and ID before pushing it out to the view
        return view('employees')
            ->with('employees', $employees);
    }

    public function classes(Request $request)
    {
        $wondeClient = new WondeApiService();

        try {
            $teachersClasses = $wondeClient->getEmployeeWithClasses($request->id);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            abort(404); // dont like just doing a 404, would likely throw an error into the view explaining at  high level what it happening (EG: no classes/students/teachers found etc.)
        }


        /*
        *  Doing this a little icky way, just to show a different technique than students below
        */


        $allLessons = collect();

        // Loop the classes we grabbed via the employee
        foreach ($teachersClasses->classes->data as $class) {
            // Lets get the class specific details so we've got start_at and end_at dates etc.
            $classData = $wondeClient->getClass($class->id);

            // Now lets construct the collection so we can just loop it in the view.
            foreach ($classData->lessons as $lessons) {
                foreach ($lessons as $lesson) {

                    $lessonsCollect = collect($lesson);
                    // this is basically the only reasons we loop at this point, but I wanted to demonstrate it. Useful for display - and again, I'd probably feed these into an separate array to reduce data throughut- but wanted to show knowledge
                    $lessonsCollect->put('classId', $classData->id);
                    $lessonsCollect->put('className', $classData->name);

                    // We obviously dont want to dupe results internally, so we can drop this easily if relevent in some sort of edge case.
                    // Not sure there ever will be dupes, but again, 'showing off'
                    if (!$allLessons->contains($lessonsCollect)) {
                        $allLessons->push($lessonsCollect);
                    }
                }
            }
        }

        // We just want to sort by the start_at date so it's super simple in the view and ordered correctly.
        $weeklyClasses = $allLessons->sortBy('start_at.date');

        return view('classes')
            ->with('classList', $weeklyClasses)
            ->with('teacherName', $teachersClasses->title.' '.$teachersClasses->forename . ' ' . $teachersClasses->surname); // this one is just for some clarity on the page
    }



    public function students(Request $request)
    {

        $wondeClient = new WondeApiService();

        try {
            $classStudents = $wondeClient->getClassesWithStudents($request->id);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            abort(404);
        }

        // a simple collect on the data, as we have a very specific class to work from
        $studentsCollection = collect($classStudents->students->data);

        return view('students')
        ->with('students', $studentsCollection)
        ->with('classStudents', $classStudents); // sending this for peripheral data included - again - would probably draw out what is actually needed into it's own array when passing to the view
    }

}
