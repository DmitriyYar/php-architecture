<?php
/*
Стратегия: есть интернет-магазин по продаже носков. Необходимо реализовать возможность
оплаты различными способами (Qiwi, Яндекс, WebMoney). Разница лишь в обработке запроса
на оплату и получение ответа от платёжной системы. В интерфейсе функции оплаты
достаточно общей суммы товара и номера телефона.
*/

interface PaymentInterface
{
    public function send(string $amount, string $telephone);
}

// Способы оплаты (Стратегии)
class QiwiPayment implements PaymentInterface
{
    public function send(string $amount, string $telephone)
    {
        $this->sendSms($telephone);
        $this->pay($amount);
    }

    private function sendSms(string $telephone)
    {
        //отправка sms на телефон и потдверждение ответа
        echo "Sms to the phone: $telephone" . "  ";
    }

    private function pay(string $price)
    {
        //оплата товара
        echo "Payment by Qiwi service: $price" . PHP_EOL;
    }
}

class YandexPayment implements PaymentInterface
{
    public function send(string $amount, string $telephone)
    {
        $this->sendSms($telephone);
        $this->pay($amount);
    }

    private function sendSms(string $telephone)
    {
        //отправка sms на телефон и потдверждение ответа
        echo "Sms to the phone: $telephone" . "  ";
    }

    private function pay(string $price)
    {
        //оплата товара
        echo "Payment by Yandex service: $price" . PHP_EOL;
    }
}

class WebMoneyPayment implements PaymentInterface
{
    public function send(string $amount, string $telephone)
    {
        $this->sendSms($telephone);
        $this->pay($amount);
    }

    private function sendSms(string $telephone)
    {
        //отправка sms на телефон и потдверждение ответа
        echo "Sms to the phone: $telephone" . "  ";
    }

    private function pay(string $price)
    {
        //оплата товара
        echo "Payment by WebMoney service: $price" . PHP_EOL;
    }
}

// Платежный сервис
class PaymentService
{
    protected PaymentInterface $senderStrategy;
    protected string $amount = '';
    protected string $telephone = '';

    public function __construct(PaymentInterface $senderStrategy)
    {
        $this->senderStrategy = $senderStrategy;
    }

    public function run()
    {
        //получаем стоимость товара и телефон из POST запроса
        $this->getPOST();
        // производим оплату
        $this->senderStrategy->send($this->amount, $this->telephone);
    }

    // обработка POST запроса
    private function getPOST()
    {
        $this->amount = '500';
        $this->telephone = '+79278545678';
    }
}

class PaymentFactory
{
    public function createPayment($method)
    {
        $classname = $method . 'Payment';
        if (class_exists($classname)) {
            return new $classname;
        }
        echo "No such payment system!!!";
        die();
    }
}

// Реализация
$manager = new PaymentService((new PaymentFactory())->createPayment('Qiwi'));
$manager->run();

$manager = new PaymentService((new PaymentFactory())->createPayment('Yandex'));
$manager->run();

$manager = new PaymentService((new PaymentFactory())->createPayment('WebMoney'));
$manager->run();

// Реализация
//$manager = new PaymentService(new QiwiPayment());
//$manager->run();
//
//$manager = new PaymentService(new YandexPayment());
//$manager->run();
//
//$manager = new PaymentService(new WebMoneyPayment());
//$manager->run();