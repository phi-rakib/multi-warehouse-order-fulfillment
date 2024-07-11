<x-layout>
    @if ($message = session('message'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <x-page-header title="Warehouse Index" routeName="warehouses.create" routeText="Create New Warehouse" />
    
    @php
        $headers = ['Name', 'Address'];
        $properties = ['name', 'address'];
    @endphp
    <x-table :headers="$headers" :properties="$properties" :list="$warehouses" editRouteName="warehouses.edit" deleteRouteName="warehouses.destroy"/>
</x-layout>