<?php

namespace App\Exports;

use App\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InvoiceExport implements FromCollection, WithHeadings
{
	public function headings():array
	{
		return[

			"Id",
			'Checkout_id',
			'Product_id',
			'Product_quantity',
			'Product_price',
			'User_ip',
			'Created_at',
			'Customer_name',
			'Product_name'

		];
	}
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	return collect(Order::get_order());
        // return AppOrder::all();
    }
}
