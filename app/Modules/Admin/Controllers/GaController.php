<?php namespace App\Modules\Admin\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Spatie\LaravelAnalytics\LaravelAnalytics;
use Spatie\LaravelAnalytics\Period;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class GaController extends Controller {

	protected $ga;

    public function __construct(LaravelAnalytics $ga)
    {
        $this->ga = $ga;
    }

    public function dashboard()
    {
        $startDate = Carbon::now()->subWeek()->startOfWeek();
        $endDate = Carbon::now();
        $rs = $this->ga->performQuery($startDate, $endDate, 'ga:pageviews',
            array(
                'filters' => 'ga:pagePath=@/ila-elite',
                'dimensions' => 'ga:date',
                'metrics' => 'ga:pageviews, ga:visits',
            )
        );
        $data_analytic = [];
        foreach($rs->rows as $item){
            $data_analytic [] = ['date' => Carbon::createFromFormat( 'Ymd', $item[0])->format('d-m-Y'), 'visitors' => $item[2], 'pageviews' => $item[1] ];
        }
        $data =  new Collection($data_analytic);
        return view('Admin::pages.dashboard.index', compact('data'));
    }

}
