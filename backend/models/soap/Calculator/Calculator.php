<?php /** @noinspection ALL */

namespace backend\models\soap\Calculator;

/**
 * Class Calculator
 * @package backend\models\soap
 */
class Calculator
{
    /**
     * @param string $city
     * @param string $name
     * @param Date $date
     * @param string $customParam1
     * @param string $customParam2
     * @param string $customParam3
     *
     * @return backend\models\soap\Calculator\CalculateResult
     */
    public function calculate($city, $name, $date, $customParam1, $customParam2, $customParam3): CalculateResult
    {
        if (new \DateTime($date) < new \DateTime('midnight')) {
            throw new \SoapFault(
                'Sender',
                'The "date" parameter in the request is less than the current day.'
            );
        }

        return new CalculateResult(rand(), "I'm teapot");
    }
}