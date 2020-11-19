<?php namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model {

	protected $table = 'blogs';

	protected $allowedFields = ['title', 'content', 'slug', 'is_active', 'img_url', 'updated_at'];

    protected $useTimestamps = true;

 
}