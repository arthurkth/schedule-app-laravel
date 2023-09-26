<x-layout title="Contatos">
    <a href="{{ route('contacts.create') }}" class="button__add">Adicionar Contato</a>
    <form action="{{ route('contacts.index') }}" method="GET">
        <div class="search-container">
            <input type="search" name="search" class="search-input" placeholder="Buscar contatos...">
            <button type="submit" class="search-button">Buscar</button>
        </div>
    </form>

    <div class="table-container">
        <table id="contactsTable" class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @if (count($contacts) > 0)
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>
                                <a href="{{ route('contacts.edit', $contact->id) }} "class="table__button--edit"
                                    data-value="{{ $contact->id }}">Editar</a>
                                <form class="contact__form" action="{{ route('contacts.destroy', $contact->id) }}"
                                    method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="table__button--delete" data-id="{{ $contact->id }}">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        @else
            <p>Nenhum resultado encontrado.</p>
            @endif
        </table>
    </div>

    @if ($contacts->hasPages())
        <div class="pagination">
            {{ $contacts->links('components.pagination') }}
        </div>
    @endif


    <div class="modal">
        <button class="modal__button--close">X</button>
        <div class="modal__head">
            <h4 class="modal__head__title">
                Você tem certeza que deseja excluir esse contato?
            </h4>
        </div>
        <div class="modal__body">
            <button class="modal__button--confirm">Confirmar</button>
            <button class="modal__button--cancel">Cancelar</button>
        </div>
    </div>
</x-layout>

<script src="{{ asset('js/script.js') }}"></script>
