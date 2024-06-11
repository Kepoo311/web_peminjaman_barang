<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class ExcelController extends Controller
{
    public function exportAll()
    {
        return $this->exportData(null);
    }

    private function exportData($month)
    {
        $query = Peminjaman::query();
        if ($month) {
            $query->whereMonth('created_at', $month);
        }
        $data_peminjam = $query->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers
        $headers = ['Foto Peminjam', 'Nama Peminjam', 'Jabatan', 'Barang', 'jumlah unit', 'Kelengkapan lain', 'Keperluan', 'Keterangan', 'Rencana Pengembalian', 'Tanggal Pinjam'];
        $columns = ['A', 'B', 'C', 'D', 'E', 'F','G','H','I','J'];
        foreach ($headers as $index => $header) {
            $sheet->setCellValue($columns[$index] . '1', $header);
            $sheet->getColumnDimension($columns[$index])->setAutoSize(true);
        }

        // Set header style
        $headerStyle = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'FFCCCCCC',
                ],
            ],
        ];
        $sheet->getStyle('A1:J1')->applyFromArray($headerStyle);

        $row = 2;
        foreach ($data_peminjam as $data) {
            $photoPath = public_path('foto_peminjam/' . $data->foto_peminjam);
            if (file_exists($photoPath)) {
                $drawing = new Drawing();
                $drawing->setName('Foto Peminjam');
                $drawing->setPath($photoPath);
                $drawing->setCoordinates('A' . $row);

                // Calculate height and width based on image size
                list($width, $height) = getimagesize($photoPath);
                $drawing->setHeight($height > 100 ? 100 : $height); // Set max height
                $sheet->getRowDimension($row)->setRowHeight($height > 100 ? 100 : $height);

                $drawing->setWorksheet($sheet);
            } else {
                $sheet->getRowDimension($row)->setRowHeight(20); // Default height if no image
            }

            $sheet->setCellValue('B' . $row, $data->nama);
            $sheet->setCellValue('C' . $row, $data->jabatan);
            $sheet->setCellValue('D' . $row, $data->barang);
            $sheet->setCellValue('E' . $row, $data->jmlh_unit);
            $sheet->setCellValue('F' . $row, $data->aksesoris);
            $sheet->setCellValue('G' . $row, $data->keperluan);
            $sheet->setCellValue('H' . $row, $data->keterangan);
            $sheet->setCellValue('I' . $row, $data->pengembalian);
            $sheet->setCellValue('J' . $row, Carbon::parse($data->created_at)->format('d/m/Y'));

            // Apply border to each row
            $rowCells = 'A' . $row . ':J' . $row;
            $sheet->getStyle($rowCells)->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                    ],
                ],
            ]);

            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        if ($month) {
            $monthName = Carbon::now()->locale('id')->month($month)->isoFormat('MMMM');
            $fileName = 'data_peminjaman_barang_' . $monthName . '.xlsx';
        } else {
            $year = Carbon::now()->year;
            $fileName = 'data_peminjaman_barang_' . $year . '.xlsx';
        }
        $filePath = storage_path('app/' . $fileName);
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }


    public function exportBarang()
    {
        return $this->exportDataBarang();
    }

    private function exportDataBarang()
    {
        $query = DataBarang::query();
        $data_barang = $query->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers
        $headers = ['Nama Barang', 'Kode Barang'];
        $columns = ['A', 'B'];
        foreach ($headers as $index => $header) {
            $sheet->setCellValue($columns[$index] . '1', $header);
            $sheet->getColumnDimension($columns[$index])->setAutoSize(true);
        }

        // Set header style
        $headerStyle = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'FFCCCCCC',
                ],
            ],
        ];
        $sheet->getStyle('A1:B1')->applyFromArray($headerStyle);

        $row = 2;
        foreach ($data_barang as $data) {
            $sheet->setCellValue('A' . $row, $data->nama_barang);
            $sheet->setCellValue('B' . $row, $data->kode_barang);

            // Apply border to each row
            $rowCells = 'A' . $row . ':B' . $row;
            $sheet->getStyle($rowCells)->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                    ],
                ],
            ]);

            $row++;
        }

        $writer = new Xlsx($spreadsheet);

            $year = Carbon::now()->year;
            $fileName = 'data_barang_' . $year . '.xlsx';
        $filePath = storage_path('app/' . $fileName);
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
