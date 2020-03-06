<?php

namespace Luigel\LaravelPaymongo\Models;

class Payment
{
    public $id;
    public $type;
    public $amount;
    public $currency;
    public $description;
    public $external_reference_number;
    public $fee;
    public $net_amount;
    public $statement_descriptor;
    public $status;
    public $source;
    public $created;
    public $updated;
    public $paid;
    public $payout;
    public $access_url;
    public $billing;

    public function setData($data)
    {
        if (is_array($data) && isset($data['id']))
        {
            return $this->convertToObject($data);
        }
        $payments = collect();

        foreach ($data as $item)
        {
            $payments->push($this->convertToObject($item));
        }
        return $payments;

    }

    protected function convertToObject($data)
    {
        //{
        //"data": {
        //"id": "pay_AmKHNhUfqXtoAN1hP9GkX3fN",
        //"type": "payment",
        //"attributes": {
        //"amount": 10000,
        //"currency": "PHP",
        //"description": "Down Payment",
        //"external_reference_number": null,
        //"fee": 1850,
        //"livemode": false,
        //"net_amount": 8150,
        //"statement_descriptor": "Test Shop",
        //"status": "paid",
        //"source": {
        //"id": "tok_moz7h3sm62ULAxnJq6XujX6S",
        //"type": "token"
        //},
        //"created_at": 1583195623,
        //      "updated_at": 1583195623,
        //      "paid_at": 1583195623,
        //      "payout": null,
        //      "access_url": null,
        //      "billing": null
        //    }
        //  }
        //}

        $this->id = $data['id'];
        $this->type = $data['type'];
        $this->amount = round($data['attributes']['amount'] / 100, 2);
        $this->currency = $data['attributes']['currency'] ?? 'PHP';
        $this->description = $data['attributes']['description'];
        $this->external_reference_number = $data['attributes']['external_reference_number'];
        $this->fee = round($data['attributes']['fee'] / 100, 2);
        $this->net_amount = round($data['attributes']['net_amount']/ 100, 2);
        $this->statement_descriptor = $data['attributes']['statement_descriptor'];
        $this->status = $data['attributes']['status'];
        $this->source = new PaymentSource($data['attributes']['source']);
        $this->created = $data['attributes']['created_at'];
        $this->updated = $data['attributes']['updated_at'];
        $this->paid = $data['attributes']['paid_at'];
        $this->payout = $data['attributes']['payout'];
        $this->access_url = $data['attributes']['access_url'];
        $this->billing = $data['attributes']['billing'];

        return $this;
    }
}
