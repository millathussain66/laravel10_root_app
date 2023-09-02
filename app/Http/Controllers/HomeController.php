<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        return view('home.index');
    }

    public function grid(Request $request)
    {
        $pagenum = $request->input('pagenum');
        $pagesize = $request->input('pagesize');
        $start = $pagenum * $pagesize;

        $result = $this->getGridData(
            $request->input('filterscount'),
            $request->input('sortdatafield'),
            $request->input('sortorder'),
            $pagesize,
            $start
        );

        $data = [
            'TotalRows' => $result['TotalRows'],
            'Rows' => $result['Rows'],
        ];

        return response()->json($data);

    }

    public function getGridData($filterscount, $sortdatafield, $sortorder, $limit, $offset)
    {
        $i = 0;
        $where = [];

        if (isset($filterscount) && $filterscount > 0) {

            for ($i = 0; $i < $filterscount; $i++) {
                $filtervalue = request('filtervalue'.$i);
                $filtercondition = request('filtercondition'.$i);
                $filterdatafield = request('filterdatafield'.$i);
                $filteroperator = request('filteroperator'.$i);

                // Handle filterdatafield mappings
                $filterdatafield = $this->handleFilterDataField($filterdatafield);

                if ($filtercondition === 'STARTS_WITH') {
                    $filtervalue .= '%';
                } elseif ($filtercondition === 'ENDS_WITH') {
                    $filtervalue = '%'.$filtervalue;
                } elseif ($filtercondition === 'CONTAINS' || $filtercondition === 'DOES_NOT_CONTAIN') {
                    $filtervalue = '%'.$filtervalue.'%';
                }

                $where[] = [$filterdatafield, $this->getFilterOperator($filtercondition), $filtervalue];

                // Other mapping logic here
            }

        }

        // Other logic for $whereIniti here

        if (empty($sortorder)) {
            $sortdatafield = 'b.id';
            $sortorder = 'DESC';
        }

        $query = DB::table('homes as b')
            ->selectRaw('b.*,
            DATE_FORMAT(b.case_filing_date, "%d-%b-%Y") as case_filing_date,
            DATE_FORMAT(b.created_at, "%d-%b-%Y %h:%i %p") as created_at
            
            
            ')
            // ->where('b.sts', '<>', '0')
            ->where($where)
            ->orderBy($sortdatafield, $sortorder)
            ->limit($limit, $offset)

            ->get();

        $countQuery = DB::select('SELECT FOUND_ROWS() AS Count');
        $totalRows = $countQuery[0]->Count;

        return [
            'TotalRows' => $totalRows,
            'Rows' => $query,
        ];
    }

    protected function handleFilterDataField($filterdatafield)
    {
        // Implement your mappings here
        if ($filterdatafield === 'proposed_type') {
            return 'b.proposed_type';
        }

        return $filterdatafield;
    }

    protected function getFilterOperator($filtercondition)
    {
        $operators = [
            'CONTAINS' => 'like',
            'DOES_NOT_CONTAIN' => 'not like',
            'EQUAL' => '=',
            'NOT_EQUAL' => '<>',
            'GREATER_THAN' => '>',
            'LESS_THAN' => '<',
            // Add more operators here
        ];

        return $operators[$filtercondition];
    }

    public function add(Request $request)
    {

        $box = $request->all();
        $data2 = [];
        foreach ($box as $key => $value) {
            parse_str($value, $parsedValue);
            $data2[$key] = $parsedValue;
        }

        $data = new Home();
        $data->cb_number = $data2['postdata']['cb_number'];
        $data->account_number = $data2['postdata']['account_number'];
        $data->petitioner = $data2['postdata']['petitioner'];
        $data->petitioner = $data2['postdata']['petitioner'];
        $data->account_name = $data2['postdata']['account_name'];
        $data->accused_name = $data2['postdata']['accused_name'];
        $data->branch_name_code = $data2['postdata']['branch_name_code'];
        $data->case_filing_date = $data2['postdata']['case_filing_date'];
        $data->case_number = $data2['postdata']['case_number'];
        $data->hc_division = $data2['postdata']['hc_division'];
        $data->case_category = $data2['postdata']['case_category'];
        $data->case_type = $data2['postdata']['case_type'];
        $data->present_status = $data2['postdata']['present_status'];
        $data->request_type = $data2['postdata']['request_type'];
        $data->district = $data2['postdata']['district'];
        $data->suit_value = $data2['postdata']['suit_value'];
        $data->save();

        return response()->json([
            'data' => $data,
            'status' => 'Ok',
        ]);

    }

    public function get_details(Request $request)
    {

        $query = DB::table('homes as b')
            ->selectRaw('b.*')
            ->where('b.id', '=', $request['id'])
            ->get();
        $result = $query->toArray();
        $object = $result[0];

        $html = '';
        if (! empty($object)) {

            $html .= '<table class="table table-bordered">
           
                <tr>
                    <td width="50%" align="left"><strong>A/C Type :</strong>'.$object->id.'</td>
                    <td width="50%" align="left"><strong> A/C Number:</strong>'.$object->cb_number.'</td>
                </tr>

                <tr>
                    <td width="50%" align="left"><strong>A/C Type :</strong>'.$object->id.'</td>
                    <td width="50%" align="left"><strong> A/C Number:</strong>'.$object->cb_number.'</td>
                </tr>
                <tr>
                    <td width="50%" align="left"><strong>A/C Type :</strong>'.$object->account_number.'</td>
                    <td width="50%" align="left"><strong> A/C Number:</strong>'.$object->petitioner.'</td>
                </tr>
                <tr>
                    <td width="50%" align="left"><strong>A/C Type :</strong>'.$object->account_name.'</td>
                    <td width="50%" align="left"><strong> A/C Number:</strong>'.$object->accused_name.'</td>
                </tr>
                <tr>
                    <td width="50%" align="left"><strong>A/C Type :</strong>'.$object->branch_name_code.'</td>
                    <td width="50%" align="left"><strong> A/C Number:</strong>'.$object->case_filing_date.'</td>
                </tr>
                <tr>
                    <td width="50%" align="left"><strong>A/C Type :</strong>'.$object->id.'</td>
                    <td width="50%" align="left"><strong> A/C Number:</strong>'.$object->cb_number.'</td>
                </tr>
                <tr>
                    <td width="50%" align="left"><strong>A/C Type :</strong>'.$object->id.'</td>
                    <td width="50%" align="left"><strong> A/C Number:</strong>'.$object->cb_number.'</td>
                </tr>
                <tr>
                    <td width="50%" align="left"><strong>A/C Type :</strong>'.$object->id.'</td>
                    <td width="50%" align="left"><strong> A/C Number:</strong>'.$object->cb_number.'</td>
                </tr>

               
            </table>';

            return response()->json([
                'html' => $html,
                'status' => 'Ok',
            ]);

        }

    }
}
