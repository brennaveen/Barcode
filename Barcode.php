<?php

class Barcode
{
    private $barcode;
    private $gtin;
    private $length;
    private $isScaleBarcode;
    private $isValid;

    public function __construct($barcode)
    {
        if (!ctype_digit($barcode)) {
            $this->isValid = false;
        }

        $this->barcode = $this->gtin = $barcode;
        $this->_setAttributes();

        switch (strlen($this->barcode)) {
            case 14:
                if ($this->isScaleBarcode) {
                    $this->_removeCheckDigit()->_removePrice()->_addCheckDigit()->_addLeadingZeros();
                }

                break;

            case 13:
                $this->_addLeadingZeros();
                break;

            case 12:
                // Scale PLU
                if ($this->isScaleBarcode) {
                    $this->_removeCheckDigit()->_removePrice()->_addCheckDigit()->_addLeadingZeros();
                } else {
                    $this->_addLeadingZeros();
                }
                break;

            case 11:
                if ($this->isScaleBarcode) {
                    $this->_removePrice()->_addCheckDigit()->_addLeadingZeros();
                } else {
                    $this->_addCheckDigit()->_addLeadingZeros();
                }
                break;

            case 10:
                $this->_addCheckDigit()->_addLeadingZeros();
                break;

            case 9:
                $this->_addCheckDigit()->_addLeadingZeros();
                break;

            case 8:
                $this->_removeCheckDigit()->_removeLeadingZeros()->_expand()->_addCheckDigit()->_addLeadingZeros();
                break;

                // case 7: We don't allow this because there is no way to tell if they omitted the leading zero or the check digit

            case 6:
                $this->_expand()->_addCheckDigit()->_addLeadingZeros();
                break;

            case 5:
            case 4:
            case 3:
            case 2:
            case 1:
                $this->_addCheckDigit()->_addLeadingZeros();
                break;
            default:
                throw new \Exception('Invalid barcode length');
                break;
        }
    }

    //
    // ─── PRIVATE ────────────────────────────────────────────────────────────────────
    //

    public function _addCheckDigit()
    {
        if (strlen($this->gtin) <= 5) {
            $this->gtin .= 0;
        } else if (strlen($this->gtin) < 14) {
            $calculation = 0;
            $barcode = str_pad($this->gtin, 13, '0', STR_PAD_LEFT);

            for ($i = 0; $i < 13; $i++) {
                $calculation += $i % 2 ? $barcode[$i] * 1 : $barcode[$i] * 3;
            }

            $this->gtin .= substr(10 - (substr($calculation, -1)), -1);
        }

        return $this;
    }

    public function _addLeadingZeros()
    {
        $this->gtin = str_pad($this->gtin, 14, '0', STR_PAD_LEFT);

        return $this;
    }

    public function _expand()
    {
        switch ($this->gtin{
        5}) {
            case 0:
            case 1:
            case 2:
                $manufacturerNumber = $this->gtin{
                0} . $this->gtin{
                1} . $this->gtin{
                5} . '00';
                $itemNumber = '00' . $this->gtin{
                2} . $this->gtin{
                3} . $this->gtin{
                4};
                break;

            case 3:
                $manufacturerNumber = $this->gtin{
                0} . $this->gtin{
                1} . $this->gtin{
                2} . '00';
                $itemNumber = '000' . $this->gtin{
                3} . $this->gtin{
                4};
                break;

            case 4:
                $manufacturerNumber = $this->gtin{
                0} . $this->gtin{
                1} . $this->gtin{
                2} . $this->gtin{
                3} . '0';
                $itemNumber = '0000' . $this->gtin{
                4};
                break;

            default:
                $manufacturerNumber = $this->gtin{
                0} . $this->gtin{
                1} . $this->gtin{
                2} . $this->gtin{
                3} . $this->gtin{
                4};
                $itemNumber = '0000' . $this->gtin{
                5};
                break;
        }

        $this->gtin = $manufacturerNumber . $itemNumber;

        return $this;
    }

    private function _removeCheckDigit($barcode = null)
    {
        if ($barcode) {
            return substr($barcode, 0, -1);
        }

        $this->gtin = substr($this->gtin, 0, -1);

        return $this;
    }

    private function _removeLeadingZeros($barcode = null)
    {
        if ($barcode) {
            return ltrim($barcode, '0');
        }

        $this->gtin = ltrim($this->gtin, '0');

        return $this;
    }

    private function _removePrice()
    {
        $this->gtin = substr($this->gtin, 0, -5) . '00000';

        return $this;
    }

    private function _setAttributes()
    {
        $this->length = strlen($this->barcode);

        if (
            ($this->length == 14 && $this->barcode{
            2} == 2) ||
            ($this->barcode{
            0} == 2 && ($this->length == 12 || $this->length == 11))
        ) {
            $this->isScaleBarcode = true;
        } else {
            $this->isScaleBarcode = false;
        }

        return $this;
    }

    //
    // ─── PUBLIC ─────────────────────────────────────────────────────────────────────
    //

    public function getBarcode()
    {
        return $this->barcode;
    }

    public function getGtin($excludeCheckDigit = false, $excludeLeadingZeros = false)
    {
        $gtin = $this->gtin;

        if ($excludeCheckDigit) {
            $gtin = $this->_removeCheckDigit($gtin);
        }

        if ($excludeLeadingZeros) {
            $gtin = $this->_removeLeadingZeros($gtin);
        }

        return $gtin;
    }

    public function isValid()
    {
        return $this->isValid;
    }
}
