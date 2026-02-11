# 🚀 Quick Start - Sistema de Edición de Compañías

## ⚡ Inicio Rápido (5 minutos)

### 1️⃣ Verificar que el servidor esté corriendo

```bash
php artisan serve
```

### 2️⃣ Abrir en el navegador

```
http://localhost:8000/companies
```

### 3️⃣ ¡Listo! Ya puedes:

-   ✅ Ver la lista de compañías
-   ✅ Crear nuevas compañías
-   ✅ Editar compañías existentes
-   ✅ Eliminar compañías
-   ✅ Buscar compañías

---

## 🎯 Acciones Rápidas

### Crear Compañía

1. Clic en **"Nueva Compañía"**
2. Llenar el formulario
3. Clic en **"Crear Compañía"**

### Editar Compañía

1. Clic en el **icono de lápiz** ✏️
2. Modificar los datos
3. Clic en **"Guardar Cambios"**

### Eliminar Compañía

1. Clic en el **icono de basura** 🗑️
2. Confirmar
3. ¡Listo!

---

## 📦 Archivos Principales

```
app/Livewire/CompaniesCrud.php              ← Lógica del CRUD
resources/views/livewire/companies-crud.blade.php  ← Vista
database/seeders/CompanySeeder.php          ← Datos de prueba
```

---

## 🛠️ Comandos Útiles

### Crear datos de prueba

```bash
php artisan db:seed --class=CompanySeeder
```

### Limpiar caché

```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

### Ver rutas

```bash
php artisan route:list --name=companies
```

---

## 🎨 Personalización Rápida

### Cambiar colores

Edita: `resources/css/app.css`

```css
--color-primary: #4030e8; /* Tu color aquí */
```

### Cambiar paginación

Edita: `app/Livewire/CompaniesCrud.php`

```php
->paginate(10);  // Cambia el número
```

---

## 🐛 Solución Rápida de Problemas

### No se ven las imágenes

```bash
php artisan storage:link
```

### Error de Livewire

```bash
php artisan config:clear
composer dump-autoload
```

### No aparecen compañías

```bash
php artisan db:seed --class=CompanySeeder
```

---

## 📞 URLs Importantes

-   **Lista de compañías**: http://localhost:8000/companies
-   **API de compañías**: http://localhost:8000/api/companies
-   **Home**: http://localhost:8000/home

---

## ✅ Checklist de Verificación

-   [ ] Servidor corriendo (`php artisan serve`)
-   [ ] Base de datos configurada (`.env`)
-   [ ] Migraciones ejecutadas (`php artisan migrate`)
-   [ ] Storage link creado (`php artisan storage:link`)
-   [ ] Datos de prueba creados (opcional)

---

## 🎉 ¡Todo Listo!

Tu sistema de gestión de compañías está funcionando.

**Documentación completa**: Ver `GUIA_EDICION_COMPANIAS.md`
**Detalles técnicos**: Ver `IMPLEMENTACION_COMPLETADA.md`

---

**Desarrollado con ❤️ usando Laravel 12 + Livewire 4.1**
