<?php
{
    function formatRupiah($nominal)
    {
        return "Rp. " . number_format( $nominal, 0 ,',' , '.' );
    }

    function decimal($number) {
        $rounded = round($number, 2);
        $ronded = $rounded . "%";
        return $ronded;
      }
}
