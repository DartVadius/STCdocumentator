<?php
/**
 * Created by PhpStorm.
 * User: dartvadius
 * Date: 29.08.17
 * Time: 21:16
 */

namespace app\modules\services;


use app\modules\repositories\CategoryProductRepository;

class CategoryProductService {
    private $categoryProductRepository;

    public function __construct() {
        $this->categoryProductRepository = new CategoryProductRepository();
    }

    public function getAllCategories() {
        return $this->categoryProductRepository->getAll();
    }

}