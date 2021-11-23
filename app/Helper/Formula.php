<?php
namespace App\Helper;
use FormulaParser\FormulaParser;
use Illuminate\Support\Str;

class Formula
{
    /** Return variables of formula
     * @param $formula
     * @return array
     */
    public static function getFormulaVariables($formula){

        $regex = '/[\d\)\(\/%*+-]+/';

        return preg_split($regex,$formula);

    }
    public static function checkFormula($formula){
        $variables = Formula::getFormulaVariables($formula);
        $new_formula = $formula;
        $data = array();
        if (in_array('{basic salary}',$variables)){
            $new_formula = str_replace("{basic salary}","x",$new_formula);
            $data['x'] = 100;
        }
        if (in_array('{years}',$variables)){
            $new_formula = str_replace("{years}","y",$new_formula);
            $data['y'] = 2;
        }
        if (in_array('{hours}',$variables)){
            $new_formula = str_replace("{hours}","z",$new_formula);
            $data['z'] = 2;
        }
        if (in_array('{salary per hour}',$variables)){
            $new_formula = str_replace("{salary per hour}","a",$new_formula);
            $data['a'] = 2;
        }
        if (in_array('{days}',$variables)){
            $new_formula = str_replace("{days}","b",$new_formula);
            $data['b'] = 2;
        }
        if (in_array('{salary per day}',$variables)){
            $new_formula = str_replace("{salary per day}","c",$new_formula);
            $data['c'] = 2;
        }
        if (Str::contains($new_formula, '%')){
            $new_formula = str_replace("%","/100",$new_formula);
        }


        return Formula::checkFormulaValidity($new_formula,$data);
    }
    public static function checkFormulaValidity($formula,$variables){

        $parser = new FormulaParser($formula);
        $parser->setValidVariables(['x', 'y', 'z', 'a', 'b','c','d','f']);
        $parser->setVariables($variables);
        return $parser->getResult();
    }

}
?>