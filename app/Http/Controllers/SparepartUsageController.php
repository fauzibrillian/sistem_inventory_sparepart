<?php

namespace App\Http\Controllers;

use Phpml\Regression\LeastSquares;
use Phpml\Regression\ARIMA;
use Illuminate\Http\Request;
use App\SparepartUsage;
use Your\pemakaian\To\PredictionModel;
use App\Models\pemakaian;

class SparepartUsageController extends Controller
{
    public function index(Request $request)
    {
            return view('sparepart-prediction', ['prediction' => '']);
            
    }
    public function predictUsage(Request $request)
    {
            // Validasi input
            $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
            ]);
    
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
    
            // Ambil data historis dari database berdasarkan rentang tanggal
            $historicalData = pemakaian::whereBetween('tanggal', [$startDate, $endDate])
                ->orderBy('tanggal')
                ->get();
    
            // Memproses data historis untuk digunakan dalam model prediksi
            $processedData = []; // Sesuaikan dengan format yang diperlukan oleh model prediksi Anda
            foreach ($historicalData as $data) {
                $processedData[] = [
                    'tanggal' => $data->tanggal,
                    'qty' => $data->qty,
                    // Tambahkan faktor-faktor lain yang relevan jika diperlukan
                ];
            }
    
            // Menggunakan model prediksi untuk memprediksi pemakaian sparepart
            $predictionModel = new ARIMA(1, 0, 1);
            $prediction = $predictionModel->train($processedData);
    
            // Mengembalikan hasil prediksi dalam format yang diinginkan
            return response()->json(['prediction' => $prediction]);
    }
}
