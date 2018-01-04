<?php


namespace App\Widgets;


use App\Models\Type;
use App\Services\CustomOrder;
use App\Support\Widget\AbstractWidget;
use App\Models\Link as LinkModel;

class Link extends AbstractWidget
{

    protected $config = [
        'type' => 'default',
        'limit' => 10,
        'view' => ''
    ];

    public function getData(array $params = [])
    {
        return [
            'links' => app(CustomOrder::class)
                ->order(LinkModel::byType($this->config['type'])->isVisible()->limit($this->config['limit'])->oldest()->get()),
            'type' => Type::where('name', $this->config['type'])->first(),
        ];
    }
}
