<?php

namespace Strategy;


interface TaxCalculator {
    public function calculateTax(int $amount): int;
}

class FlatTaxCalculator implements TaxCalculator {
    public function calculateTax(int $amount): int
    {
        return $amount * 0.1;
    }
}
class ProgressiveTaxCalculator implements TaxCalculator {
    public function calculateTax(int $amount): int
    {
        if ($amount > 50000) {
            return $amount * 0.2;
        }

        return $amount * 0.1;
    }
}

class FixedAmountTaxCalculator implements TaxCalculator {
    public function calculateTax(int $amount): int
    {
        return $amount - 10;
    }
}

class TaxContext {
    protected int $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function calculateTax(TaxCalculator $taxCalculator) {
        return $taxCalculator->calculateTax($this->amount);
    }
}

$tax = new TaxContext(3000);
echo $tax->calculateTax(new FlatTaxCalculator());
echo $tax->calculateTax(new FixedAmountTaxCalculator());
echo $tax->calculateTax(new ProgressiveTaxCalculator());