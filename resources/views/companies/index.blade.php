 @extends('layouts.app')


 @section('content')
     @livewire('companies-crud')
 @endsection



 @section('scripts')
     <script>
         const sidebar = document.getElementById('sidebar');
         const backdrop = document.getElementById('sidebar-backdrop');

         function openSidebar() {
             sidebar.classList.remove('-translate-x-full');
             backdrop.classList.remove('hidden');
             setTimeout(() => {
                 backdrop.classList.remove('opacity-0');
             }, 10);
         }

         function closeSidebar() {
             sidebar.classList.add('-translate-x-full');
             backdrop.classList.add('opacity-0');
             setTimeout(() => {
                 backdrop.classList.add('hidden');
             }, 300);
         }

         function openModal(modalId) {
             const modal = document.getElementById(modalId);
             const modalBackdrop = modal.querySelector('#modal-backdrop');
             const modalPanel = modal.querySelector('#modal-panel');

             modal.classList.remove('hidden');
             setTimeout(() => {
                 modalBackdrop.classList.remove('opacity-0');
                 modalPanel.classList.remove('opacity-0', 'scale-95');
                 modalPanel.classList.add('opacity-100', 'scale-100');
             }, 10);
         }

         function closeModal(modalId) {
             const modal = document.getElementById(modalId);
             const modalBackdrop = modal.querySelector('#modal-backdrop');
             const modalPanel = modal.querySelector('#modal-panel');

             modalBackdrop.classList.add('opacity-0');
             modalPanel.classList.remove('opacity-100', 'scale-100');
             modalPanel.classList.add('opacity-0', 'scale-95');

             setTimeout(() => {
                 modal.classList.add('hidden');
             }, 300);
         }

         window.onclick = function(event) {
             const modal = document.getElementById('new-company-modal');
             const modalBackdrop = document.getElementById('modal-backdrop');
             if (event.target === modalBackdrop && !modal.classList.contains('hidden')) {
                 closeModal('new-company-modal');
             }
         }

         // Image Preview Logic
         function previewImage(event) {
             const file = event.target.files[0];
             if (file) {
                 const reader = new FileReader();
                 reader.onload = function(e) {
                     const img = document.getElementById('logo-preview');
                     const placeholder = document.getElementById('logo-placeholder');
                     img.src = e.target.result;
                     img.classList.remove('hidden');
                     placeholder.classList.add('hidden');
                 }
                 reader.readAsDataURL(file);
             }
         }

         // Color Picker Logic
         function updateColorPreview(hex) {
             document.getElementById('color-box').style.backgroundColor = hex;
             // Find sibling color input and update it
             const colorInput = document.getElementById('color-hex').parentElement.nextElementSibling;
             if (colorInput) colorInput.value = hex;
         }

         function updateColorInput(hex) {
             document.getElementById('color-hex').value = hex;
             document.getElementById('color-box').style.backgroundColor = hex;
         }
     </script>
 @endsection
