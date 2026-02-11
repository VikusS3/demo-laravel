<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class CompaniesCrud extends Component
{
    use WithPagination, WithFileUploads;

    // Propiedades del formulario
    public $company_id;
    public $name;
    public $ruc;
    public $slogan;
    public $description;
    public $website;
    public $whatsapp;
    public $facebook;
    public $instagram;
    public $logo;
    public $logo_path;
    public $color_primary = '#4030E8';
    public $email;
    public $phone;
    public $address;
    public $plan = 'free';

    // Estados del componente
    public $isEditMode = false;
    public $showModal = false;
    public $search = '';

    protected $paginationTheme = 'tailwind';

    protected $rules = [
        'name' => 'required|string|max:255',
        'ruc' => 'nullable|string|max:20',
        'slogan' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'website' => 'nullable|url',
        'whatsapp' => 'nullable|string|max:20',
        'facebook' => 'nullable|string|max:255',
        'instagram' => 'nullable|string|max:255',
        'logo' => 'nullable|image|max:2048',
        'color_primary' => 'nullable|string|max:7',
        'email' => 'nullable|email',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string',
        'plan' => 'required|in:free,pro,enterprise',
    ];

    public function render()
    {
        $companies = Company::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('ruc', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->where('active', true)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.companies-crud', [
            'companies' => $companies
        ]);
    }

    public function openCreateModal()
    {
        $this->resetForm();
        $this->isEditMode = false;
        $this->showModal = true;
    }

    public function openEditModal($id)
    {
        $this->resetForm();
        $company = Company::findOrFail($id);

        $this->company_id = $company->id;
        $this->name = $company->name;
        $this->ruc = $company->ruc;
        $this->slogan = $company->slogan;
        $this->description = $company->description;
        $this->website = $company->website;
        $this->whatsapp = $company->whatsapp;
        $this->facebook = $company->facebook;
        $this->instagram = $company->instagram;
        $this->logo_path = $company->logo_path;
        $this->color_primary = $company->color_primary ?? '#4030E8';
        $this->email = $company->email;
        $this->phone = $company->phone;
        $this->address = $company->address;
        $this->plan = $company->plan;

        $this->isEditMode = true;
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        try {
            $data = [
                'name' => $this->name,
                'ruc' => $this->ruc,
                'slogan' => $this->slogan,
                'description' => $this->description,
                'website' => $this->website,
                'whatsapp' => $this->whatsapp,
                'facebook' => $this->facebook,
                'instagram' => $this->instagram,
                'color_primary' => $this->color_primary,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
                'plan' => $this->plan,
            ];

            // Manejar el logo si se subió uno nuevo
            if ($this->logo) {

                // Eliminar logo anterior si existe
                if ($this->isEditMode && $this->logo_path) {
                    $old = public_path('uploads/' . $this->logo_path);
                    if (file_exists($old)) {
                        unlink($old);
                    }
                }

                $filename = uniqid() . '.' . $this->logo->getClientOriginalExtension();

                // Guardar en public/uploads/logos
                $this->logo->storeAs('logos', $filename, 'public');

                // Guardamos solo el nombre
                $data['logo_path'] = 'logos/' . $filename;
            }

            if ($this->isEditMode) {
                $company = Company::findOrFail($this->company_id);
                $company->update($data);
                session()->flash('message', 'Compañía actualizada exitosamente.');
            } else {
                Company::create($data);
                session()->flash('message', 'Compañía creada exitosamente.');
            }

            $this->closeModal();
            $this->resetForm();
        } catch (\Exception $e) {
            session()->flash('error', 'Error al guardar: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $company = Company::findOrFail($id);

            // Soft delete - solo marcamos como inactiva
            $company->update(['active' => false]);

            session()->flash('message', 'Compañía desactivada exitosamente.');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al eliminar: ' . $e->getMessage());
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset([
            'company_id',
            'name',
            'ruc',
            'slogan',
            'description',
            'website',
            'whatsapp',
            'facebook',
            'instagram',
            'logo',
            'logo_path',
            'email',
            'phone',
            'address',
        ]);
        $this->color_primary = '#4030E8';
        $this->plan = 'free';
        $this->resetErrorBag();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
