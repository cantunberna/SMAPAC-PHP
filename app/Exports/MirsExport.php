<?php

namespace App\Exports;

use App\Activity;
use App\Mir;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
// use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Illuminate\Support\Facades\DB;

class MirsExport implements FromQuery, WithHeadings, WithMapping, WithEvents, WithDrawings 
{
    use Exportable;

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setPath(public_path('/img/home.jpg'));
        $drawing->setHeight(55);
        $drawing->setCoordinates('A1');
        return $drawing;
    }
    
    public function headings(): array
    {
        return [
                'Componente',
                'Departamento',
                'Actividad',
                'Monto',
                'Trianual',
                '2019',
                '2020',
                '2021',
                'Indicador',
                'Formula',
                'Frecuencia',
                'Unidad de Medida',
                'Indicador Programado',
                '1er. Trim',
                '2do. Trim',
                '3er. Trim',
                '4to. Trim',
                'Indicador Real',
                '1er. Trim',
                '2do. Trim',
                '3er. Trim',
                '4to. Trim',
                'Total Acumulado',
                'Medios de Verificación',
                'Supuesto'
        ];
    }

    public function registerEvents(): array
    {
        $styleArray = [
            'font' => [
                'bold' => true,
                // 'color' => array('rgb' => 'FF0000')
            ]
        ];
                
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $event->sheet->setCellValue('A1', '');
                $event->sheet->setCellValue('A2', '');
                $event->sheet->setCellValue('A3', '');
                $event->sheet->setCellValue('B2', 'REPORTE DE MATRIZ DE INDICADORES DE RESULTADOS');
            },

            AfterSheet::class => function(AfterSheet $event) use ($styleArray) {
                $event->sheet->getStyle('A4:Y4')->applyFromArray($styleArray);
                $event->sheet->getColumnDimension('A')->setWidth(12);
                $event->sheet->getColumnDimension('B')->setWidth(20);
                $event->sheet->getColumnDimension('C')->setWidth(50);
                $event->sheet->getColumnDimension('D')->setWidth(15);
                $event->sheet->getColumnDimension('I')->setWidth(18);
                $event->sheet->getColumnDimension('J')->setWidth(18);
                $event->sheet->getColumnDimension('K')->setWidth(12);  
                $event->sheet->getColumnDimension('L')->setWidth(12); 
                $event->sheet->getColumnDimension('M')->setWidth(15); 
                $event->sheet->getColumnDimension('R')->setWidth(15);
                $event->sheet->getColumnDimension('W')->setWidth(15); 
                $event->sheet->getColumnDimension('X')->setWidth(18); 
                $event->sheet->getColumnDimension('Y')->setWidth(18);          
            },
        ];
    }

    public function query()
    {
        return Activity::query();
        // return Activity::query(orderBy("component_id", 'desc)->get());
        // return Mir::query();
    }

    public function map($activity): array
    {
        return [
            'C'.$activity->component->component,
            $activity->department->name,
            $activity->activity,
            $activity->amount,
            $activity->trianual,
            $activity->fist_year,
            $activity->second_year,
            $activity->third_year,
            $activity->indicator,
            $activity->formula,
            $activity->frequency,
            $activity->measure,
            $activity->prog_indicator.'%',
            $activity->prog_one.'%',
            $activity->prog_two.'%',
            $activity->prog_three.'%',
            $activity->prog_four.'%',
            $activity->real_indicator.'%',
            $activity->real_one.'%',
            $activity->real_two.'%',
            $activity->real_three.'%',
            $activity->real_four.'%',
            $activity->total.'%',
            $activity->verification,
            $activity->supposed
      ];
    }

}
