<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contactRepository;
    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }
    public function index(Request $request)
    {
        $contacts = $this->contactRepository->getAll();
        $search = $request->input('search');
        $contacts = $search
            ? $this->contactRepository->search($search)
            : $this->contactRepository->getAll();

        return view('index', ['contacts' => $contacts]);
    }

    public function create()
    {
        return view('create');
    }


    public function store(ContactFormRequest $request)
    {
        try {
            $this->contactRepository->create($request->all());
            return redirect()->route('contacts.index')->with('success', 'Contato registrado com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Erro ao registrar o contato: ' . $e->getMessage());
        }
    }

    public function edit(string $id)
    {
        $contact = $this->contactRepository->getById($id);
        return view('edit', ['contact' => $contact]);
    }


    public function update(ContactFormRequest $request, string $id)
    {
        try {
            $this->contactRepository->update($request->except(['_token', '_method']), $id);
            return redirect()->route('contacts.index')->with('success', 'Contato editado com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Erro ao editar o contato: ' . $e->getMessage());
        }
    }


    public function destroy(string $id)
    {
        try {
            $this->contactRepository->remove($id);
            return redirect()->route('contacts.index')->with('success', 'Contato excluído com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao excluir o contato: ' . $e->getMessage());
        }
    }
}
