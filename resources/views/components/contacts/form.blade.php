<form action="{{ $action }}" method="POST" id="form" class="form">
    <h2 class="form__title">{{ $title }} Contato</h2>
    @csrf
    @if ($update)
        @method('PUT')
    @endif
    <label for="name" class="form__label">Nome</label>
    <input class="form__input--text" type="text" name="name" id="name"
        value="{{ isset($name) ? $name : old('name') }}" placeholder="José da Silva" minlength="3">
    <label for="email" class="form__label">E-mail</label>
    <input class="form__input--text" type="text" name="email" id="email"
        value="{{ isset($email) ? $email : old('email') }}" placeholder="email@email.com">
    <label for="phone" class="form__label">Telefone</label>
    <input class="form__input--text" type="text" name="phone" id="phone"
        value="{{ isset($phone) ? $phone : old('phone') }}" placeholder="(99) 9 99999999" maxlength="11">
    <input type="submit" value="{{ $btntext }}" id="formSubmit">
</form>
