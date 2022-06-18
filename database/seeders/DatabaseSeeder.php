<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\JobCategory;
use App\Models\JobShift;
use App\Models\OfferSalary;
use App\Models\Qualification;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $jobCat     = ['Marketing','Customer Service','Human Resource','Project Management','Business Development','Sales & Communication','Teaching & Education','Design & Creative'];

        $jobVacancy = ['400','604','500','104','543','456','435','543'];

        $jobIcons   = ['fa fa-3x fa-mail-bulk','fa fa-3x fa-headset','fa fa-3x fa-user-tie','fa fa-3x fa-tasks','fa fa-3x fa-chart-line','fa fa-3x fa-hands-helping','fa fa-3x fa-book-reader','fa fa-3x fa-drafting-compass'];




        for($i = 0; $i < count($jobCat); $i++){

                $storeJobcat = new JobCategory();
                $storeJobcat->job_category_name = $jobCat[$i];
                $storeJobcat->job_category_icon = $jobIcons[$i];
                $storeJobcat->total_job_vacancy = $jobVacancy[$i];
                $storeJobcat->save();

        }



        $jobShift = ['Featured','Full Time','Part Time'];

        for($k = 0; $k < count($jobShift); $k++){

            $storeJobShift = new JobShift();
            $storeJobShift->job_shift_name	 = $jobShift[$k];
            $storeJobShift->save();

        }

        $qualification = ['Matriculation','Intermediate','Graduate'];



        for($k = 0; $k < count($qualification); $k++){

            $storeQualification = new Qualification([
                'qualification_name' => $qualification[$k]
            ]);

            $storeQualification->save();

        }

        $salary = ['10k-20k','20k-30k','30k-40k','40k-50k','50k-60k'];

        for($k = 0; $k < count($salary ); $k++){

            $storeSalary = new OfferSalary([
                'salary_name' => $salary[$k]
            ]);

            $storeSalary->save();

        }

        $experience = ['fresher','Less than 1 year','2 Year','3 Year','4 Year'];

        for($k = 0; $k < count($experience ); $k++){

            $storeExperience = new Experience([
                'experience_name' => $experience[$k]
            ]);

            $storeExperience->save();

        }

    }
}
