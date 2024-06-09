<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

class SuratController extends Controller
{
    public function unduhSurat(Request $request)
    {
        
        $id_data = $request->id_data;

        $data = Peminjaman::find($id_data);

        // Proses pengisian dokumen di sini
        $filePath = $this->fillDocument($data);

        // Tentukan nama file baru
        $newFileName = 'Dokumen_Peminjaman_' . $data['nama'] . '.docx';
        
        // Kirim file ke pengguna untuk diunduh
        return response()->download($filePath, $newFileName)->deleteFileAfterSend(true);
    }

    private function fillDocument($data)
    {


        $templatePath = public_path('templates/template_surat.docx'); // Path template dokumen

        // Tentukan nama file sementara dengan nama baru
        $tempFileName = 'temp_' . time() . '.docx';
        $tempFilePath = public_path('templates/' . $tempFileName);

        $templateProcessor = new TemplateProcessor($templatePath);

        // Mengisi data ke template
        $templateProcessor->setValue('nama', $data->nama);
        $templateProcessor->setValue('no_telpon', $data->no_telpon);
        $templateProcessor->setValue('jabatan', $data->jabatan);
        $templateProcessor->setValue('barang', $data->barang);
        $templateProcessor->setValue('jmlh_unit', $data->jmlh_unit);

        if($data->aksesoris == NULL){
            $templateProcessor->setValue('aksesoris', ' ');
        } else {
            $templateProcessor->setValue('aksesoris', '+ '. $data->aksesoris);
        }
        $templateProcessor->setValue('keperluan', $data->keperluan);
        if($data->aksesoris == NULL){
            $templateProcessor->setValue('keterangan', ' ');
        } else {
            $templateProcessor->setValue('keterangan', $data->keterangan);
        }
        $templateProcessor->setValue('pengembalian', $data->pengembalian);
        $templateProcessor->setValue('tgl_pinjam', Carbon::parse($data->created_at)->format('d/m/Y'));

        // Menyisipkan foto
        $templateProcessor->setImageValue('foto_peminjam', [
            'path' => public_path('foto_peminjam/'.$data->foto_peminjam),
            'width' => 100,
            'height' => 100,
            'ratio' => true
        ]);

        $templateProcessor->setValue('apak', 'Riki K');

        $templateProcessor->saveAs($tempFilePath);

        return $tempFilePath;
    }
}
