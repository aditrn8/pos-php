<?php 
    function convertDateFormat($dateString)
    {
        $date = new DateTime($dateString);

        $formattedDate = $date->format('j M Y');

        return $formattedDate;
    }
