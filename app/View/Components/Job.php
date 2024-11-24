<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Job extends Component
{
    /**
     * Create a new component instance.
     */
    public string $jobName, $location, $employmentType, $companyImage, $date,$slug;
    public int $minSalary, $maxSalary;

    public function __construct(string $jobName, string $location, string $employmentType, string $companyImage, string $date, int $minSalary, int $maxSalary,string $slug)
    {
        $this->jobName = $jobName;
        $this->location = $location;
        $this->employmentType = $employmentType;
        $this->companyImage = $companyImage;
        $this->date = $date;
        $this->minSalary = $minSalary;
        $this->maxSalary = $maxSalary;
        $this->slug = $slug;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.job');
    }
}