<?php namespace App\Observer;
 
use App\Course;
 
class CourseObserver
{
    public function updated(Course $course) {
        $programmes = $course->programmes()->get();
        
        foreach ($programmes as $programme) {
            $courses = $programme->courses()->get();
            $total = 0;
            
            foreach ($courses as $course) {
            $total += $course->creditHours;
            }
            $programme->totalCreditHours = $total;
            $programme->save();
        }
    }
}