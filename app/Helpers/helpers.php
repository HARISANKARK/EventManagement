<?php

use Carbon\Carbon;

function dmYConverter($date)
{
    // Create a Carbon instance from the input date
    $date = Carbon::createFromFormat('Y-m-d', $date);

    // Format the date to d-m-Y
    $formattedDate = $date->format('d-m-Y');

    return $formattedDate;
}
