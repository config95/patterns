<?php

/**
 * Структурный
 * Паттерн адаптер
 * Реализуется если у вас есть интерфейс, а (возможно) внешний классс его не реализует
 */

namespace App\Patterns;
class ThirdPartyPaymentGateway
{
    public function processPayment(float $amount, string $account): bool
    {
        // Обработка платежа через стороннюю систему
        return true;
    }
}

interface PaymentProcessor
{
    public function charge(float $amount, string $customer): bool;
}

class PaymentProcessorAdapter implements \PaymentProcessor
{
    private $adaptee;

    public function __construct()
    {
        $this->adaptee = new \ThirdPartyPaymentGateway();
    }

    public function charge(float $amount, string $customer): bool
    {
        return $this->adaptee->processPayment($amount, $customer);
    }
}