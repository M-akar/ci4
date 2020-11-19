<?php namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model {

	protected $table = 'settings';

	protected $allowedFields = ['company_name', 'phone', 'fax', 'address', 'about_us', 'mission', 'vision', 'motto', 'email', 'facebook', 'twitter', 'instagram', 'linkedin', 'logo', 'updated_at'];

    protected $useTimestamps = true;

 
}