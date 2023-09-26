<a href="{{ route('contacts.index') }}" class="back__arrow">
    🠔 </a>
<x-layout title="">
    <x-contacts.form :action="route('contacts.update', $contact->id)" :update="true" btntext='Editar' name="{{ $contact->name }}"
        email="{{ $contact->email }}" phone="{{ $contact->phone }}" title="Editar">
    </x-contacts.form>
</x-layout>
