namespace App\Exports;

use App\Models\Credit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CreditExport implements FromCollection, WithHeadings
{
    protected $awal;
    protected $akhir;

    public function __construct($awal, $akhir)
    {
        $this->awal = $awal;
        $this->akhir = $akhir;
    }

    public function collection()
    {
        return Credit::with('category')
            ->whereBetween('credit_date', [$this->awal, $this->akhir])
            ->get()
            ->map(function($row){
                return [
                    'Kategori' => $row->category->name ?? '-',
                    'Nominal'  => $row->nominal,
                    'Keterangan' => $row->description,
                    'Tanggal' => $row->credit_date,
                ];
            });
    }

    public function headings(): array
    {
        return ["Kategori", "Nominal", "Keterangan", "Tanggal"];
    }
}