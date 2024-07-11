<x-layout>
    <x-session-message />

    <x-page-header title="Product Index" routeName="products.create" routeText="Create Product" />

    @php
        $headers = ['Name', 'Price'];
        $properties = ['name', 'price'];
    @endphp
    <x-table :headers="$headers" :properties="$properties" :list="$products" editRouteName="products.edit" deleteRouteName="products.destroy" />
</x-layout>