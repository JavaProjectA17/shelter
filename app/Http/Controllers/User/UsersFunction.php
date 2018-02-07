<?php
namespace App\Http\Controllers\User;

class UsersFunction
{

   public static function  GetFromArrey($count, $array)
   {
        $howMuch = count($array);
        $selectedItems = [];
        if($howMuch > $count)
        {
            for($i = 0;$i<$count;$i++)
            {
                do{
                    $item = rand (0,$howMuch-1 );
                }
                while(in_array($selectedItems, [$array[$item]]));
                array_push($selectedItems, $array[$item]);
            }
            return $selectedItems;
        }
        else return $array;


   }
}

?>