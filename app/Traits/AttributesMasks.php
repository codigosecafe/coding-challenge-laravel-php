<?php

namespace App\Traits;


trait AttributesMasks
{
    /**
     * @param $Movement
     * @return string
     */
    public function removeMaskMovement($Movement): string
    {
        return $this->removeMask($Movement);
    }


    /**
     * @param $string
     * @param array $itens
     * @return string
     */
    public function removeMask( $string, array $itens = ['-', '.', '%', '$', ',', '/', '(', ')', ' ']): string
    {
        if(empty($string)){
            return '';
        }
        return str_replace($itens, '', $string);
    }

    /**
     * @param $Movement
     * @return string
     */
    public function makeMaskMovement($Movement): string
    {
        return $this->makeMask($Movement, '##.###-###');
    }

    /**
     * @param $value
     * @param $mask
     * @return string
     */
    public function makeMask($value, $mask): string
    {

        if(empty($value) || empty($mask)){
            return (!empty($value))? $value : '';
        }

        $value = str_replace(" ", "", $this->removeMask($value));

        for ($i = 0; $i < strlen($value); $i++) {

            if( $value == ""){
                continue;
            }
            $mask[strpos($mask, "#")] = $value[$i];
        }


        return $mask;
    }
}
