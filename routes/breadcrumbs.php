<?php 
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home',function($trail){
    $trail->push('Главная',route('admin.index'));
});

Breadcrumbs::for('products',function($trail){
    $trail->parent('home');
    $trail->push('Продукты',route('admin.product.index'));
});
Breadcrumbs::for('category',function($trail){
    $trail->parent('home');
    $trail->push('Категории',route('admin.category.index'));
});
Breadcrumbs::for('subcategory',function($trail){
    $trail->parent('home');
    $trail->push('Подкатегории',route('admin.subcategory.index'));
});
Breadcrumbs::for('subcategory_2',function($trail){
    $trail->parent('home');
    $trail->push('Подкатегории_2',route('admin.subcategory_2.index'));
});
Breadcrumbs::for('orders',function($trail){
    $trail->parent('home');
    $trail->push('Заказы',route('admin.orders.index'));
});
Breadcrumbs::for('reviews',function($trail){
    $trail->parent('home');
    $trail->push('Отзывы',route('admin.reviews.index'));
});
Breadcrumbs::for('promokode',function($trail){
    $trail->parent('home');
    $trail->push('Промокоды',route('admin.promokode.index'));
});

Breadcrumbs::for('products.create',function($trail){
    $trail->parent('products');
    $trail->push('Создание продукта');
});
Breadcrumbs::for('products.show',function($trail,$product){
    $trail->parent('products');
    $trail->push($product->name,route('admin.product.show',$product->id));
});
Breadcrumbs::for('products.size.create',function($trail,$product){
    $trail->parent('products.show',$product);
    $trail->push('Добавление размеров',route('admin.size.create'));
});
Breadcrumbs::for('products.char.create',function($trail,$product){
    $trail->parent('products.show',$product);
    $trail->push('Добавление характеристик',route('admin.characteristic.create',$product->id));
});
Breadcrumbs::for('products.edit',function($trail,$product){
    $trail->parent('products.show',$product);
    $trail->push('Изменение',route('admin.product.edit',$product->id));
});
Breadcrumbs::for('products.size.edit',function($trail,$product){
    $trail->parent('products.show',$product);
    $trail->push('Изменение размера',route('admin.size.edits'));
});
Breadcrumbs::for('products.char.edit',function($trail,$product){
    $trail->parent('products.show',$product);
    $trail->push('Изменение характеристик',route('admin.characteristic.edits',$product->id));
});

Breadcrumbs::for('category.create',function($trail){
    $trail->parent('category');
    $trail->push('Создание категории');
});
Breadcrumbs::for('category.show',function($trail,$category){
    $trail->parent('category');
    $trail->push($category->name,route('admin.category.show',$category->id));
});
Breadcrumbs::for('category.edit',function($trail,$category){
    $trail->parent('category.show',$category);
    $trail->push('Изменение',route('admin.category.edit',$category->id));
});

Breadcrumbs::for('subcategory.create',function($trail){
    $trail->parent('subcategory');
    $trail->push('Создание категории');
});
Breadcrumbs::for('subcategory.show',function($trail,$subcategory){
    $trail->parent('subcategory');
    $trail->push($subcategory->name,route('admin.subcategory.show',$subcategory->id));
});
Breadcrumbs::for('subcategory.edit',function($trail,$subcategory){
    $trail->parent('subcategory.show',$subcategory);
    $trail->push('Изменение',route('admin.subcategory.edit',$subcategory->id));
});

Breadcrumbs::for('subcategory_2.create',function($trail){
    $trail->parent('subcategory_2');
    $trail->push('Создание категории');
});
Breadcrumbs::for('subcategory_2.show',function($trail,$subcategory_2){
    $trail->parent('subcategory_2');
    $trail->push($subcategory_2->name,route('admin.subcategory_2.show',$subcategory_2->id));
});
Breadcrumbs::for('subcategory_2.edit',function($trail,$subcategory_2){
    $trail->parent('subcategory_2.show',$subcategory_2);
    $trail->push('Изменение',route('admin.subcategory_2.edit',$subcategory_2->id));
});


Breadcrumbs::for('orders.show',function($trail,$order){
    $trail->parent('orders');
    $trail->push('Заказ - '.$order->id,route('admin.orders.show',$order->id));
});

Breadcrumbs::for('reviews.show',function($trail,$review){
    $trail->parent('reviews');
    $trail->push('Отзыв - '.$review->id,route('admin.reviews.show',$review->id));
});

Breadcrumbs::for('promokode.create',function($trail){
    $trail->parent('promokode');
    $trail->push('Создание промокода');
});
Breadcrumbs::for('promokode.show',function($trail,$promokode){
    $trail->parent('promokode');
    $trail->push($promokode->name,route('admin.promokode.show',$promokode->id));
});
Breadcrumbs::for('promokode.edit',function($trail,$promokode){
    $trail->parent('promokode.show',$promokode);
    $trail->push('Изменение',route('admin.promokode.edit',$promokode->id));
});

Breadcrumbs::for('gallary.index',function($trail,$product){
    $trail->parent('products.show',$product);
    $trail->push('Галерея',route('admin.gallary.index',$product));
});
Breadcrumbs::for('gallary.create',function($trail,$product){
    $trail->parent('gallary.index',$product);
    $trail->push('Добавление');
});
?>