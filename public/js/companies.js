/**
 * Companies CRUD Logic
 * Using jQuery + AJAX
 */

$(document).ready(function () {
    // --- Variables y Configuración ---
    // Estas variables deben definirse en la vista antes de cargar este script
    // o usar data-attributes en el body/contenedor principal.
    // Usaremos las definidas globalmente por ahora para compatibilidad rápida.

    // --- Funciones de Utilidad ---
    function showAlert(message, type = "success") {
        const color = type === "success" ? "green" : "red";
        const icon = type === "success" ? "check_circle" : "error";

        const alertHtml = `
            <div class="mb-6 glass-effect border border-${color}-500/30 bg-${color}-500/10 rounded-xl p-4 flex items-center gap-3 animate-fade-in-down">
                <span class="material-symbols-outlined text-${color}-500">${icon}</span>
                <p class="text-${color}-500 font-semibold">${message}</p>
            </div>
        `;

        $("#alert-container").html(alertHtml);

        // Auto hide
        setTimeout(() => {
            $("#alert-container").empty();
        }, 5000);
    }

    // --- Cargar Datos ---
    window.loadCompanies = function (page = 1, search = "") {
        const tbody = $("#companies-table-body");

        tbody.html(`
            <tr>
                <td colspan="5" class="px-6 py-12 text-center">
                    <span class="material-symbols-outlined animate-spin text-3xl text-primary">sync</span>
                </td>
            </tr>
        `);

        $.ajax({
            url: routes.data, // Usaremos un objeto routes global
            data: { page: page, search: search },
            method: "GET",
            success: function (response) {
                renderTable(response.data);
                renderPagination(response.links);
            },
            error: function (err) {
                console.error("Error loading data", err);
                showAlert("Error al cargar datos", "error");
                tbody.html(`
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-red-500">
                            Error al cargar los datos. Por favor recarga la página.
                        </td>
                    </tr>
                `);
            },
        });
    };

    function renderTable(companies) {
        let html = "";
        const tbody = $("#companies-table-body");

        if (companies.length === 0) {
            html = `
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center gap-3">
                            <span class="material-symbols-outlined text-slate-600 text-5xl">business_center</span>
                            <p class="text-slate-400 font-semibold">No se encontraron compañías</p>
                        </div>
                    </td>
                </tr>
            `;
        } else {
            companies.forEach((company) => {
                const logoSrc = company.logo_path ? `${company.logo_path}` : "";
                const logoHtml = logoSrc
                    ? `<img src="${logoSrc}" alt="${company.name}" class="w-full h-full object-cover">`
                    : `<span class="material-symbols-outlined text-slate-400">business</span>`;

                let planClass = "";
                if (company.plan === "enterprise")
                    planClass =
                        "bg-purple-500/20 text-purple-400 border border-purple-500/30";
                else if (company.plan === "pro")
                    planClass =
                        "bg-blue-500/20 text-blue-400 border border-blue-500/30";
                else
                    planClass =
                        "bg-slate-500/20 text-slate-400 border border-slate-500/30";

                html += `
                    <tr class="group hover:bg-white/5 transition-colors">
                        <td class="px-6 py-4">
                            <div class="w-12 h-12 rounded-lg overflow-hidden bg-white/5 border border-glass-border flex items-center justify-center">
                                ${logoHtml}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-white">${
                                    company.name
                                }</span>
                                ${
                                    company.ruc
                                        ? `<span class="text-xs text-slate-500">RUC: ${company.ruc}</span>`
                                        : ""
                                }
                                ${
                                    company.slogan
                                        ? `<span class="text-xs text-slate-400 italic mt-1">${company.slogan}</span>`
                                        : ""
                                }
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col gap-1">
                                ${
                                    company.email
                                        ? `
                                    <div class="flex items-center gap-2">
                                        <span class="material-symbols-outlined text-slate-400 text-[14px]">email</span>
                                        <span class="text-xs text-slate-300">${company.email}</span>
                                    </div>`
                                        : ""
                                }
                                ${
                                    company.phone
                                        ? `
                                    <div class="flex items-center gap-2">
                                        <span class="material-symbols-outlined text-slate-400 text-[14px]">phone</span>
                                        <span class="text-xs text-slate-300">${company.phone}</span>
                                    </div>`
                                        : ""
                                }
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-bold uppercase ${planClass}">
                                ${company.plan}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button class="btn-edit p-2 rounded-lg bg-white/5 text-slate-400 hover:text-white hover:bg-primary/20 transition-all" data-id="${
                                    company.id
                                }">
                                    <span class="material-symbols-outlined text-[20px]">edit</span>
                                </button>
                                <button class="btn-delete p-2 rounded-lg bg-white/5 text-slate-400 hover:text-red-400 hover:bg-red-500/20 transition-all" data-id="${
                                    company.id
                                }">
                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                `;
            });
        }
        tbody.html(html);
    }

    function renderPagination(links) {
        let html = "";
        links.forEach((link) => {
            if (link.url) {
                const activeClass = link.active
                    ? "bg-primary text-white font-bold"
                    : "hover:bg-white/10 text-slate-400";
                html += `
                    <button class="pagination-link px-3 py-1 rounded-lg ${activeClass} transition-all" data-url="${link.url}">
                        ${link.label}
                    </button>
                `;
            } else {
                html += `
                    <span class="px-3 py-1 text-slate-600">${link.label}</span>
                `;
            }
        });
        $("#pagination-container").html(html);
    }

    // --- Eventos ---

    // Paginación
    $(document).on("click", ".pagination-link", function () {
        const url = $(this).data("url");
        if (url) {
            const urlObj = new URL(url);
            const page = urlObj.searchParams.get("page");
            loadCompanies(page, $("#search-input").val());
        }
    });

    // Búsqueda (Debounce)
    let searchTimeout;
    $("#search-input").on("input", function () {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            loadCompanies(1, $(this).val());
        }, 300);
    });

    // Modal: Abrir "Nueva"
    $("#btn-new-company").click(function () {
        resetForm();
        $("#modal-title").text("Registrar Nueva Empresa");
        $("#modal-icon").text("domain_add");
        $("#btn-text").text("Registrar Empresa");
        $("#_method").val("POST");
        $("#company-modal").removeClass("hidden");
    });

    // Modal: Cerrar
    $(".btn-close-modal, #modal-backdrop").click(function () {
        $("#company-modal").addClass("hidden");
    });

    function resetForm() {
        $("#company-form")[0].reset();
        $("#company_id").val("");
        $("#logo-img").attr("src", "").addClass("hidden");
        $("#logo-placeholder").removeClass("hidden");
        $("#color_text").val("#4030E8");
        $("#color_primary").val("#4030E8");
    }

    // Color Picker Sync
    $("#color_primary").on("input", function () {
        $("#color_text").val($(this).val());
    });

    // Logo Preview
    $("#logo-input").change(function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $("#logo-img")
                    .attr("src", e.target.result)
                    .removeClass("hidden");
                $("#logo-placeholder").addClass("hidden");
            };
            reader.readAsDataURL(file);
        }
    });

    // Guardar (Create / Update)
    $("#company-form").submit(function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        const id = $("#company_id").val();

        // Determinar URL basada en si es create o update
        // Nota: Para Laravel Resource API, Update necesita PUT en la URL /api/companies/{id}
        let url = routes.store;
        if (id) {
            // Construimos la URL de update manualmente o usamos una variable
            // Asumimos que la API sigue REST estandar: /api/companies/{id}
            // Como 'routes.store' es /api/companies, le pegamos el ID
            url = `${routes.store}/${id}`;
        }

        $("#btn-save").prop("disabled", true).addClass("opacity-50");

        $.ajax({
            url: url,
            type: "POST", // Siempre POST por FormData, _method se encarga del verbo real
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $("#company-modal").addClass("hidden");
                showAlert(
                    id
                        ? "Compañía actualizada correctamente"
                        : "Compañía creada correctamente"
                );
                loadCompanies(); // Recargar tabla
                $("#btn-save")
                    .prop("disabled", false)
                    .removeClass("opacity-50");
            },
            error: function (xhr) {
                $("#btn-save")
                    .prop("disabled", false)
                    .removeClass("opacity-50");
                const msg = xhr.responseJSON?.message || "Error al guardar";
                const errors = xhr.responseJSON?.errors;

                let errorDetails = "";
                if (errors) {
                    errorDetails = '<ul class="mt-2 text-xs list-disc pl-4">';
                    for (const key in errors) {
                        errorDetails += `<li>${errors[key][0]}</li>`;
                    }
                    errorDetails += "</ul>";
                }

                showAlert(msg + errorDetails, "error");
            },
        });
    });

    // Editar
    $(document).on("click", ".btn-edit", function () {
        const id = $(this).data("id");

        // Loader visual opcional o deshabilitar botón mientras carga
        const btn = $(this);
        btn.addClass("opacity-50");

        $.ajax({
            url: `${routes.store}/${id}`, // GET /api/companies/{id}
            method: "GET",
            success: function (company) {
                btn.removeClass("opacity-50");
                resetForm();

                // Configurar Form para Edición
                $("#company_id").val(company.id);
                $("#_method").val("PUT"); // Spoofing para Laravel

                // Rellenar campos
                $("#name").val(company.name);
                $("#ruc").val(company.ruc);
                $("#slogan").val(company.slogan);
                $("#description").val(company.description);
                $("#email").val(company.email);
                $("#phone").val(company.phone);
                $("#address").val(company.address);
                $("#website").val(company.website);
                $("#facebook").val(company.facebook);
                $("#whatsapp").val(company.whatsapp);
                $("#instagram").val(company.instagram);
                $("#plan").val(company.plan);
                $("#color_primary").val(company.color_primary || "#4030E8");
                $("#color_text").val(company.color_primary || "#4030E8");

                if (company.logo_path) {
                    $("#logo-img")
                        .attr("src", `/${company.logo_path}`)
                        .removeClass("hidden");
                    $("#logo-placeholder").addClass("hidden");
                }

                $("#modal-title").text("Editar Compañía");
                $("#modal-icon").text("edit");
                $("#btn-text").text("Guardar Cambios");
                $("#company-modal").removeClass("hidden");
            },
            error: function () {
                btn.removeClass("opacity-50");
                showAlert("Error al cargar datos de la compañía", "error");
            },
        });
    });

    // Eliminar
    $(document).on("click", ".btn-delete", function () {
        if (!confirm("¿Estás seguro de desactivar esta compañía?")) return;

        const id = $(this).data("id");
        const token = $('meta[name="csrf-token"]').attr("content"); // Leer token del meta tag

        $.ajax({
            url: `${routes.store}/${id}`,
            type: "DELETE",
            data: {
                _token: token,
            },
            success: function (response) {
                showAlert("Compañía eliminada correctamente");
                loadCompanies();
            },
            error: function (xhr) {
                showAlert("Error al eliminar", "error");
            },
        });
    });

    // Inicializar Carga
    loadCompanies();
});
