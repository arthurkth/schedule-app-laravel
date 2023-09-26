<a href="{{ route('contacts.index') }}" class="back__arrow">
    🠔 </a>
<x-layout>
    <x-contacts.form :action="route('contacts.store')" :update="false" btntext='Adicionar' title="Adicionar"> </x-contacts.form>
</x-layout>
