<?php

namespace App\Imports;

use App\Models\Item;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ItemsImport implements ToModel, WithHeadingRow
{
    protected $verificationData;

    // Accept verification data from controller
    public function __construct(array $verificationData = [])
    {
        $this->verificationData = $verificationData;
    }

    public function model(array $row)
    {
        // Skip the row if required fields are missing
        if (empty($row['name']) || empty($row['model']) || empty($row['tag_number']) || empty($row['status'])) {
            return null; // prevents null insert errors
        }

        // Map branch, category, product, supplier names to IDs
        $branchId = isset($row['branch']) ? Branch::where('name', $row['branch'])->value('id') : null;
        $categoryId = isset($row['category']) ? Category::where('name', $row['category'])->value('id') : null;
        $productId = isset($row['product']) ? Product::where('name', $row['product'])->value('id') : null;
        $supplierId = isset($row['supplier']) ? Supplier::where('name', $row['supplier'])->value('id') : null;

        // Convert Excel numeric dates or strings to Y-m-d
        $purDate = $this->convertExcelDate($row['pur_date'] ?? null);
        $issueDate = $this->convertExcelDate($row['issue_date'] ?? null);
        $lifeDate = $this->convertExcelDate($row['life'] ?? null);

        // Merge controller-passed verification data or fallback to Auth
        $verificationStatus = $this->verificationData['verification_status'] 
            ?? ((Auth::user()->isAdmin() || Auth::user()->isSuperuser()) ? 'approved' : 'pending');

        $verifiedBy = $this->verificationData['verified_by'] 
            ?? ((Auth::user()->isAdmin() || Auth::user()->isSuperuser()) ? Auth::id() : null);

        return new Item([
            'name' => $row['name'],
            'model' => $row['model'],
            'tag_number' => $row['tag_number'],
            'serial_number' => $row['serial_number'] ?? null,
            'status' => $row['status'],
            'branch_id' => $branchId,
            'category_id' => $categoryId,
            'product_id' => $productId,
            'author' => Auth::user()->username,
            'remark' => $row['remark'] ?? null,
            'pur_date' => $purDate,
            'issue_date' => $issueDate,
            'supplier_id' => $supplierId,
            'life' => $lifeDate,
            'created_by' => Auth::id(),
            'verification_status' => $verificationStatus,
            'verified_by' => $verifiedBy,
        ]);
    }

    /**
     * Convert Excel numeric date or string to Y-m-d format
     */
    private function convertExcelDate($value)
    {
        if (!$value) return null;

        // Excel numeric date (e.g., 46038)
        if (is_numeric($value)) {
            return Date::excelToDateTimeObject($value)->format('Y-m-d');
        }

        // String date (e.g., 12/2/2025)
        $timestamp = strtotime($value);
        if ($timestamp !== false) {
            return date('Y-m-d', $timestamp);
        }

        // Invalid date
        return null;
    }
}
