<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DoctorsExport implements FromQuery, WithHeadings,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return User::select('name','email','username','dob','plan','gender','phone','country','state','active','address')->where('role','Doctor');
    }


    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Username',
            'Date of Birth',
            'Plan',
            'Gender',
            'Phone',
            'Country',
            'State',
            'Status',
            'Address',
        ];
    }

    public function registerEvents(): array
    {
            $styleArray = [
                    'font'=>[
                        'bold'=>true
                    ]  
                ];

        return [
            // Handle by a closure.
            AfterSheet::class => function(AfterSheet $event) use ($styleArray) {
                $event->sheet->getStyle('A1:K1')->applyFromArray($styleArray);
            },
                        
        ];
    }

}
