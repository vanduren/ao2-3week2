@foreach ($products as $product)
    {{ $product->name }}</br>
    {{ $product->category->name }}</br>
    {{ $product->employee->name }}</br>
    <hr>
@endforeach
