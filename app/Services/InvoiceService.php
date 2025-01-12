<?php

namespace App\Services;

use Moyasar\Providers\InvoiceService as MoyasarInvoiceService;

class InvoiceService
{
    protected $invoiceService;
    public function __construct(MoyasarInvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }
    public function createInvoice($data)
    {
        return $this->invoiceService->create($data);
    }
}
