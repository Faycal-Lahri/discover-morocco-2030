// Premium Modal System - Professional White/Grey/DarkRed Design
class PremiumModal {
    constructor() {
        // We will now use the dynamic modal for everything to ensure consistency
    }

    open(data, type, alpineDataKey = null, alpineModalKey = null) {
        // Ignore Alpine bindings to ensure we use our consistent "fallback" modal design
        this.showDynamicModal(data, type);
    }

    showDynamicModal(data, type) {
        // Remove any existing modal
        const existing = document.getElementById('premium-modal-root');
        if (existing) existing.remove();

        const modalHTML = this.getModalHTML(data, type);
        const wrapper = document.createElement('div');
        wrapper.innerHTML = modalHTML;

        // Append the root element (which has the ID) to body
        const rootEl = wrapper.firstElementChild;
        if (rootEl) {
            document.body.appendChild(rootEl);
            // Lock body scroll
            document.body.style.overflow = 'hidden';
        }
    }

    close() {
        const modal = document.getElementById('premium-modal-root');
        if (modal) {
            modal.remove();
            document.body.style.overflow = '';
        }
    }

    getModalHTML(data, type) {
        const isDark = document.documentElement.classList.contains('dark') || localStorage.getItem('darkMode') === 'true';
        let content = '';

        switch (type) {
            case 'volunteer':
                content = this.getVolunteerContent(data, isDark);
                break;
            case 'contact':
                content = this.getContactContent(data, isDark);
                break;
            case 'comment':
                content = this.getCommentContent(data, isDark);
                break;
            case 'city':
            case 'cityParagraph':
                content = this.getCityContent(data, isDark);
                break;
            case 'destination':
            case 'destinationParagraph':
                content = this.getDestinationContent(data, isDark);
                break;
            case 'cv_preview':
                content = this.getCvContent(data, isDark);
                break;
            default:
                content = `<div class="p-8 text-center text-gray-500">Content not available</div>`;
        }

        const bgClass = isDark ? 'bg-[#1a1a1a]' : 'bg-white';
        const textClass = isDark ? 'text-gray-100' : 'text-gray-900';

        // Added ID="premium-modal-root" to the outer container
        return `
            <div id="premium-modal-root" class="fixed inset-0 z-[9999] overflow-y-auto" style="animation: fadeIn 0.3s cubic-bezier(0.16, 1, 0.3, 1);">
                <div class="flex items-center justify-center min-h-screen px-4 py-6">
                    <div class="premium-modal-backdrop fixed inset-0 bg-black/60 backdrop-blur-sm" onclick="window.premiumModal.close()"></div>
                    <div class="relative ${bgClass} ${textClass} rounded-2xl max-w-2xl w-full shadow-2xl border border-gray-100 dark:border-gray-800 transform transition-all" style="animation: scaleIn 0.3s cubic-bezier(0.16, 1, 0.3, 1);">
                        ${content}
                    </div>
                </div>
            </div>
            <style>
                @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
                @keyframes scaleIn { from { transform: scale(0.96); opacity: 0; } to { transform: scale(1); opacity: 1; } }
            </style>
        `;
    }

    // --- New CV Method ---
    openCvModal(cvUrl) {
        this.showDynamicModal({ cvUrl: cvUrl }, 'cv_preview');
    }

    getCvContent(data, isDark) {
        const s = this.getStyles(isDark);
        return `
            <div class="relative flex flex-col h-[85vh]">
                <!-- Header -->
                <div class="px-6 py-4 border-b ${s.border} flex items-center justify-between shrink-0">
                    <h2 class="text-lg font-bold tracking-tight ${isDark ? 'text-white' : 'text-gray-900'}">CV Preview</h2>
                    <button onclick="window.premiumModal.close()" class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors ${s.muted}">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <!-- Document Content -->
                <div class="flex-1 bg-gray-100 dark:bg-gray-900 overflow-hidden relative">
                    ${this.getEmbedCode(data.cvUrl)}
                </div>

                <!-- Footer Actions -->
                <div class="px-6 py-4 border-t ${s.border} flex items-center justify-end gap-3 shrink-0 bg-white dark:bg-gray-800">
                    <button onclick="window.premiumModal.close()" class="px-4 py-2 rounded-xl border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 font-bold text-xs uppercase tracking-wider hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        Close
                    </button>
                    
                    <a href="${data.cvUrl}" download class="${s.btnPrimary} px-6 py-2 rounded-xl font-bold text-xs uppercase tracking-wider transition-all transform hover:-translate-y-0.5 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4-4m0 0L8 8m4-4v12" /></svg>
                        Download
                    </a>
                </div>
           </div>
         `;
    }

    getEmbedCode(url) {
        // Simple extension check
        const cleanUrl = url.split('?')[0].toLowerCase();
        const isWord = cleanUrl.endsWith('.doc') || cleanUrl.endsWith('.docx');
        const isLocalhost = window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1';

        if (isWord) {
            if (isLocalhost) {
                return `
                    <div class="flex flex-col items-center justify-center h-full p-8 text-center text-gray-500">
                        <svg class="w-16 h-16 mb-4 text-blue-500" fill="currentColor" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6z M14 9V3.5L18.5 8H14z" /></svg>
                        <p class="font-bold mb-2">Word Document Detected</p>
                        <p class="text-xs mb-4">Preview not available on localhost (Google Docs Viewer requires public URL).</p>
                        <p class="text-xs">Please use the Download button below.</p>
                    </div>
                `;
            }
            // Use Google Docs Viewer for public Word docs
            const encodedUrl = encodeURIComponent(window.location.origin + url);
            return `<iframe src="https://docs.google.com/gview?url=${encodedUrl}&embedded=true" class="w-full h-full border-0" title="CV Document"></iframe>`;
        }

        // Default for PDF/Image
        return `<iframe src="${url}" class="w-full h-full border-0" title="CV Document"></iframe>`;
    }

    // --- Helper for consistent styling ---
    getStyles(isDark) {
        return {
            muted: isDark ? 'text-gray-400' : 'text-gray-500',
            border: isDark ? 'border-gray-800' : 'border-gray-100',
            bgMuted: isDark ? 'bg-gray-800/40' : 'bg-gray-50',
            primaryText: 'text-[#b91c1c] dark:text-[#f87171]', // Dark Red / Light Red
            btnPrimary: 'bg-gradient-to-r from-[#b91c1c] to-[#991b1b] text-white hover:from-red-800 hover:to-red-900 shadow-md shadow-red-900/10',
            label: `text-[11px] font-bold uppercase tracking-wider ${isDark ? 'text-gray-500' : 'text-gray-400'} mb-1`,
            value: `text-sm font-semibold ${isDark ? 'text-gray-200' : 'text-gray-800'}`,
            headerIcon: 'bg-red-50 text-red-700 dark:bg-red-900/20 dark:text-red-400'
        };
    }

    getVolunteerContent(v, isDark) {
        const s = this.getStyles(isDark);

        return `
            <div class="relative">
                <button onclick="window.premiumModal.close()" class="absolute top-4 right-4 p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors ${s.muted}">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>

                <div class="p-8">
                    <div class="flex items-center gap-5 mb-8">
                        ${v.photo ?
                `<img src="/storage/${v.photo}" class="w-16 h-16 rounded-2xl object-cover shadow-sm border border-gray-100 dark:border-gray-700">` :
                `<div class="w-16 h-16 rounded-2xl ${s.headerIcon} flex items-center justify-center text-xl font-bold shadow-sm">
                                ${v.nom?.charAt(0)}${v.prenom?.charAt(0)}
                            </div>`
            }
                        <div>
                            <h2 class="text-2xl font-bold tracking-tight mb-1">${v.nom} ${v.prenom}</h2>
                            <div class="flex items-center gap-3">
                                <span class="px-2.5 py-0.5 rounded-md bg-red-50 dark:bg-red-900/20 text-red-700 dark:text-red-400 text-xs font-bold uppercase tracking-wide">Volunteer</span>
                                <span class="${s.muted} text-sm">${v.email}</span>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6 mb-8">
                        <div>
                            <div class="${s.label}">Contact Info</div>
                            <div class="${s.value}">${v.telephone || 'N/A'}</div>
                            ${v.identite ? `<div class="text-xs ${s.muted} mt-1">ID: ${v.identite}</div>` : ''}
                        </div>
                         <div>
                            <div class="${s.label}">Location</div>
                            <div class="${s.value}">${v.ville || 'N/A'}</div>
                            ${v.pays ? `<div class="text-xs ${s.muted} mt-1">${v.pays}</div>` : ''}
                        </div>
                        <div>
                            <div class="${s.label}">Date of Birth</div>
                            <div class="${s.value}">${v.date_naissance ? new Date(v.date_naissance).toLocaleDateString() : 'N/A'}</div>
                        </div>
                        <div>
                            <div class="${s.label}">Education</div>
                            <div class="${s.value}">${v.niveau_etudes || 'N/A'}</div>
                        </div>
                         <div class="col-span-2">
                            <div class="${s.label}">Volunteering City</div>
                            <div class="${s.value}">${v.ville_volontariat || 'N/A'}</div>
                        </div>
                         <div class="col-span-2">
                            <div class="${s.label}">Languages</div>
                            <div class="${s.value}">${Array.isArray(v.langues) ? v.langues.join(', ') : (v.langues || 'N/A')}</div>
                        </div>
                         <div class="col-span-2">
                            <div class="${s.label}">Application Date</div>
                            <div class="${s.value}">${v.created_at ? new Date(v.created_at).toLocaleDateString() : 'N/A'}</div>
                        </div>
                    </div>

                    ${v.competences ? `
                    <div class="mb-6 bg-gray-50 dark:bg-gray-800/50 p-4 rounded-xl border border-gray-100 dark:border-gray-800">
                        <div class="${s.label}">Skills & Competences</div>
                        <p class="text-sm ${s.muted} leading-relaxed whitespace-pre-line">${v.competences}</p>
                    </div>` : ''}
                    
                    ${v.disponibilite ? `
                    <div class="mb-6 bg-gray-50 dark:bg-gray-800/50 p-4 rounded-xl border border-gray-100 dark:border-gray-800">
                        <div class="${s.label}">Availability</div>
                        <p class="text-sm ${s.muted} leading-relaxed whitespace-pre-line">${v.disponibilite}</p>
                    </div>` : ''}

                    <div class="flex justify-end gap-3 mt-8 pt-6 border-t ${s.border}">
                        <button onclick="window.premiumModal.close()" class="px-4 py-2 text-sm font-medium ${s.muted} hover:text-gray-900 dark:hover:text-white transition-colors">
                            Close
                        </button>
                        
                        ${v.cv ? `
                        <button onclick="window.premiumModal.openCvModal('/storage/${v.cv}')" class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-600 dark:text-gray-400 rounded-lg text-xs font-bold uppercase tracking-wider hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors flex items-center gap-2">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            View CV
                        </button>` : ''}

                        <a href="/admin_morocco_2030/volontaires/${v.id}/edit" class="${s.btnPrimary} px-4 py-2 text-xs font-bold uppercase tracking-wider rounded-lg transition-all transform hover:-translate-y-0.5 flex items-center gap-2">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        `;
    }

    getContactContent(c, isDark) {
        const s = this.getStyles(isDark);
        const statusColors = {
            'traite': 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400',
            'en_cours': 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400',
            'non_lu': 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400'
        };

        return `
            <div class="relative">
                <button onclick="window.premiumModal.close()" class="absolute top-4 right-4 p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors ${s.muted}">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>

                <div class="p-8">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                             <div class="flex items-center gap-3 mb-2">
                                <h2 class="text-2xl font-bold tracking-tight">${c.nom_prenom}</h2>
                                <span class="px-2.5 py-0.5 rounded-md text-[10px] font-bold uppercase tracking-wide ${statusColors[c.statut]}">
                                    ${c.statut?.replace('_', ' ')}
                                </span>
                            </div>
                            <p class="${s.muted} text-sm font-mono">${c.email}</p>
                        </div>
                        <div class="text-right">
                             <p class="${s.muted} text-xs">${new Date(c.created_at).toLocaleDateString()}</p>
                             <p class="${s.muted} text-xs opacity-70">${new Date(c.created_at).toLocaleTimeString()}</p>
                        </div>
                    </div>

                    <div class="mb-8">
                        <div class="${s.label}">Subject</div>
                        <div class="text-lg font-medium mb-6">${c.objet}</div>

                        <div class="${s.label}">Message</div>
                        <div class="bg-gray-50 dark:bg-gray-900/50 p-5 rounded-2xl border border-gray-100 dark:border-gray-800">
                            <p class="text-sm leading-relaxed ${isDark ? 'text-gray-300' : 'text-gray-700'} whitespace-pre-wrap">${c.message}</p>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 mt-6 pt-6 border-t ${s.border}">
                         ${c.telephone ? `<a href="tel:${c.telephone}" class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-600 dark:text-gray-400 rounded-lg text-xs font-bold uppercase tracking-wider hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">Call</a>` : ''}
                        <a href="mailto:${c.email}" class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-600 dark:text-gray-400 rounded-lg text-xs font-bold uppercase tracking-wider hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">Reply</a>
                        
                        <a href="/admin_morocco_2030/contacts/${c.id}/edit" class="${s.btnPrimary} px-4 py-2 text-xs font-bold uppercase tracking-wider rounded-lg transition-all transform hover:-translate-y-0.5 flex items-center gap-2">
                             <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                            Update Status
                        </a>
                    </div>
                </div>
            </div>
        `;
    }

    getCityContent(data, isDark) {
        // Works for both City model or CityParagraph (logic adjustment)
        const s = this.getStyles(isDark);
        const title = data.city ? data.titre : data.nom;
        const content = data.city ? data.contenu : data.description; // Adjust based on model
        const editUrl = data.city
            ? `/admin_morocco_2030/city-paragraphs/${data.id}/edit`
            : `/admin_morocco_2030/cities/${data.id}/edit`;

        return `
            <div class="relative">
                 <button onclick="window.premiumModal.close()" class="absolute top-4 right-4 p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors ${s.muted}">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>

                <div class="p-8">
                    <div class="flex items-center gap-4 mb-6">
                         <div class="w-12 h-12 rounded-xl ${s.headerIcon} flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-red-600 dark:text-red-400 block mb-0.5">
                                ${data.city ? 'City Content Paragraph' : 'City Profile'}
                            </span>
                            <h2 class="text-xl font-bold tracking-tight ${isDark ? 'text-white' : 'text-gray-900'}">${data.city ? data.city.nom : data.nom}</h2>
                        </div>
                    </div>

                    <div class="mb-6">
                        <div class="${s.label}">${data.city ? 'Section Title' : 'Name'}</div>
                        <h3 class="text-lg font-semibold mb-6">${title}</h3>

                        <div class="${s.label}">${data.city ? 'Content' : 'Description'}</div>
                        <div class="bg-gray-50 dark:bg-gray-900/50 p-5 rounded-2xl border border-gray-100 dark:border-gray-800 max-h-[400px] min-h-[150px] overflow-y-auto">
                            <p class="text-sm leading-relaxed ${isDark ? 'text-gray-300' : 'text-gray-700'} whitespace-pre-line">${content || 'No content provided.'}</p>
                        </div>
                    </div>

                    <div class="flex justify-end pt-4 border-t ${s.border}">
                         <a href="${editUrl}" class="${s.btnPrimary} px-4 py-2 text-xs font-bold uppercase tracking-wider rounded-lg transition-all transform hover:-translate-y-0.5 flex items-center gap-2">
                             <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                            Edit Data
                        </a>
                    </div>
                </div>
            </div>
        `;
    }

    getDestinationContent(data, isDark) {
        const s = this.getStyles(isDark);
        // Supports Destination or DestinationParagraph
        const title = data.destination ? data.titre : data.nom;
        const content = data.destination ? data.contenu : data.description;
        const editUrl = data.destination
            ? `/admin_morocco_2030/destination-paragraphs/${data.id}/edit`
            : `/admin_morocco_2030/destinations/${data.id}/edit`;

        return `
            <div class="relative">
                 <button onclick="window.premiumModal.close()" class="absolute top-4 right-4 p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors ${s.muted} z-10">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>

                <div class="p-8">
                    <div class="flex items-start gap-5 mb-8">
                         <div class="shrink-0 w-12 h-12 rounded-xl ${s.headerIcon} flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-red-600 dark:text-red-400 block mb-1">
                                ${data.destination ? 'Destination Content' : 'Destination Profile'}
                            </span>
                            <h2 class="text-2xl font-bold tracking-tight ${isDark ? 'text-white' : 'text-gray-900'} break-words leading-tight">
                                ${data.destination ? data.destination.nom : data.nom}
                            </h2>
                        </div>
                    </div>

                    <div class="mb-8 space-y-6">
                        <div>
                            <div class="${s.label}">Title</div>
                            <h3 class="text-lg font-semibold ${isDark ? 'text-gray-100' : 'text-gray-900'}">${title || 'Untitled'}</h3>
                        </div>

                        <div>
                            <div class="${s.label} mb-2">${data.destination ? 'Content' : 'Description'}</div>
                            <div class="bg-gray-50 dark:bg-gray-900/50 p-5 rounded-2xl border border-gray-100 dark:border-gray-800 max-h-[400px] min-h-[150px] overflow-y-auto">
                                <p class="text-sm leading-relaxed ${isDark ? 'text-gray-300' : 'text-gray-700'} whitespace-pre-line">${content || 'No content provided.'}</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end pt-6 border-t ${s.border}">
                         <a href="${editUrl}" class="${s.btnPrimary} px-4 py-2.5 text-xs font-bold uppercase tracking-wider rounded-lg transition-all transform hover:-translate-y-0.5 flex items-center gap-2 shadow-lg">
                             <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                            Edit Data
                        </a>
                    </div>
                </div>
            </div>
            `;
    }

    getCommentContent(c, isDark) {
        const s = this.getStyles(isDark);

        return `
            <div class="relative">
                <button onclick="window.premiumModal.close()" class="absolute top-4 right-4 p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors ${s.muted}">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>

                <div class="p-8">
                    <div class="flex items-center gap-5 mb-8">
                        ${c.photo ?
                `<img src="/storage/${c.photo}" class="w-16 h-16 rounded-2xl object-cover shadow-sm">` :
                `<div class="w-16 h-16 rounded-2xl ${s.headerIcon} flex items-center justify-center text-xl font-bold shadow-sm">
                            ${c.nom?.charAt(0)}${c.prenom?.charAt(0)}
                        </div>`}
                        
                        <div>
                            <h2 class="text-2xl font-bold tracking-tight mb-1">${c.nom} ${c.prenom}</h2>
                            <div class="flex items-center gap-3">
                                <span class="px-2.5 py-0.5 rounded-md bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-400 text-xs font-bold uppercase tracking-wide">Comment</span>
                                <span class="${s.muted} text-sm">${c.email}</span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <div class="${s.label} mb-2">Comment Date</div>
                        <div class="${s.value} mb-6">${new Date(c.created_at).toLocaleDateString()} at ${new Date(c.created_at).toLocaleTimeString()}</div>

                        <div class="${s.label} mb-2">Message</div>
                        <div class="bg-gray-50 dark:bg-gray-900/50 p-5 rounded-2xl border border-gray-100 dark:border-gray-800">
                            <p class="text-sm leading-relaxed ${isDark ? 'text-gray-300' : 'text-gray-700'} whitespace-pre-wrap">${c.commentaire}</p>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 mt-8 pt-6 border-t ${s.border}">
                        <button onclick="window.premiumModal.close()" class="px-4 py-2 text-sm font-medium ${s.muted} hover:text-gray-900 dark:hover:text-white transition-colors">
                            Close
                        </button>
                        <a href="/admin_morocco_2030/commentaires/${c.id}/edit" class="${s.btnPrimary} px-4 py-2 text-xs font-bold uppercase tracking-wider rounded-lg transition-all transform hover:-translate-y-0.5 flex items-center gap-2">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                            Edit Comment
                        </a>
                    </div>
                </div>
            </div >
            `;
    }
}

window.premiumModal = new PremiumModal();
