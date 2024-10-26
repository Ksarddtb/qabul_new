<?php

namespace Database\Seeders;

use App\Services\Hemis\DepartmentServices;
use App\Services\Hemis\SpecialityServices;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Throwable;

class HemisSeeder extends Seeder
{
    public function __construct(protected DepartmentServices $department,
                                protected SpecialityServices $speciality)
    {
    }

    /**
     * Run the database seeds.
     * @throws Throwable
     */
    public function run(): void
    {
        $this->department->all();
        $this->speciality->all();
    }
}
