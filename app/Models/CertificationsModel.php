<?php

namespace App\Models;

use CodeIgniter\Model;

class CertificationsModel extends Model
{
    protected $table = 'certifications';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'user_id', 'name', 'issuer', 'issue_date', 'credential_url', 'order_index'
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getByUserId($userId)
    {
        return $this->where('user_id', $userId)
                    ->orderBy('order_index', 'ASC')
                    ->orderBy('issue_date', 'DESC')
                    ->findAll();
    }
}
