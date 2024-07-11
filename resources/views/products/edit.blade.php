<x-layout>
    <x-page-header title="Product Edit" routeName="products.index" routeText="Back" />

    <div class="row my-4">
        <div class="col-6">
            @php
                $formControls = [
                    'name' => 'text',
                    'price' => 'number',
                ];
            @endphp
    
            <x-form submitRoute="products.update" :model="$product" method="PUT" :formControls="$formControls" />
        </div>
    </div>
</x-layout>