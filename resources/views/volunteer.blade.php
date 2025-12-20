@extends('layouts.app')

@section('content')
    <!-- WRAPPER -->
    <div class="relative w-full bg-stone-50 pb-0 font-outfit overflow-hidden">
        
        <!-- BUBBLE BACKGROUND ANIMATION -->
        <div class="absolute inset-0 w-full h-full pointer-events-none z-0 overflow-hidden">
            <div class="bubble w-96 h-96 bg-[#C8102E]/5 rounded-full blur-3xl absolute -top-20 -left-20 animate-float-slow"></div>
            <div class="bubble w-80 h-80 bg-[#d4af37]/5 rounded-full blur-3xl absolute top-1/3 right-0 animate-float-delay"></div>
            <div class="bubble w-64 h-64 bg-[#006233]/5 rounded-full blur-3xl absolute bottom-0 left-1/4 animate-float-reverse"></div>
            <div class="bubble w-40 h-40 bg-stone-200/50 rounded-full blur-2xl absolute top-1/2 left-1/2 animate-pulse-slow"></div>
        </div>

        <!-- SIDE QUOTES (FILLING EMPTY SPACE) -->
        <div class="absolute top-[100vh] left-0 h-[150vh] w-48 hidden 2xl:flex flex-col justify-around items-center z-10 opacity-30 select-none pointer-events-none text-center px-4">
             <h3 class="text-4xl font-playfair font-black text-stone-300 transform -rotate-90 whitespace-nowrap">"Service is Joy"</h3>
             <h3 class="text-4xl font-playfair font-black text-stone-300 transform -rotate-90 whitespace-nowrap">"Be The Change"</h3>
             <h3 class="text-4xl font-playfair font-black text-stone-300 transform -rotate-90 whitespace-nowrap">"Impact & Serve"</h3>
             <h3 class="text-4xl font-playfair font-black text-stone-300 transform -rotate-90 whitespace-nowrap">"Love Morocco"</h3>
        </div>
        <div class="absolute top-[100vh] right-0 h-[150vh] w-48 hidden 2xl:flex flex-col justify-around items-center z-10 opacity-30 select-none pointer-events-none text-center px-4">
             <h3 class="text-4xl font-playfair font-black text-stone-300 transform rotate-90 whitespace-nowrap">"Heart of Gold"</h3>
             <h3 class="text-4xl font-playfair font-black text-stone-300 transform rotate-90 whitespace-nowrap">"Build The Future"</h3>
             <h3 class="text-4xl font-playfair font-black text-stone-300 transform rotate-90 whitespace-nowrap">"Unity in Action"</h3>
             <h3 class="text-4xl font-playfair font-black text-stone-300 transform rotate-90 whitespace-nowrap">"Travel & Help"</h3>
        </div>

        <!-- 1. HERO SECTION (Scroll Shrink Effect) -->
        <style>
            /* Custom Keyframes from About Page */
            @keyframes fadeUpStagger {
                from { opacity: 0; transform: translateY(40px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-title-word {
                display: inline-block;
                opacity: 0;
                animation: fadeUpStagger 1s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
            }
            @keyframes scrollDrop {
                0% { top: -50%; opacity: 0; }
                50% { opacity: 1; }
                100% { top: 100%; opacity: 0; }
            }
            .animate-scroll-drop {
                animation: scrollDrop 2s cubic-bezier(0.77, 0, 0.175, 1) infinite;
            }
        </style>

        <!-- 1. HERO SECTION (Video Background) -->
        <div id="hero-container" class="relative w-full h-screen overflow-hidden bg-black mx-auto z-10">
             <!-- Video Background -->
            <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover opacity-60 scale-105">
                <source src="{{ asset('videos/volunteer.mp4') }}" type="video/mp4">
            </video>
            
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-transparent to-black/90"></div>
            
            <!-- Hero Content -->
            <div class="relative z-10 h-full flex flex-col items-center justify-center text-center px-4 pt-20">
                <!-- Animated Title -->
                <h1 class="text-6xl md:text-8xl lg:text-9xl font-playfair font-black text-white leading-[0.9] drop-shadow-2xl">
                    <span class="animate-title-word" style="animation-delay: 0.2s;">Be</span>
                    <span class="animate-title-word" style="animation-delay: 0.4s;">The</span><br>
                    <span class="animate-title-word text-transparent bg-clip-text bg-gradient-to-r from-[#C8102E] via-[#ff4d6d] to-[#C8102E]" style="animation-delay: 0.6s;">Pulse</span>
                </h1>
                
                <p class="mt-8 text-xl md:text-2xl font-light text-stone-200 max-w-2xl mx-auto leading-relaxed opacity-0 animate-[fadeIn_1s_ease-out_1.2s_forwards]">
                    Join the movement reshaping Morocco. Your skills, our heritage, one shared future.
                </p>
            </div>

            <!-- Scroll Indicator -->
            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 z-20">
                <span class="text-[10px] font-bold uppercase tracking-[0.3em] text-white/50 animate-pulse font-outfit">Scroll</span>
                <div class="w-[1px] h-16 bg-gradient-to-b from-white/10 to-transparent relative overflow-hidden rounded-full">
                    <div class="absolute top-0 left-0 w-full h-1/2 bg-gradient-to-b from-transparent to-white animate-scroll-drop"></div>
                </div>
            </div>
        </div>

        <!-- 2. MAIN CONTENT (Overlapping Card) -->
        <div class="container mx-auto px-4 md:px-8 mt-8 relative z-20 max-w-6xl">
            <!-- TRANSPARENCY ADDED: bg-white/90 backdrop-blur-xl -->
            <div class="bg-white/90 backdrop-blur-xl rounded-[3rem] shadow-2xl border border-white/50 overflow-hidden relative">
                
                <div class="flex flex-col lg:flex-row">
                    
                    <!-- LEFT: FORM SECTION (WIZARD) -->
                    <div class="w-full lg:w-2/3 p-8 md:p-16 relative">
                        <!-- Wizard Header & Progress -->
                        <div class="mb-12">
                             <span class="text-[#C8102E] font-bold uppercase tracking-widest text-sm mb-4 block text-center md:text-left">Join Us</span>
                             <h2 class="text-4xl md:text-5xl font-playfair font-black text-stone-900 mb-8 text-center md:text-left">Volunteer Application</h2>
                             
                             <!-- STEPS INDICATOR -->
                            <div class="relative z-20">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex flex-col items-center step-indicator active" data-step="1">
                                        <div class="w-10 h-10 rounded-full border-2 border-[#C8102E] bg-[#C8102E] text-white flex items-center justify-center font-bold mb-2 transition-all shadow-md">1</div>
                                        <span class="text-[10px] md:text-xs font-bold text-[#C8102E] uppercase tracking-wider">Personal</span>
                                    </div>
                                    <div class="flex-1 h-[2px] bg-stone-200 mx-2 md:mx-4 relative rounded-full overflow-hidden">
                                        <div class="absolute inset-0 bg-[#C8102E] w-0 transition-all duration-500 ease-out" id="progress-1"></div>
                                    </div>
                                    <div class="flex flex-col items-center step-indicator opacity-40 grayscale" data-step="2">
                                        <div class="w-10 h-10 rounded-full border-2 border-stone-300 bg-white text-stone-400 flex items-center justify-center font-bold mb-2 transition-all">2</div>
                                        <span class="text-[10px] md:text-xs font-bold text-stone-400 uppercase tracking-wider">Contact</span>
                                    </div>
                                    <div class="flex-1 h-[2px] bg-stone-200 mx-2 md:mx-4 relative rounded-full overflow-hidden">
                                        <div class="absolute inset-0 bg-[#C8102E] w-0 transition-all duration-500 ease-out" id="progress-2"></div>
                                    </div>
                                    <div class="flex flex-col items-center step-indicator opacity-40 grayscale" data-step="3">
                                        <div class="w-10 h-10 rounded-full border-2 border-stone-300 bg-white text-stone-400 flex items-center justify-center font-bold mb-2 transition-all">3</div>
                                        <span class="text-[10px] md:text-xs font-bold text-stone-400 uppercase tracking-wider">Skills</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('volunteer.store') }}" method="POST" enctype="multipart/form-data" class="relative z-10" id="volunteer-form">
                            @csrf
                            
                            <!-- STEP 1: PERSONAL INFO + PHOTO -->
                            <div class="form-step" id="step-1">
                                <div class="mb-6">
                                    <h3 class="text-xl font-bold text-stone-800 border-l-4 border-[#C8102E] pl-4">Personal Information</h3>
                                    <p class="text-stone-500 text-sm mt-1 pl-5">Please upload your photo and verify your identity.</p>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Photo Upload (Moved to Part 1 as requested) -->
                                    <div class="md:col-span-2 mb-2 flex justify-center">
                                        <div class="w-full max-w-xs text-center">
                                            <label class="block text-xs font-bold text-stone-400 mb-3 uppercase tracking-wide">Volunteer Photo <span class="text-red-500">*</span></label>
                                            <label id="photo-label" class="relative block w-32 h-32 mx-auto rounded-full border-2 border-dashed border-stone-300 bg-stone-50 hover:bg-[#C8102E]/5 hover:border-[#C8102E] transition-all cursor-pointer group overflow-hidden shadow-sm hover:shadow-md">
                                                <div class="absolute inset-0 bg-[#C8102E]/5 scale-0 group-hover:scale-100 transition-transform duration-500 rounded-full"></div>
                                                <input type="file" name="photo" id="photo-upload" class="hidden" accept="image/*" required>
                                                <div class="w-full h-full flex flex-col items-center justify-center relative z-10">
                                                    <i id="photo-icon" class="fas fa-camera text-2xl text-stone-300 group-hover:text-[#C8102E] transition-colors mb-1"></i>
                                                    <span id="photo-text" class="text-[10px] text-stone-400 font-bold uppercase">Upload</span>
                                                </div>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="space-y-6">
                                        <div class="relative group">
                                            <input type="text" name="prenom" id="prenom" class="peer block w-full px-5 pt-6 pb-2 text-stone-800 bg-stone-50 border-2 border-stone-100 rounded-2xl focus:ring-0 focus:border-[#C8102E] focus:bg-white transition-all outline-none font-bold placeholder-transparent shadow-sm hover:border-[#C8102E]/30" placeholder="First Name" required />
                                            <label for="prenom" class="absolute text-stone-400 duration-300 transform -translate-y-3 scale-75 top-5 z-10 origin-[0] left-5 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-[#C8102E] font-bold tracking-widest pointer-events-none uppercase text-[10px]">First Name <span class="text-red-500">*</span></label>
                                        </div>
                                        <div class="relative group">
                                            <input type="text" name="nom" id="nom" class="peer block w-full px-5 pt-6 pb-2 text-stone-800 bg-stone-50 border-2 border-stone-100 rounded-2xl focus:ring-0 focus:border-[#C8102E] focus:bg-white transition-all outline-none font-bold placeholder-transparent shadow-sm hover:border-[#C8102E]/30" placeholder="Last Name" required />
                                            <label for="nom" class="absolute text-stone-400 duration-300 transform -translate-y-3 scale-75 top-5 z-10 origin-[0] left-5 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-[#C8102E] font-bold tracking-widest pointer-events-none uppercase text-[10px]">Last Name <span class="text-red-500">*</span></label>
                                        </div>
                                    </div>

                                    <div class="space-y-6">
                                        <div class="relative group">
                                            <input type="date" name="date_naissance" id="date_naissance" class="peer block w-full px-5 pt-6 pb-2 text-stone-800 bg-stone-50 border-2 border-stone-100 rounded-2xl focus:ring-0 focus:border-[#C8102E] focus:bg-white transition-all outline-none font-bold placeholder-transparent shadow-sm hover:border-[#C8102E]/30 text-stone-600" required />
                                            <label for="date_naissance" class="absolute text-stone-400 duration-300 transform -translate-y-3 scale-75 top-5 z-10 origin-[0] left-5 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-[#C8102E] font-bold tracking-widest pointer-events-none uppercase text-[10px] bg-transparent">Date of Birth <span class="text-red-500">*</span></label>
                                        </div>
                                        <div class="relative group">
                                            <input type="text" name="identite" id="identite" class="peer block w-full px-5 pt-6 pb-2 text-stone-800 bg-stone-50 border-2 border-stone-100 rounded-2xl focus:ring-0 focus:border-[#C8102E] focus:bg-white transition-all outline-none font-bold placeholder-transparent shadow-sm hover:border-[#C8102E]/30" placeholder="ID Number" required />
                                            <label for="identite" class="absolute text-stone-400 duration-300 transform -translate-y-3 scale-75 top-5 z-10 origin-[0] left-5 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-[#C8102E] font-bold tracking-widest pointer-events-none uppercase text-[10px]">CIN / Passport <span class="text-red-500">*</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- STEP 2: CONTACT & ADDRESS -->
                            <div class="form-step hidden" id="step-2">
                                <div class="mb-6">
                                    <h3 class="text-xl font-bold text-stone-800 border-l-4 border-[#C8102E] pl-4">Contact & Location</h3>
                                    <p class="text-stone-500 text-sm mt-1 pl-5">How can we reach you?</p>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="relative group">
                                        <input type="email" name="email" id="email" class="peer block w-full px-5 pt-6 pb-2 text-stone-800 bg-stone-50 border-2 border-stone-100 rounded-2xl focus:ring-0 focus:border-[#C8102E] focus:bg-white transition-all outline-none font-bold placeholder-transparent shadow-sm hover:border-[#C8102E]/30" placeholder="email" required />
                                        <label for="email" class="absolute text-stone-400 duration-300 transform -translate-y-3 scale-75 top-5 z-10 origin-[0] left-5 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-[#C8102E] font-bold tracking-widest pointer-events-none uppercase text-[10px]">Email <span class="text-red-500">*</span></label>
                                    </div>
                                    <div class="relative group">
                                        <input type="tel" name="telephone" id="telephone" class="peer block w-full px-5 pt-6 pb-2 text-stone-800 bg-stone-50 border-2 border-stone-100 rounded-2xl focus:ring-0 focus:border-[#C8102E] focus:bg-white transition-all outline-none font-bold placeholder-transparent shadow-sm hover:border-[#C8102E]/30" placeholder="Phone" required />
                                        <label for="telephone" class="absolute text-stone-400 duration-300 transform -translate-y-3 scale-75 top-5 z-10 origin-[0] left-5 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-[#C8102E] font-bold tracking-widest pointer-events-none uppercase text-[10px]">Phone <span class="text-red-500">*</span></label>
                                    </div>
                                    <div class="relative group">
                                        <input type="text" name="pays" id="pays" class="peer block w-full px-5 pt-6 pb-2 text-stone-800 bg-stone-50 border-2 border-stone-100 rounded-2xl focus:ring-0 focus:border-[#C8102E] focus:bg-white transition-all outline-none font-bold placeholder-transparent shadow-sm hover:border-[#C8102E]/30" placeholder="Country" required />
                                        <label for="pays" class="absolute text-stone-400 duration-300 transform -translate-y-3 scale-75 top-5 z-10 origin-[0] left-5 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-[#C8102E] font-bold tracking-widest pointer-events-none uppercase text-[10px]">Country <span class="text-red-500">*</span></label>
                                    </div>
                                    <div class="relative group">
                                        <input type="text" name="ville" id="ville" class="peer block w-full px-5 pt-6 pb-2 text-stone-800 bg-stone-50 border-2 border-stone-100 rounded-2xl focus:ring-0 focus:border-[#C8102E] focus:bg-white transition-all outline-none font-bold placeholder-transparent shadow-sm hover:border-[#C8102E]/30" placeholder="City" required />
                                        <label for="ville" class="absolute text-stone-400 duration-300 transform -translate-y-3 scale-75 top-5 z-10 origin-[0] left-5 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-[#C8102E] font-bold tracking-widest pointer-events-none uppercase text-[10px]">City <span class="text-red-500">*</span></label>
                                    </div>
                                    <div class="md:col-span-2 relative group">
                                        <textarea name="adresse" id="adresse" rows="2" class="peer block w-full px-5 pt-6 pb-2 text-stone-800 bg-stone-50 border-2 border-stone-100 rounded-2xl focus:ring-0 focus:border-[#C8102E] focus:bg-white transition-all outline-none font-bold placeholder-transparent resize-none shadow-sm hover:border-[#C8102E]/30" placeholder="Address" required></textarea>
                                        <label for="adresse" class="absolute text-stone-400 duration-300 transform -translate-y-3 scale-75 top-5 z-10 origin-[0] left-5 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-[#C8102E] font-bold tracking-widest pointer-events-none uppercase text-[10px]">Address <span class="text-red-500">*</span></label>
                                    </div>
                                </div>
                            </div>

                            <!-- STEP 3: BACKGROUND, SKILLS & CV -->
                            <div class="form-step hidden" id="step-3">
                                <div class="mb-6">
                                    <h3 class="text-xl font-bold text-stone-800 border-l-4 border-[#C8102E] pl-4">Background & Skills</h3>
                                    <p class="text-stone-500 text-sm mt-1 pl-5">Tell us about your experience and skills.</p>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                    <div>
                                        <label class="block text-sm font-bold text-stone-700 mb-2 uppercase tracking-wide">Education Level</label>
                                        <select name="niveau_etudes" class="w-full rounded-full bg-stone-50 border-stone-200 px-5 py-3 focus:bg-white focus:border-[#d4af37] focus:ring-4 focus:ring-[#d4af37]/10 transition-all cursor-pointer" required>
                                            <option value="" disabled selected>Select Level</option>
                                            <option value="High School">High School</option>
                                            <option value="Bachelor's Degree">Bachelor's Degree</option>
                                            <option value="Master's Degree">Master's Degree</option>
                                            <option value="PhD">PhD</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-bold text-stone-700 mb-2 uppercase tracking-wide">Availability</label>
                                        <select name="disponibilite" class="w-full rounded-full bg-stone-50 border-stone-200 px-5 py-3 focus:bg-white focus:border-[#d4af37] focus:ring-4 focus:ring-[#d4af37]/10 transition-all cursor-pointer" required>
                                            <option value="" disabled selected>Select Availability</option>
                                            <option value="Full Time">Full Time</option>
                                            <option value="Part Time">Part Time</option>
                                            <option value="Weekends Only">Weekends Only</option>
                                            <option value="Summer Only">Summer Only</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- NEW: SKILLS SECTION (Compétences) -->
                                <div class="mb-6 relative group">
                                    <textarea name="competences" id="competences" rows="3" class="peer block w-full px-5 pt-8 pb-3 text-stone-800 bg-stone-50 border-2 border-stone-100 rounded-2xl focus:ring-0 focus:border-[#C8102E] focus:bg-white transition-all outline-none font-medium placeholder-transparent resize-none shadow-sm hover:border-[#C8102E]/30" placeholder="Skills" required></textarea>
                                    <label for="competences" class="absolute text-stone-400 duration-300 transform -translate-y-3 scale-75 top-5 z-10 origin-[0] left-5 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 peer-focus:text-[#C8102E] font-bold tracking-widest pointer-events-none uppercase text-[10px]">Skills & Competences <span class="text-red-500">*</span></label>
                                </div>

                                <!-- Languages -->
                                <div class="mb-6">
                                    <label class="text-xs font-bold uppercase tracking-widest text-[#d4af37] mb-3 block">Languages Spoken</label>
                                    <div class="flex flex-wrap gap-2">
                                         @foreach(['Arabic', 'French', 'English', 'Spanish', 'Amazigh'] as $lang)
                                            <label class="cursor-pointer group">
                                                <input type="checkbox" name="langues[]" value="{{ $lang }}" class="peer sr-only lang-checkbox">
                                                <span class="px-5 py-2 rounded-full border border-stone-200 bg-white text-stone-600 text-xs font-bold transition-all shadow-sm hover:border-[#d4af37] flex items-center gap-2 group-hover:bg-[#d4af37]/5">
                                                    {{ $lang }} <i class="fas fa-check text-[10px] opacity-0 transition-opacity"></i>
                                                </span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- CV Upload -->
                                <div class="mb-8">
                                     <label id="cv-label" class="relative block w-full rounded-2xl border-2 border-dashed border-stone-300 bg-stone-50/50 hover:bg-[#C8102E]/5 hover:border-[#C8102E] transition-all cursor-pointer group overflow-hidden py-6">
                                        <input type="file" name="cv" id="cv-upload" class="hidden" accept=".pdf,.docx,.doc">
                                        <div class="flex items-center justify-center gap-4">
                                            <div class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center border border-stone-100 shrink-0">
                                                <i id="cv-icon" class="fas fa-file-alt text-[#C8102E]"></i>
                                            </div>
                                            <div class="text-left">
                                                <span id="cv-text" class="block text-stone-700 font-bold text-sm group-hover:text-[#C8102E] transition-colors">Upload Resume (CV)</span>
                                                <span class="block text-stone-400 text-[10px] uppercase">PDF or DOCX (Max 5MB)</span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                
                                <!-- City Preference -->
                                <div class="mb-4">
                                    <label class="text-xs font-bold uppercase tracking-widest text-stone-500 mb-3 block">Preferred City for Volunteering</label>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach(['Marrakech', 'Casablanca', 'Rabat', 'Fez', 'Tangier', 'Agadir'] as $city)
                                        <label class="cursor-pointer group">
                                            <input type="radio" name="ville_volontariat" value="{{ $city }}" class="peer sr-only city-radio" required>
                                            <span class="block px-4 py-2 rounded-full border border-stone-200 bg-white text-stone-600 text-xs font-bold transition-all hover:border-[#C8102E] shadow-sm">
                                                {{ $city }}
                                            </span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            
                            <!-- NAVIGATION BUTTONS -->
                            <div class="pt-8 mt-4 border-t border-stone-100 flex justify-between items-center gap-4">
                                <button type="button" id="prev-btn" class="hidden px-6 py-3 rounded-full border border-stone-300 text-stone-500 font-bold hover:bg-stone-50 hover:text-stone-800 transition-colors text-sm uppercase tracking-wide">
                                    <i class="fas fa-arrow-left mr-2"></i> Back
                                </button>
                                
                                <button type="button" id="next-btn" class="ml-auto px-8 py-3 rounded-full bg-[#C8102E] text-white font-bold shadow-lg shadow-red-500/20 hover:bg-[#a00d25] hover:scale-105 transition-all text-sm uppercase tracking-wide">
                                    Next Step <i class="fas fa-arrow-right ml-2"></i>
                                </button>

                                <button type="submit" id="submit-btn" class="hidden ml-auto px-8 py-3 bg-gradient-to-r from-[#C8102E] to-[#960d23] text-white rounded-full font-black uppercase tracking-widest shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all text-sm">
                                    Submit Application
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- RIGHT: INFO / IMAGE COLUMN (Minimalist Premium) -->
                    <div class="w-full lg:w-1/3 relative flex flex-col justify-between bg-stone-900 border-l border-stone-800 overflow-hidden">
                        <!-- Subtle Background Texture -->
                        <div class="absolute inset-0 bg-[url('{{ asset('assets/images/zellige_pattern.png') }}')] opacity-[0.03]" style="background-size: 300px;"></div>
                        
                        <div class="p-10 relative z-10 flex flex-col h-full justify-center">
                            
                            <!-- Minimalist Header -->
                            <h3 class="text-4xl font-playfair font-black text-white mb-6 leading-tight tracking-tight">
                                Why <br> <span class="text-[#d4af37]">Volunteer?</span>
                            </h3>

                            <p class="text-stone-400 leading-relaxed mb-10 font-light text-lg">
                                Join the movement reshaping Morocco. It's more than service—it's a legacy.
                            </p>

                            <!-- Clean List -->
                            <ul class="space-y-8">
                                <li class="flex items-center gap-5 group">
                                    <div class="w-10 h-10 rounded-full border border-stone-700 bg-stone-800/50 flex items-center justify-center shrink-0 group-hover:border-[#d4af37] group-hover:text-[#d4af37] transition-all duration-300">
                                        <i class="fas fa-star text-stone-500 text-sm group-hover:text-[#d4af37] transition-colors"></i>
                                    </div>
                                    <span class="text-stone-300 font-medium group-hover:text-white transition-colors text-lg">Exclusive Events Access</span>
                                </li>
                                <li class="flex items-center gap-5 group">
                                    <div class="w-10 h-10 rounded-full border border-stone-700 bg-stone-800/50 flex items-center justify-center shrink-0 group-hover:border-[#d4af37] group-hover:text-[#d4af37] transition-all duration-300">
                                        <i class="fas fa-graduation-cap text-stone-500 text-sm group-hover:text-[#d4af37] transition-colors"></i>
                                    </div>
                                    <span class="text-stone-300 font-medium group-hover:text-white transition-colors text-lg">Professional Growth</span>
                                </li>
                                <li class="flex items-center gap-5 group">
                                    <div class="w-10 h-10 rounded-full border border-stone-700 bg-stone-800/50 flex items-center justify-center shrink-0 group-hover:border-[#d4af37] group-hover:text-[#d4af37] transition-all duration-300">
                                        <i class="fas fa-globe text-stone-500 text-sm group-hover:text-[#d4af37] transition-colors"></i>
                                    </div>
                                    <span class="text-stone-300 font-medium group-hover:text-white transition-colors text-lg">Global Networking</span>
                                </li>
                            </ul>

                            <!-- Minimalist Footer/Support -->
                            <div class="mt-16 pt-8 border-t border-stone-800">
                                <p class="text-sm text-stone-500 mb-3">Questions about the program?</p>
                                <a href="{{ route('contact') }}" class="inline-flex items-center gap-3 text-white font-bold text-sm tracking-widest uppercase group hover:text-[#d4af37] transition-colors">
                                    Contact Support 
                                    <i class="fas fa-arrow-right transform group-hover:translate-x-1 transition-transform text-[#d4af37]"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- INFINITE SCROLLING BAR (Before Footer) -->

    </div>

    <style>
    <style>
        .animate-slow-zoom { animation: slowZoom 20s infinite alternate; }
        .step-indicator { transition: all 0.3s ease; }
        .form-step { animation: activeStep 0.5s ease-out; }
        @keyframes activeStep { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        @keyframes slowZoom { from { transform: scale(1); } to { transform: scale(1.1); } }
        
        .animate-fade-up { animation: fadeUp 0.8s ease-out forwards; }
        @keyframes fadeUp { to { opacity: 1; transform: translateY(0); } }

        .animate-fade-in { animation: fadeIn 1s ease-out forwards; }
        @keyframes fadeIn { to { opacity: 1; } }
        
        /* Floating Bubbles*/
        @keyframes float {
            0% { transform: translate(0, 0); }
            50% { transform: translate(20px, -20px); }
            100% { transform: translate(0, 0); }
        }
        .animate-float-slow { animation: float 8s ease-in-out infinite; }
        .animate-float-delay { animation: float 10s ease-in-out infinite 2s; }
        .animate-float-reverse { animation: float 9s ease-in-out infinite reverse; }
        .animate-pulse-slow { animation: pulse 6s infinite; }
        
        /* Marquee Animation */
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            animation: marquee 30s linear infinite;
        }
        
        /* Marquee Container & Content */
        .marquee-container {
            display: flex;
            overflow: hidden;
        }
        .marquee-content {
            display: flex;
            animation: marquee 40s linear infinite;
        }

        /* FORCE OVERRIDES FOR SELECTION VISIBILITY */
        .lang-checkbox:checked + span {
            background-color: #d4af37 !important;
            color: white !important;
            border-color: #d4af37 !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .lang-checkbox:checked + span i {
            opacity: 1 !important;
        }

        .city-radio:checked + span {
            background-color: #C8102E !important;
            color: white !important;
            border-color: #C8102E !important;
            box-shadow: 0 10px 15px -3px rgba(200, 16, 46, 0.3);
        }
    </style>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // WIZARD LOGIC
            let currentStep = 1;
            const totalSteps = 3;
            
            const nextBtn = document.getElementById('next-btn');
            const prevBtn = document.getElementById('prev-btn');
            const submitBtn = document.getElementById('submit-btn');
            
            // Initialization
            updateStep(1);

            function updateStep(step) {
                // Hide all steps
                document.querySelectorAll('.form-step').forEach(el => el.classList.add('hidden'));
                // Show current step - ensure transition animation plays
                const stepEl = document.getElementById(`step-${step}`);
                stepEl.classList.remove('hidden');
                stepEl.classList.add('animate-fade-in');
                
                // Update Indicators & Progress Bars
                document.querySelectorAll('.step-indicator').forEach(el => {
                    const s = parseInt(el.dataset.step);
                    const circle = el.querySelector('div');
                    
                    if (s < step) { // Completed
                        circle.innerHTML = '<i class="fas fa-check"></i>';
                        el.classList.remove('opacity-40', 'grayscale', 'active');
                        el.classList.add('completed', 'text-[#C8102E]');
                        circle.className = 'w-10 h-10 rounded-full border-2 border-[#C8102E] bg-white text-[#C8102E] flex items-center justify-center font-bold mb-2 transition-all';
                        
                        // Fill progress bar to right of this step (if exists)
                        const prog = document.getElementById(`progress-${s}`);
                        if(prog) prog.style.width = '100%';
                        
                    } else if (s === step) { // Current
                        circle.innerHTML = s;
                        el.classList.remove('opacity-40', 'grayscale', 'completed');
                        el.classList.add('active', 'text-[#C8102E]');
                        circle.className = 'w-10 h-10 rounded-full border-2 border-[#C8102E] bg-[#C8102E] text-white flex items-center justify-center font-bold mb-2 transition-all shadow-md transform scale-110';
                        
                         // Reset progress bar to right (empty)
                        const prog = document.getElementById(`progress-${s}`);
                        if(prog) prog.style.width = '0%';

                    } else { // Future
                        circle.innerHTML = s;
                        el.classList.add('opacity-40', 'grayscale');
                        el.classList.remove('active', 'completed', 'text-[#C8102E]');
                        circle.className = 'w-10 h-10 rounded-full border-2 border-stone-300 bg-white text-stone-400 flex items-center justify-center font-bold mb-2 transition-all';
                        
                        const prog = document.getElementById(`progress-${s}`);
                        if(prog) prog.style.width = '0%';
                    }
                });

                // Button State Control
                if (step === 1) {
                    prevBtn.classList.add('hidden');
                    nextBtn.classList.remove('hidden');
                    submitBtn.classList.add('hidden');
                } else if (step === totalSteps) {
                    prevBtn.classList.remove('hidden');
                    nextBtn.classList.add('hidden');
                    submitBtn.classList.remove('hidden');
                } else {
                    prevBtn.classList.remove('hidden');
                    nextBtn.classList.remove('hidden');
                    submitBtn.classList.add('hidden');
                }
            }

            // Click Handler: Next
            if(nextBtn) {
                nextBtn.addEventListener('click', () => {
                    if (validateStep(currentStep)) {
                        if (currentStep < totalSteps) {
                            currentStep++;
                            updateStep(currentStep);
                            // Correct scroll to form container
                            const formContainer = document.getElementById('volunteer-form');
                            if(formContainer) {
                                const offset = 100; // offset for sticky header if any
                                const bodyRect = document.body.getBoundingClientRect().top;
                                const elementRect = formContainer.getBoundingClientRect().top;
                                const elementPosition = elementRect - bodyRect;
                                const offsetPosition = elementPosition - offset;

                                window.scrollTo({
                                    top: offsetPosition,
                                    behavior: 'smooth'
                                });
                            }
                        }
                    }
                });
            }

            // Click Handler: Prev
            if(prevBtn) {
                prevBtn.addEventListener('click', () => {
                    if (currentStep > 1) {
                        currentStep--;
                        updateStep(currentStep);
                    }
                });
            }

            // Step Validation Logic
            function validateStep(step) {
                const stepEl = document.getElementById(`step-${step}`);
                // Select inputs that are required AND visible
                const inputs = stepEl.querySelectorAll('input[required], select[required], textarea[required]');
                let isValid = true;
                
                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        isValid = false;
                        input.classList.add('ring-2', 'ring-red-500', 'border-red-500');
                        // Remove error on input
                        input.addEventListener('input', function() {
                            this.classList.remove('ring-2', 'ring-red-500', 'border-red-500');
                        }, { once: true });
                    }
                });

                if (!isValid) {
                    // Shake animation for visual feedback
                    stepEl.classList.add('animate-pulse');
                    setTimeout(() => stepEl.classList.remove('animate-pulse'), 500);
                }

                return isValid;
            }

            // FILE UPLOAD HANDLING (Drag & Drop + Feedback)
            const uploadZones = [
                { inputId: 'cv-upload', labelId: 'cv-label', textId: 'cv-text', iconId: 'cv-icon' },
                { inputId: 'photo-upload', labelId: 'photo-label', textId: 'photo-text', iconId: 'photo-icon' }
            ];

            uploadZones.forEach(zone => {
                const input = document.getElementById(zone.inputId);
                const label = document.getElementById(zone.labelId);
                const textSpan = document.getElementById(zone.textId);
                const icon = document.getElementById(zone.iconId);
                
                if (!input || !label) return;

                input.addEventListener('change', function(e) {
                    if(e.target.files[0]) handleFileSelect(e.target.files[0], textSpan, icon, label);
                });

                 // Drag & Drop Events
                 ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    label.addEventListener(eventName, preventDefaults, false);
                });

                function preventDefaults(e) { e.preventDefault(); e.stopPropagation(); }

                ['dragenter', 'dragover'].forEach(eventName => {
                    label.addEventListener(eventName, () => {
                        label.classList.add('border-[#C8102E]', 'bg-[#C8102E]/5', 'scale-[1.02]');
                    }, false);
                });

                ['dragleave', 'drop'].forEach(eventName => {
                    label.addEventListener(eventName, () => {
                        label.classList.remove('border-[#C8102E]', 'bg-[#C8102E]/5', 'scale-[1.02]');
                    }, false);
                });

                label.addEventListener('drop', (e) => {
                    const dt = e.dataTransfer;
                    if (dt.files.length) {
                         input.files = dt.files;
                         handleFileSelect(dt.files[0], textSpan, icon, label);
                    }
                }, false);

                function handleFileSelect(file, textElement, iconElement, labelElement) {
                    textElement.textContent = file.name.substring(0, 20) + (file.name.length > 20 ? '...' : '');
                    textElement.classList.add('text-[#006233]', 'font-bold');
                    iconElement.className = 'fas fa-check-circle text-2xl text-[#006233]';
                    labelElement.classList.add('border-[#006233]', 'bg-[#006233]/5');
                    labelElement.classList.remove('border-stone-300', 'bg-stone-50');
                }
            });
        });
    </script>
@endsection
