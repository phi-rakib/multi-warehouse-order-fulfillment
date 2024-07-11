<x-layout>

    <x-page-header title="Warehouse Create" routeName="warehouses.index" routeText="Back" />
    
    <div class="row">
        <div class="col-6">
            @php
                $formControls = [
                    'name' => 'text',
                    'address' => 'text',
                ];
            @endphp
            <x-form submitRoute="warehouses.store" model="" method="POST" :formControls="$formControls"/>
        </div>
    </div>
</x-layout>
