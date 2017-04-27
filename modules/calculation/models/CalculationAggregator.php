<?php

namespace app\modules\calculation\models;

use Yii;
use app\modules\product\models\ProductAggregator;
use app\modules\calculation\models\Params;
use app\modules\calculation\models\Materials;

/**
 * Description of CalculationAggregator
 * 
 * @author DartVadius
 *
 * @property Materials $materials
 * @property Recipes $recipe
 */
class CalculationAggregator {

    private $id;
    private $params;    
    private $materials = [
        [
            'title' => '',
            'unit' => '',
            'price_per_unit' => '',
            'quantity' => '',
            'summ' => '',
        ],
    ];
    private $recipe = [
        'title' => '',
        'materials' => [
            [
                'title' => '',
                'unit' => '',
                'price_per_unit' => '',
                'quantity' => '',
                'summ' => '',
            ],
        ],
    ];
    private $packs = [
        [
            'title' => '',
            'quantity' => '',
            'price' => '',
            'value' => '',
        ],
    ];
    private $positions = [
        [
            'title' => '',
            'quantity' => '',
            'value_per_hour' => ''
        ]
    ];
    private $expenses = [
        [
            'title' => '',
            'value_per_hour' => ''
        ],
    ];
    private $losses = [
        [
            'title' => '',
            '%' => ''
        ],
    ];

    public function __construct($params, $materials) {
        $this->params = new Params($params);
        $this->materials = new Materials($materials);
//        $this->recipe = new Recipes($recipe);
//        $this->packs = new Packs($packs);
//        $this->positions = new Positions($positions);        
//        $this->expenses = new Expenses($expenses);
//        $this->losses = new Losses($losses);
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function __get($name) {
        if (!empty($this->$name)) {
            return $this->$name;
        }
        return FALSE;
    }
}
