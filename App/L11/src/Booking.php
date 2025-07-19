<?php

namespace App\L11\src;

require __DIR__ . '/../../../vendor/autoload.php';

use Carbon\Carbon;
class Booking
{
    private $periods;

    public function __construct()
    {
        $this->periods = [];
    }

    public function book($startDate, $endDate)
    {
        $startDateCarbon = Carbon::create($startDate)->setHour(12);
        $endDateCarbon = Carbon::create($endDate)->setHour(12);

        if ($endDateCarbon->lessThanOrEqualTo($startDateCarbon)) {
            return false;
        } elseif (empty($this->periods)) {
            $this->periods [] = ['startDate' => $startDateCarbon,
                'endDate' => $endDateCarbon];
            return true;
        } else {
            foreach ($this->periods as $period) {
                if (
                    $startDateCarbon->lessThan($period['endDate']) &&
                    $endDateCarbon->greaterThan($period['startDate'])
                ) {
                    return false;
                }
            }
            $this->periods [] = ['startDate' => $startDateCarbon,
                'endDate' => $endDateCarbon];
            return true;
        }
    }
}
