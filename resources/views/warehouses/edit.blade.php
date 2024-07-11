<x-layout>

  <x-page-header title="Warehouse Edit" routeName="warehouses.index" routeText="Back" />
  
  <div class="row">
      <div class="col-6">
          @php
              $formControls = [
                  'name' => 'text',
                  'address' => 'text',
              ];
          @endphp
          <x-form submitRoute="warehouses.update" method="PUT" :formControls="$formControls" :model="$warehouse"/>
      </div>
  </div>
</x-layout>
