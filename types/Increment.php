<?php
namespace dokuwiki\plugin\struct\types;

use dokuwiki\plugin\struct\meta\QueryBuilder;
use dokuwiki\plugin\struct\meta\QueryBuilderWhere;
use dokuwiki\plugin\struct\meta\ValidationException;

/**
 * Class Autoinc
 *
 * A autoincrementing field
 *
 * @package dokuwiki\plugin\struct\types
 */
class Increment extends Decimal {

    protected $config = [
        'zerofill' => '0'
    ];

    /**
     * Output the stored data
     *
     * @param string|int $value the value stored in the database
     * @param \Doku_Renderer $R the renderer currently used to render the data
     * @param string $mode The mode the output is rendered in (eg. XHTML)
     * @return bool true if $mode could be satisfied
     */
//    public function renderValue($value, \Doku_Renderer $R, $mode) {
//
//        $value = str_pad((string)$value, $this->config['zerofill'], '0', STR_PAD_LEFT);
//        $R->cdata($value);
//        return true;
//    }

    /**
     * This is called when a single string is needed to represent this Type's current
     * value as a single (non-HTML) string. Eg. in a dropdown or in autocompletion.
     *
     * @param string $value
     * @return string
     */
//    public function displayValue($value) {
//        $value = str_pad((string)$this->rawValue($value), $this->config['zerofill'], '0', STR_PAD_LEFT);
//        return $value;
//    }

    /**
     * @param int|string $rawvalue
     * @return int|string
     * @throws ValidationException
     */
    public function validate($rawvalue) {

        $rawvalue = rtrim($rawvalue);

        if((string) $rawvalue != (string) floatval($rawvalue)) {
            throw new ValidationException('Decimal needed');
        }

        return $rawvalue;
    }

}
