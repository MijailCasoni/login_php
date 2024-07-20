<x-jet-action-section>
  <x-slot name="title">
    {{ __('Eliminación de contraseña') }}
  </x-slot>

  <x-slot name="description">
    {{ __('Eliminar de forma permanente tu cuenta(Estás seguro?).') }}
  </x-slot>

  <x-slot name="content">
    <div>
      {{ __('Una vez que tu cuenta sea borrada, todos los datos se borraran de forma permanente.') }}
    </div>

    <div class="mt-3">
      <x-jet-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
        {{ __('Borrar Cuenta') }}
      </x-jet-danger-button>
    </div>

    <!-- Delete User Confirmation Modal -->
    <x-jet-dialog-modal wire:model="confirmingUserDeletion">
      <x-slot name="title">
        {{ __('Borrar Cuenta') }}
      </x-slot>

      <x-slot name="content">
        {{ __('Estás seguro que deseas borrar tu cuenta? Una vez tu cuenta sea borrada, todos los datos y búsquedas se borrarán permanentemente. Por favor ingresa tu contraseña para confirmar que quieres borrar permanentemente tu cuenta.') }}

        <div class="mt-2" x-data="{}"
          x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
          <x-jet-input type="password" class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
            placeholder="{{ __('Contraseña') }}" x-ref="password" wire:model.defer="password"
            wire:keydown.enter="deleteUser" />

          <x-jet-input-error for="password" />
        </div>
      </x-slot>

      <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
          {{ __('Cancelar') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ms-1" wire:click="deleteUser" wire:loading.attr="disabled">
          {{ __('Borrar cuenta') }}
        </x-jet-danger-button>
      </x-slot>
    </x-jet-dialog-modal>
  </x-slot>

</x-jet-action-section>
