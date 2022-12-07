<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class UserModel extends Model{

        protected $DBGroup = 'default';
        protected $table = 'user';
        protected $primaryKey = 'id';
        protected $useAutoIncrement = true;
        protected $insertID = 0;
        protected $returnType = 'array';
        protected $useSoftDeletes = false;
        protected $protectFields = true;
        protected $allowedFields = ['name', 'email', 'password',];


        //Datas
        protected $useTimestamps = false;
        protected $dateFormat = 'datetime';
        protected $createField = 'create_at';
        protected $updateField = 'update_at';
        protected $deleteField = 'deleted_at';


        //Validações
        protected $validationRules = [];
        protected $validationMessages = [];
        protected $skipValidation = false;
        protected $cleanValidationRules = true;


        //Callbacks
        protected $allowCallbacks = true;
        protected $beforeInsert = [];
        protected $afterInsert = [];
        protected $beforeUpdate = [];
        protected $afterUpdate = [];
        protected $beforeFind = [];
        protected $afterFind = [];
        protected $beforeDelete = [];
        protected $afterDelete = [];

    }