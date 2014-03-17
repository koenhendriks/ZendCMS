<?php

class ZendCMS_Other_Misc
{
    public function vardump($dump)
    {
        $return = '<pre>';
        $return .= vardump($dump);
        $return .= '</pre>';

        return $return;
    }
}