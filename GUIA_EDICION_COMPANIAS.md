# 📝 Guía de Uso: Edición de Compañías

## ✅ Funcionalidad Implementada

Se ha implementado un **sistema completo de CRUD (Crear, Leer, Actualizar, Eliminar)** para la gestión de compañías usando **Livewire 4.1**, con un diseño moderno y premium.

---

## 🎯 Características Principales

### 1. **Listar Compañías**

-   ✅ Tabla responsive con diseño glassmorphism
-   ✅ Paginación automática (10 registros por página)
-   ✅ Búsqueda en tiempo real por nombre, RUC o email
-   ✅ Visualización de logo, información de contacto y plan

### 2. **Crear Nueva Compañía**

-   ✅ Modal interactivo con formulario completo
-   ✅ Upload de logo con preview en tiempo real
-   ✅ Selector de color primario con paleta de colores
-   ✅ Validación de campos en tiempo real
-   ✅ Creación automática de 5 estados de pedido por defecto

### 3. **Editar Compañía**

-   ✅ Modal pre-poblado con datos actuales
-   ✅ Actualización de logo (mantiene el anterior si no se cambia)
-   ✅ Cambio de color primario
-   ✅ Actualización de toda la información

### 4. **Eliminar Compañía**

-   ✅ Soft delete (marca como inactiva)
-   ✅ Confirmación antes de eliminar
-   ✅ No se eliminan los datos físicamente

---

## 🚀 Cómo Usar

### **Acceder a la Gestión de Compañías**

1. Inicia sesión en el sistema
2. Navega a: `http://localhost:8000/companies`
3. Verás la lista de compañías activas

### **Crear una Nueva Compañía**

1. Haz clic en el botón **"Nueva Compañía"** (esquina superior derecha)
2. Se abrirá un modal con el formulario
3. Completa los campos:
    - **Nombre\*** (obligatorio)
    - **RUC** (opcional)
    - **Slogan** (opcional)
    - **Descripción** (opcional)
    - **Logo** (opcional - PNG, JPG, SVG hasta 2MB)
    - **Color Primario** (por defecto: #4030E8)
    - **Plan\*** (obligatorio: free, pro, enterprise)
    - **Email** (opcional)
    - **Teléfono** (opcional)
    - **Dirección** (opcional)
    - **Website** (opcional)
    - **WhatsApp** (opcional)
    - **Facebook** (opcional)
    - **Instagram** (opcional)
4. Haz clic en **"Crear Compañía"**
5. Verás un mensaje de éxito y la compañía aparecerá en la tabla

### **Editar una Compañía**

1. En la tabla de compañías, localiza la que deseas editar
2. Haz clic en el icono de **lápiz** (edit) en la columna "Acciones"
3. Se abrirá el modal con todos los datos actuales
4. Modifica los campos que desees:
    - Puedes cambiar el logo subiendo uno nuevo
    - Puedes cambiar el color primario
    - Puedes actualizar cualquier información
5. Haz clic en **"Guardar Cambios"**
6. Verás un mensaje de éxito y los cambios se reflejarán en la tabla

### **Eliminar una Compañía**

1. En la tabla de compañías, localiza la que deseas eliminar
2. Haz clic en el icono de **basura** (delete) en la columna "Acciones"
3. Confirma la acción en el diálogo que aparece
4. La compañía será marcada como inactiva (soft delete)
5. Ya no aparecerá en la lista

### **Buscar Compañías**

1. Usa el campo de búsqueda en la parte superior
2. Escribe el nombre, RUC o email de la compañía
3. Los resultados se filtrarán automáticamente en tiempo real

---

## 🎨 Características de Diseño

### **Modal de Creación/Edición**

-   Diseño glassmorphism con efecto de blur
-   Animaciones suaves de entrada/salida
-   Preview en tiempo real del logo
-   Selector de color interactivo
-   Formulario scrolleable para pantallas pequeñas
-   Responsive en todos los dispositivos

### **Tabla de Compañías**

-   Diseño dark mode premium
-   Hover effects en las filas
-   Badges de colores para los planes:
    -   **Free**: Gris
    -   **Pro**: Azul
    -   **Enterprise**: Púrpura
-   Iconos de Material Symbols
-   Scroll horizontal en móviles

---

## 📁 Archivos Creados/Modificados

### **Nuevos Archivos:**

1. `app/Livewire/CompaniesCrud.php` - Componente Livewire principal
2. `resources/views/livewire/companies-crud.blade.php` - Vista del componente
3. `database/seeders/CompanySeeder.php` - Datos de prueba

### **Archivos Modificados:**

1. `resources/views/companies/index.blade.php` - Simplificado
2. `resources/views/layouts/app.blade.php` - Limpiado de headers duplicados

---

## 🔧 Tecnologías Utilizadas

-   **Livewire 4.1** - Componentes reactivos
-   **Tailwind CSS 4** - Estilos
-   **Alpine.js** - Interactividad
-   **Laravel 12** - Backend
-   **Material Symbols** - Iconografía

---

## 🧪 Datos de Prueba

Se han creado 3 compañías de prueba:

1. **Logistics Express** (Plan: Enterprise)

    - RUC: 20123456789
    - Email: contacto@logisticsexpress.com

2. **Fast Delivery Pro** (Plan: Pro)

    - RUC: 20987654321
    - Email: info@fastdelivery.com

3. **Cargo Solutions** (Plan: Free)
    - RUC: 20555444333
    - Email: ventas@cargosolutions.com

---

## 🎯 Validaciones Implementadas

-   **Nombre**: Obligatorio, máximo 255 caracteres
-   **RUC**: Opcional, máximo 20 caracteres
-   **Email**: Opcional, debe ser un email válido
-   **Website**: Opcional, debe ser una URL válida
-   **Logo**: Opcional, debe ser imagen (PNG, JPG, SVG), máximo 2MB
-   **Color**: Opcional, formato hexadecimal (#RRGGBB)
-   **Plan**: Obligatorio, debe ser: free, pro o enterprise

---

## 🔐 Seguridad

-   ✅ Validación de datos en el servidor
-   ✅ Protección CSRF automática de Laravel
-   ✅ Sanitización de inputs
-   ✅ Soft delete para no perder datos
-   ✅ Almacenamiento seguro de archivos

---

## 📱 Responsive Design

La interfaz es completamente responsive:

-   **Desktop**: Vista completa con tabla expandida
-   **Tablet**: Tabla con scroll horizontal
-   **Mobile**: Diseño optimizado con hamburger menu

---

## 🚨 Solución de Problemas

### **El logo no se muestra**

-   Verifica que ejecutaste: `php artisan storage:link`
-   Verifica permisos de la carpeta `storage/app/public`

### **No aparecen las compañías**

-   Ejecuta el seeder: `php artisan db:seed --class=CompanySeeder`
-   Verifica la conexión a la base de datos

### **Error de Livewire**

-   Limpia la caché: `php artisan config:clear`
-   Verifica que Livewire esté instalado: `composer show livewire/livewire`

---

## 🎉 ¡Listo para Usar!

Tu sistema de gestión de compañías está completamente funcional y listo para producción. Puedes:

1. ✅ Crear nuevas compañías
2. ✅ Editar compañías existentes
3. ✅ Eliminar compañías (soft delete)
4. ✅ Buscar y filtrar compañías
5. ✅ Subir logos personalizados
6. ✅ Personalizar colores de marca

**URL de acceso**: `http://localhost:8000/companies`

---

## 📞 Soporte

Si encuentras algún problema o necesitas ayuda, revisa:

-   Los logs de Laravel: `storage/logs/laravel.log`
-   La consola del navegador (F12)
-   Los mensajes de error en pantalla
