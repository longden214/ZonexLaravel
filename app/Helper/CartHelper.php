<?php
namespace App\Helper;

class CartHelper
{
    public $items=[];
    public $total_quantity=0;
    public $total_price=0;

    public function __construct()
    {
        $this->items=session('cart') ? session('cart'):[];
        $this->total_price=$this->get_total_price();
        $this->total_quantity=$this->get_total_quantity();
    }

    public function add($product,$size,$color,$quantity=1)
    {
        $pro_info=$product->id.$size->id.$color->id;
        $item=[
            'id'=>$product->id,
            'name'=>$product->name,
            'price'=>$product->sale_price ? $product->sale_price : $product->price,
            'image'=>$product->image,
            'quantity'=>$quantity,
            'size'=>$size->name,
            'size_id'=>$size->id,
            'color'=>$color->name,
            'color_id'=>$color->id,
            'pro_single'=>$pro_info
        ];

        if(isset($this->items[$pro_info])){
            $this->items[$pro_info]['quantity'] += $quantity;
        }else{
            $this->items[$pro_info]=$item;
        }

        session(['cart'=>$this->items]);
    }

    public function remove($id)
    {
        if(isset($this->items[$id])){
            unset($this->items[$id]);
        }

        session(['cart'=>$this->items]);
    }

    public function update($ids,$qtts)
    {
        for($i = 0; $i< count($qtts) ; $i++){
            if(isset($this->items[$ids[$i]])){
                $this->items[$ids[$i]]['quantity']=$qtts[$i];
            }
        }

        session(['cart'=>$this->items]);
    }

    public function clear()
    {
        session(['cart'=> []]);
    }

    private function get_total_price()
    {
        $t=0;
        foreach ($this->items as $v) {
            $t += $v['price']*$v['quantity'];
        }
        return $t;
    }

    private function get_total_quantity()
    {
        $t=0;
        foreach ($this->items as $v) {
            $t += $v['quantity'];
        }
        return $t;
    }
}


?>
