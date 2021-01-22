<?php


namespace App\Helpers;


class CustomPaginator
{

    public static function getPaginator($page)
    {
        $items = array("Zack", "Anthony", "Ram", "Salim", "Raghav", "Anthony", "Ram", "Salim", "Raghav", "Raghav","Zack", "Anthony", "Ram", "Salim", "Raghav",);
        dump($items);

        $total = count($items);
        $page = $page ? $page : 1; // get current page from the request, first page is null
        $perPage = 5; // how many items you want to display per page?
        $offset = ($page - 1) * $perPage; // get the offset, how many items need to be "skipped" on this page
        $items = array_slice($items, $offset, $perPage); // the array that we actually pass to the paginator is sliced

        dump('total - '.$total);
        dump('page - '.$page);
        dump('perPage - '.$perPage);
        dump('offset - '.$offset);
        dd($items);
    }
}
