<?php

namespace App\Http\Controllers;

use App\Services\ExcelService;
use App\Services\HumanticAi;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class HumanticController extends Controller
{
    public function dashboard($id = null, $saved = null)
    {
        if (is_null($id)) {
            $id = rand(100,1000000000);
        }

        return view('dashboard')
            ->with('id', $id)
            ->with('saved', $saved);
    }

    public function save(Request $request, HumanticAi $humanticAi)
    {
        $id = $request->input('id');
        $links = $request->all();
        $data = [];
        foreach ($links['links'] as $link) {
            if (!is_null($link) && filter_var($link, FILTER_VALIDATE_URL)) {
                $response = $humanticAi->createHumanticProfile($link);
                if (isset($response->status) && $response->status == 200 || isset($response->data->status_code) &&  $response->data->status_code == 2) {
                    $data[] = $link;
                }
            }
        }

        session(['data-'.$id => $data]);

        return redirect('/'. $id . '/saved')->with('message', 'Your request has been accepted. Please check back for results in a few minutes.');
    }

    public function export(Request $request, HumanticAi $humanticAi)
    {
        $id = $request->input('id');

        $excelData[0] = $excelData[1] = [];
        $data = $request->session()->pull('data-'.$id);


        foreach ($data as $link) {
            if (!is_null($link) && filter_var($link, FILTER_VALIDATE_URL)) {
                $response = $humanticAi->fetchHumanticProfile($link);
                if (isset($response->status) && $response->status == 200) {
                    $excelData[0][] = $link;
                    $excelData[1][] = json_encode($response);
                }
            }
        }

        sort($excelData);
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->fromArray($excelData);
        $spreadsheet->getActiveSheet()->setTitle('profiles');

        ExcelService::download('profiles.csv', $spreadsheet);
        exit;
    }
}
