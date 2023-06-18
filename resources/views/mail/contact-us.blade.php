<x-layout title="{{__('ui.sendMail')}}">
  <div class="container">
      <div class="row justify-content-center align-items-center">
          <div class="col-md-8 col-12 text-md-start text-center">
            <h2 class="pt-4">{{__('ui.sendMail')}}</h2>
          </div>
          <div class="col-md-8 col-12 formCustom rounded-2 mb-3 mt-4 py-4">
              @livewire('mail-form')
          </div>
      </div>
  </div>
</x-layout>