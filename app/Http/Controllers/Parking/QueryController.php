<?php


namespace App\Http\Controllers\Parking;


use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Self_;

class QueryController
{

    const ANNUAL = 1;
    const MONTHLY = 2;
    const DAYS = 3;

    const MONTHS =
        [
            1 => "Enero",
            2 => "Febrero",
            3 => "Marzo",
            4 => "Abril",
            5 => "Mayo",
            6 => "Junio",
            7 => "Julio",
            8 => "Agosto",
            9 => "Septiembre",
            10 => "Octubre",
            11 => "Noviembre",
            12 => "Diciembre"
        ];


    public function index()
    {
        return view('parking.graphic.index');
    }

    public function indexContent(Request $request)
    {
        $type = $request->get('type', 1) * 1;
        $frequency = $request->get('frequency', 1) * 1;
        $dates = json_decode($request->get('dates', 1));
        $data = [];
        $labels = [];
        $totals = [];
        foreach ($dates as $key => $dateJson) {
            $dateCarbon = new Carbon($dateJson);
            $month = $dateCarbon->month;
            $totalFull = 0;
            switch ($frequency) {
                case self::ANNUAL:
                    $keyLabel = 'grafica-' . ($key + 1) . '-' . $dateCarbon->year;
                    $labels = array_merge($labels, [$keyLabel]);
                    foreach (self::MONTHS as $keyMonth => $month) {
                        if (empty($data[$keyMonth])) {
                            $data[$keyMonth] = ['name' => self::MONTHS[$keyMonth]];
                        }
                        $total = Ticket::whereHas('parking', function ($q) {
                            $q->where('fk_id_user', \Auth::id());
                        })->where(\DB::raw('YEAR(end)'), $dateCarbon->year)
                            ->where(\DB::raw('MONTH(end)'), $keyMonth)
                            ->sum('total');

                        $totalFull += $total;
                        $data[$keyMonth] = array_merge($data[$keyMonth], [
                            $keyLabel => $total
                        ]);
                    }

                    array_push($totals, $totalFull);
                    break;
                case self::MONTHLY:
                    $month = $dateCarbon->month;
                    $keyLabel = 'grafica-' . ($key + 1) . '-' . self::MONTHS[$month] . '-' . $dateCarbon->year;
                    $labels = array_merge($labels, [$keyLabel]);
                    for ($i = 1; $i <= $dateCarbon->daysInMonth; $i++) {
                        if (empty($data[$i])) {
                            $data[$i] = ['name' => 'día-' . $i];
                        }
                        $total = Ticket::whereHas('parking', function ($q) {
                            $q->where('fk_id_user', \Auth::id());
                        })->where(\DB::raw('YEAR(end)'), $dateCarbon->year)
                            ->where(\DB::raw('MONTH(end)'), $month)
                            ->where(\DB::raw('DAY(end)'), $i)
                            ->sum('total');
                        $totalFull += $total;
                        $data[$i] = array_merge($data[$i], [
                            $keyLabel => $total
                        ]);
                    }

                    array_push($totals, $totalFull);
                    break;
                case self::DAYS:
                    $keyLabel = 'grafica-' . ($key + 1) . '-dia-' . $dateCarbon->day . '-' . self::MONTHS[$month] . '-' . $dateCarbon->year;
                    $labels = array_merge($labels, [$keyLabel]);
                    for ($i = 1; $i <= 24; $i++) {
                        if (empty($data[$i])) {
                            $data[$i] = ['name' => $i . ' hrs'];
                        }

                        $total = Ticket::whereHas('parking', function ($q) {
                            $q->where('fk_id_user', \Auth::id());
                        })->whereBetween('end', [$dateCarbon->toDateTimeString(), $dateCarbon->addHour()])
                            ->sum('total');

                        $totalFull += $total;
                        $data[$i] = array_merge($data[$i], [
                            $keyLabel => $total
                        ]);
                    }

                    array_push($totals, $totalFull);

                    break;
            }
        }

        return response()->json([
            'data' => $data,
            'labels' => $labels,
            'totals' => $totals
        ]);
    }

}
