<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;

class FinanceController extends ResourceController{
    private function getData($url, $data = [])
    {
        $url = rtrim($url, '?'); // Remove trailing question mark if it exists
        $url .= '?' . http_build_query($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);

        curl_close($ch);

        return $output;
    }

    public function viewDashboard(){
        $response_finance = $this->getData('http://localhost:3000/bookingAPI');
        // Decode the JSON response into an associative array
        $response_finance = json_decode($response_finance, true);
        return view('navbar').view('finance_dashboard', ['response_finance' => $response_finance]);
    }
}
