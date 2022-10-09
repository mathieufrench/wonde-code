<?php

namespace App\Services;


class WondeApiService
{
    public $apiClient = null;
    public $schoolID = null;

    public function __construct()
    {
        $authKey = config('wonde.auth_key');
        $schoolId = config('wonde.school');

        if(!$authKey || !$schoolId) {
            // exit;
        }

        $client = new \Wonde\Client($authKey);
        $this->school = $client->school($schoolId);
    }

    public function getEmployees()
    {
        return $this->school->employees->all(
            [],
            ['has_class' => true]
        );
    }

    public function getEmployeeWithClasses($id)
    {
        return $this->school->employees->get(
            $id,
            ['classes']
        );
    }

    public function getClass($id, $classes="")
    {
        return $this->school->classes->get(
            $id,
            ['lessons','students']
        );
    }

    public function getClassesWithStudents($id, $classes="")
    {
        $classes = $this->school->classes->get($id,
            ['students']
        );
        return $classes;
    }
}
