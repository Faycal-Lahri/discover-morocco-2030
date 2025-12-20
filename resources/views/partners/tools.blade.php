@extends('layouts.app')

@section('hide_newsletter', true)

@section('content')
    <!-- 1. HERO SECTION -->
    <!-- 1. HERO SECTION -->
    <div class="relative h-screen overflow-hidden bg-stone-900 text-white flex items-center justify-center">
        
        <!-- Video Background -->
        <div class="absolute inset-0 z-0">
            <video autoplay muted loop playsinline class="w-full h-full object-cover opacity-50">
                <source src="{{ asset('videos/about.mp4') }}" type="video/mp4">
            </video>
            <!-- Sophisticated Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-transparent to-black/90"></div>
            <div class="absolute inset-0 bg-black/20 backdrop-blur-[2px]"></div>
        </div>
        
        <!-- Main Content -->
        <div class="relative z-20 container mx-auto px-6 text-center max-w-5xl">
            
            <!-- Minimal Badge -->
            <div class="inline-flex items-center gap-3 px-4 py-1.5 rounded-full border border-white/20 bg-white/10 backdrop-blur-md mb-10 animate-fade-in-up">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 shadow-[0_0_10px_rgba(52,211,153,0.8)]"></span>
                <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-white/90">Official Partner Resources</span>
            </div>
            
            <!-- Elegant Headline -->
            <h1 class="text-6xl md:text-8xl lg:text-9xl font-playfair font-medium mb-8 leading-tight tracking-tight animate-fade-in-up delay-100">
                Build the <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-stone-200 to-stone-400 italic pr-2">Extraordinary</span>
            </h1>
            
            <!-- Clean Subtitle -->
            <p class="text-xl md:text-2xl text-stone-300 font-light leading-relaxed animate-fade-in-up delay-200 max-w-2xl mx-auto mb-12">
                The complete digital toolkit for integrating <span class="text-white font-normal">Morocco 2030</span>. 
                Brand assets, API access, and widgets designed for creators.
            </p>
            
            <!-- Refined CTAs -->
            <div class="flex flex-col md:flex-row items-center justify-center gap-6 animate-fade-in-up delay-300">
                <button onclick="document.getElementById('brand-kit').scrollIntoView({behavior: 'smooth'})" 
                        class="px-10 py-4 bg-white text-black rounded-full font-bold uppercase text-[11px] tracking-[0.2em] hover:bg-stone-200 transition-all transform hover:scale-105 shadow-xl">
                    Start Building
                </button>
                
                <a href="{{ route('partners.hub') }}" 
                   class="px-10 py-4 rounded-full border border-white/30 bg-white/5 backdrop-blur-sm text-white font-bold uppercase text-[11px] tracking-[0.2em] hover:bg-white/10 hover:border-white transition-all">
                    Content Hub
                </a>
            </div>
        </div>

        <!-- Minimal Scroll Indicator -->
        <div class="absolute bottom-12 left-1/2 -translate-x-1/2 animate-bounce opacity-30">
            <i class="fas fa-chevron-down text-white text-xl"></i>
        </div>
    </div>

    <!-- 2. STICKY SUB-NAV -->
    <div class="sticky top-0 z-40 bg-white/80 backdrop-blur-xl border-b border-stone-200 shadow-sm transition-all duration-300" id="tools-nav">
        <div class="container mx-auto px-6">
            <div class="flex items-center justify-between h-16 overflow-x-auto no-scrollbar">
                <span class="font-playfair font-bold text-xl mr-8 whitespace-nowrap hidden md:block">Partner Tools</span>
                
                <nav class="flex items-center gap-1 md:gap-2">
                    <button onclick="scrollToSection('brand-kit')" class="px-4 py-2 rounded-full text-xs font-bold uppercase tracking-widest text-stone-500 hover:text-[#C8102E] hover:bg-stone-50 transition-all whitespace-nowrap">Brand Kit</button>
                    <button onclick="scrollToSection('widget-builder')" class="px-4 py-2 rounded-full text-xs font-bold uppercase tracking-widest text-stone-500 hover:text-[#C8102E] hover:bg-stone-50 transition-all whitespace-nowrap">Widget Builder</button>
                    <button onclick="scrollToSection('api-docs')" class="px-4 py-2 rounded-full text-xs font-bold uppercase tracking-widest text-stone-500 hover:text-[#C8102E] hover:bg-stone-50 transition-all whitespace-nowrap">API</button>
                    <button onclick="scrollToSection('marketing')" class="px-4 py-2 rounded-full text-xs font-bold uppercase tracking-widest text-stone-500 hover:text-[#C8102E] hover:bg-stone-50 transition-all whitespace-nowrap">Marketing</button>
                </nav>
            </div>
        </div>
    </div>

    <script>
        function scrollToSection(id) {
            const el = document.getElementById(id);
            if(el) {
                const navHeight = document.getElementById('tools-nav').offsetHeight;
                const top = el.getBoundingClientRect().top + window.pageYOffset - navHeight - 20;
                window.scrollTo({top: top, behavior: 'smooth'});
            }
        }
    </script>

    <!-- MAIN CONTENT WRAPPER -->
    <div class="bg-stone-50 min-h-screen">
        
        <!-- SECTION 3: BRAND KIT (Interactive) -->
        <section id="brand-kit" class="py-24 container mx-auto px-6">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
                <div>
                    <span class="text-[#C8102E] font-bold uppercase tracking-widest text-xs mb-2 block">01. Visual Identity</span>
                    <h2 class="text-4xl md:text-5xl font-playfair font-bold text-stone-900">Brand System</h2>
                </div>
            </div>

            <!-- Colors & Logo Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8" x-data="{ copied: null }">
                
                <!-- Interactive Color Shutters -->
                <div class="h-[500px] flex gap-2 lg:gap-4 select-none">
                    
                     <!-- Red Shutter -->
                    <div class="relative flex-1 group hover:flex-[3] transition-all duration-500 ease-out overflow-hidden rounded-2xl bg-[#C8102E] cursor-pointer shadow-xl hover:shadow-red-900/30"
                         @click="navigator.clipboard.writeText('#C8102E'); dispatchNotify('#C8102E Copied to Clipboard!')">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-60"></div>
                        <div class="absolute bottom-0 left-0 p-8 w-full transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                            <span class="text-xs font-bold text-white/60 mb-2 block tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity delay-100">Primary</span>
                            <h3 class="text-4xl lg:text-5xl font-playfair font-black text-white mb-2 whitespace-nowrap">Moroccan Red</h3>
                            <div class="flex items-center justify-between border-t border-white/20 pt-4 opacity-0 group-hover:opacity-100 transition-opacity delay-200">
                                <span class="font-mono text-white text-sm">#C8102E</span>
                                <i class="fas fa-copy text-white"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Green Shutter -->
                    <div class="relative flex-1 group hover:flex-[3] transition-all duration-500 ease-out overflow-hidden rounded-2xl bg-[#006233] cursor-pointer shadow-xl hover:shadow-green-900/30"
                         @click="navigator.clipboard.writeText('#006233'); dispatchNotify('#006233 Copied to Clipboard!')">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-60"></div>
                        <div class="absolute bottom-0 left-0 p-8 w-full transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                            <span class="text-xs font-bold text-white/60 mb-2 block tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity delay-100">Secondary</span>
                            <h3 class="text-4xl lg:text-5xl font-playfair font-black text-white mb-2 whitespace-nowrap">Palm Green</h3>
                            <div class="flex items-center justify-between border-t border-white/20 pt-4 opacity-0 group-hover:opacity-100 transition-opacity delay-200">
                                <span class="font-mono text-white text-sm">#006233</span>
                                <i class="fas fa-copy text-white"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Gold Shutter -->
                    <div class="relative flex-1 group hover:flex-[3] transition-all duration-500 ease-out overflow-hidden rounded-2xl bg-[#d4af37] cursor-pointer shadow-xl hover:shadow-yellow-900/30"
                         @click="navigator.clipboard.writeText('#d4af37'); dispatchNotify('#d4af37 Copied to Clipboard!')">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-60"></div>
                        <div class="absolute bottom-0 left-0 p-8 w-full transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                            <span class="text-xs font-bold text-white/60 mb-2 block tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity delay-100">Accent</span>
                            <h3 class="text-4xl lg:text-5xl font-playfair font-black text-white mb-2 whitespace-nowrap">Sahara Gold</h3>
                            <div class="flex items-center justify-between border-t border-white/20 pt-4 opacity-0 group-hover:opacity-100 transition-opacity delay-200">
                                <span class="font-mono text-white text-sm">#d4af37</span>
                                <i class="fas fa-copy text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Typography & Logo -->
                <div class="bg-stone-900 p-8 rounded-3xl shadow-xl text-white relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-[#C8102E] opacity-10 blur-[80px] rounded-full -mr-20 -mt-20"></div>
                    
                    <h3 class="font-playfair font-bold text-2xl mb-8 relative z-10">Typography</h3>
                    
                    <div class="space-y-6 relative z-10 border-l border-white/10 pl-6">
                        <div>
                            <h1 class="text-4xl font-playfair font-bold mb-1">Playfair Display</h1>
                            <p class="text-white/40 text-sm">Headings & Titles</p>
                        </div>
                        <div>
                            <h2 class="text-2xl font-outfit font-light mb-1">Outfit</h2>
                            <p class="text-white/40 text-sm">Body Text & UI Elements</p>
                        </div>
                        <div>
                            <h2 class="text-xl font-display font-medium mb-1">Plus Jakarta Sans</h2>
                            <p class="text-white/40 text-sm">Data & Numbers</p>
                        </div>
                    </div>

                    <div class="mt-10 pt-8 border-t border-white/10 relative z-10 flex items-center justify-between">
                         <div>
                            <span class="text-xs text-white/40 uppercase tracking-widest block mb-1">Brand Logo</span>
                            <div class="text-2xl font-black uppercase tracking-wider">Morocco<span class="text-[#C8102E]">.</span></div>
                         </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 4: WIDGET BUILDER (Highly Interactive) -->
        <section id="widget-builder" class="py-24 bg-white border-y border-stone-100">
            <div class="container mx-auto px-6">
                
                <div class="text-center mb-16">
                    <span class="text-[#006233] font-bold uppercase tracking-widest text-xs mb-2 block">02. Embeddable Tools</span>
                    <h2 class="text-4xl md:text-5xl font-playfair font-black text-stone-900 mb-6">Widget Builder</h2>
                    <p class="text-stone-500 max-w-2xl mx-auto">Customize and embed dynamic Morocco content directly into your website. Real-time updates handled by our CDN.</p>
                </div>

                <!-- BUILDER INTERFACE -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 bg-stone-50 rounded-[2.5rem] p-4 md:p-8 shadow-2xl border border-stone-200"
                     x-data="{
                        theme: 'light',
                        type: 'weather',
                        city: 'Marrakech',
                        showImage: true,
                        device: 'mobile'
                     }">
                    
                    <!-- Left: Controls -->
                    <div class="lg:col-span-4 bg-white rounded-3xl p-8 border border-stone-100 h-fit">
                        <h3 class="font-bold text-xl mb-6 flex items-center gap-2">
                            <i class="fas fa-sliders-h text-stone-400"></i> Configuration
                        </h3>
                        
                        <div class="space-y-8">
                            <!-- Type Selection -->
                            <div>
                                <label class="text-[10px] font-bold uppercase tracking-widest text-stone-400 mb-3 block">Widget Type</label>
                                <div class="grid grid-cols-2 gap-2">
                                    <button @click="type = 'weather'" :class="type === 'weather' ? 'bg-stone-900 text-white' : 'bg-stone-100 text-stone-500 hover:bg-stone-200'" class="py-3 rounded-xl text-xs font-bold uppercase tracking-wide transition-all">Weather</button>
                                    <button @click="type = 'card'" :class="type === 'card' ? 'bg-stone-900 text-white' : 'bg-stone-100 text-stone-500 hover:bg-stone-200'" class="py-3 rounded-xl text-xs font-bold uppercase tracking-wide transition-all">City Card</button>
                                </div>
                            </div>

                            <!-- City Selection -->
                            <div>
                                <label class="text-[10px] font-bold uppercase tracking-widest text-stone-400 mb-3 block">Target City</label>
                                <select x-model="city" class="w-full bg-stone-50 border border-stone-200 rounded-xl px-4 py-3 text-sm font-bold text-stone-700 focus:ring-[#C8102E] focus:border-[#C8102E]">
                                    <option>Marrakech</option>
                                    <option>Casablanca</option>
                                    <option>Fez</option>
                                    <option>Tangier</option>
                                    <option>Chefchaouen</option>
                                </select>
                            </div>

                            <!-- Toggle Options -->
                            <div class="space-y-4">
                                <!-- Device Toggle -->
                                <div>
                                     <label class="flex items-center justify-between cursor-pointer group mb-2">
                                        <span class="text-sm font-bold text-stone-700">Device View</span>
                                     </label>
                                     <div class="flex bg-stone-100 p-1 rounded-xl">
                                         <button @click="device = 'mobile'" :class="device === 'mobile' ? 'bg-white shadow text-stone-900' : 'text-stone-400'" class="flex-1 py-2 text-xs font-bold uppercase rounded-lg transition-all"><i class="fas fa-mobile-alt mr-1"></i> Mobile</button>
                                         <button @click="device = 'desktop'" :class="device === 'desktop' ? 'bg-white shadow text-stone-900' : 'text-stone-400'" class="flex-1 py-2 text-xs font-bold uppercase rounded-lg transition-all"><i class="fas fa-desktop mr-1"></i> Desktop</button>
                                     </div>
                                </div>
                                
                                <label class="flex items-center justify-between cursor-pointer group">
                                    <span class="text-sm font-bold text-stone-700">Dark Mode</span>
                                    <div class="relative w-12 h-6 bg-stone-200 rounded-full transition-colors group-hover:bg-stone-300" :class="theme === 'dark' ? '!bg-stone-900' : ''" @click="theme = theme === 'dark' ? 'light' : 'dark'">
                                        <div class="absolute top-1 left-1 w-4 h-4 bg-white rounded-full shadow-sm transition-transform" :class="theme === 'dark' ? 'translate-x-6' : ''"></div>
                                    </div>
                                </label>
                                <label class="flex items-center justify-between cursor-pointer group">
                                    <span class="text-sm font-bold text-stone-700">Show Cover Image</span>
                                    <div class="relative w-12 h-6 bg-stone-200 rounded-full transition-colors group-hover:bg-stone-300" :class="showImage ? '!bg-[#C8102E]' : ''" @click="showImage = !showImage">
                                        <div class="absolute top-1 left-1 w-4 h-4 bg-white rounded-full shadow-sm transition-transform" :class="showImage ? 'translate-x-6' : ''"></div>
                                    </div>
                                </label>
                            </div>

                            <!-- Code Output -->
                            <div class="pt-6 border-t border-stone-100">
                                <label class="text-[10px] font-bold uppercase tracking-widest text-stone-400 mb-3 block">Embed Code</label>
                                <div class="bg-stone-900 rounded-xl p-4 relative group">
                                    <code class="text-[10px] text-stone-300 font-mono break-all block">
                                        &lt;iframe src="https://morocco2030.ma/embed?city=<span x-text="city.toLowerCase()"></span>&theme=<span x-text="theme"></span>" width="100%" height="400"&gt;&lt;/iframe&gt;
                                    </code>
                                    <button @click="
                                        let code = '<iframe src=\'https://morocco2030.ma/embed?city=' + city.toLowerCase() + '&theme=' + theme + '\' width=\'100%\' height=\'400\'></iframe>';
                                        navigator.clipboard.writeText(code);
                                        dispatchNotify('Embed code copied to clipboard!');
                                    " class="absolute top-2 right-2 p-1.5 rounded-lg bg-white/10 hover:bg-white/20 text-white transition-colors" title="Copy Code">
                                        <i class="fas fa-copy text-xs"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Live Preview -->
                    <div class="lg:col-span-8 flex items-center justify-center p-8 lg:p-16 relative overflow-hidden rounded-3xl"
                         :class="theme === 'dark' ? 'bg-stone-800' : 'bg-[#e5e5e5]'">
                        
                        <!-- Background Pattern Grid -->
                        <div class="absolute inset-0 opacity-[0.05]" 
                             :style="theme === 'dark' ? 'background-image: radial-gradient(white 1px, transparent 1px); background-size: 20px 20px;' : 'background-image: radial-gradient(black 1px, transparent 1px); background-size: 20px 20px;'">
                        </div>

                        <!-- LIVE WIDGET PREVIEW MOCKUP -->
                        <div class="rounded-[2.5rem] overflow-hidden shadow-2xl transform transition-all duration-500 ease-out border-8 border-stone-900 relative"
                             :class="[
                                theme === 'dark' ? 'bg-black text-white' : 'bg-white text-stone-900',
                                device === 'mobile' ? 'w-[320px]' : 'w-full max-w-2xl'
                             ]">
                             
                             <!-- Dynamic Notch/Camera for realism -->
                             <div class="absolute top-0 left-1/2 -translate-x-1/2 w-32 h-6 bg-stone-900 rounded-b-xl z-20" x-show="device === 'mobile'"></div>
                            
                            <!-- Widget Header -->
                            <div class="h-40 relative overflow-hidden transition-all duration-500" :class="showImage ? 'opacity-100 h-40' : 'opacity-0 h-0'">
                                <img src="https://images.unsplash.com/photo-1539020140153-e479b8c22e70?auto=format&fit=crop&w=800" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                <div class="absolute bottom-4 left-6">
                                    <span class="text-[10px] font-bold text-white/80 bg-black/20 backdrop-blur-sm px-2 py-1 rounded">DISCOVER</span>
                                </div>
                            </div>

                            <!-- Widget Body -->
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <h2 class="text-2xl font-playfair font-bold leading-none" x-text="city">Marrakech</h2>
                                        <p class="text-xs opacity-60 mt-1">Kingdom of Morocco</p>
                                    </div>
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center" :class="theme === 'dark' ? 'bg-white/10' : 'bg-stone-100'">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Coat_of_arms_of_Morocco.svg/1200px-Coat_of_arms_of_Morocco.svg.png" class="h-6 opacity-80">
                                    </div>
                                </div>

                                <!-- Dynamic Content based on Type -->
                                <div x-show="type === 'weather'" x-transition>
                                    <div class="flex items-center gap-4 mb-6">
                                        <i class="fas fa-sun text-4xl text-yellow-500 animate-spin-slow"></i>
                                        <div>
                                            <span class="text-3xl font-bold font-display">28°C</span>
                                            <p class="text-xs opacity-60">Sunny • UV Index 6</p>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-3 gap-2 text-center text-[10px] opacity-60">
                                        <div class="bg-current/5 rounded p-2">
                                            <span>Humidity</span><br><strong>45%</strong>
                                        </div>
                                        <div class="bg-current/5 rounded p-2">
                                            <span>Wind</span><br><strong>12km/h</strong>
                                        </div>
                                        <div class="bg-current/5 rounded p-2">
                                            <span>Rain</span><br><strong>0%</strong>
                                        </div>
                                    </div>
                                </div>

                                <div x-show="type === 'card'" x-transition>
                                    <p class="text-sm opacity-80 leading-relaxed mb-4">
                                        Known as the Red City, <span x-text="city"></span> is a vibrant hub of culture, spice markets, and ancient history.
                                    </p>
                                    <button class="w-full py-3 rounded-xl bg-[#C8102E] text-white text-xs font-bold uppercase tracking-widest hover:bg-[#A00C24] transition-colors">
                                        Visit Now
                                    </button>
                                </div>

                            </div>
                            
                            <!-- Widget Footer -->
                            <div class="px-6 py-3 border-t text-[10px] font-bold flex justify-between items-center opacity-40" :class="theme === 'dark' ? 'border-white/10' : 'border-stone-100'">
                                <span>Powered by Morocco 2030</span>
                                <i class="fas fa-external-link-alt"></i>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>

        <!-- SECTION 5: API DOCS OVERVIEW -->
        <section id="api-docs" class="py-24 container mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-16 items-center">
                <div class="lg:w-1/2">
                    <span class="text-[#d4af37] font-bold uppercase tracking-widest text-xs mb-2 block">03. Open Data</span>
                    <h2 class="text-4xl md:text-5xl font-playfair font-black text-stone-900 mb-6">REST API Access</h2>
                    <p class="text-stone-500 text-lg mb-8 leading-relaxed">
                        Our high-performance API provides real-time access to database of 50+ cities, 500+ monuments, and organized event calendars. Built for scale and ease of use.
                    </p>
                    
                    <ul class="space-y-4 mb-10">
                        <li class="flex items-center gap-4">
                            <div class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center"><i class="fas fa-check text-xs"></i></div>
                            <span class="font-bold text-stone-700">99.9% Uptime SLA</span>
                        </li>
                        <li class="flex items-center gap-4">
                            <div class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center"><i class="fas fa-check text-xs"></i></div>
                            <span class="font-bold text-stone-700">GraphQL & REST Endpoints</span>
                        </li>
                        <li class="flex items-center gap-4">
                            <div class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center"><i class="fas fa-check text-xs"></i></div>
                            <span class="font-bold text-stone-700">Full Image CDN Support</span>
                        </li>
                    </ul>


                </div>
                
                <!-- Code Preview Terminal -->
                <div class="lg:w-1/2 w-full">
                    <div class="bg-[#1e1e1e] rounded-[2rem] shadow-2xl overflow-hidden border border-white/10 relative group">
                        <!-- Mac Window Controls -->
                        <div class="bg-[#2d2d2d] px-6 py-4 flex items-center gap-2">
                             <div class="w-3 h-3 rounded-full bg-[#ff5f56]"></div>
                             <div class="w-3 h-3 rounded-full bg-[#ffbd2e]"></div>
                             <div class="w-3 h-3 rounded-full bg-[#27c93f]"></div>
                             <div class="ml-4 px-3 py-1 bg-black/30 rounded text-xs text-stone-500 font-mono">bash</div>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-8 overflow-x-auto">
                            <pre class="font-mono text-sm leading-relaxed">
<span class="text-purple-400">curl</span> -X GET \
  <span class="text-green-400">'https://api.morocco2030.ma/v1/destinations'</span> \
  -H <span class="text-yellow-400">'Authorization: Bearer YOUR_API_KEY'</span> \
  -H <span class="text-yellow-400">'Content-Type: application/json'</span>

<span class="text-stone-500 block mt-4"># Response</span>
<span class="text-blue-400">{</span>
  <span class="text-blue-300">"data"</span>: <span class="text-yellow-400">[</span>
    <span class="text-blue-400">{</span>
      <span class="text-blue-300">"id"</span>: <span class="text-orange-400">1</span>,
      <span class="text-blue-300">"name"</span>: <span class="text-green-400">"Hassan II Mosque"</span>,
      <span class="text-blue-300">"city"</span>: <span class="text-green-400">"Casablanca"</span>,
      <span class="text-blue-300">"status"</span>: <span class="text-green-400">"Open"</span>
    <span class="text-blue-400">}</span>,
    <span class="text-stone-500">...</span>
  <span class="text-yellow-400">]</span>
<span class="text-blue-400">}</span></pre>
                        </div>
                        
                        <!-- Floating Copied Badge -->
                        <div onclick="
                            const code = `curl -X GET \n  'https://api.morocco2030.ma/v1/destinations' \n  -H 'Authorization: Bearer YOUR_API_KEY' \n  -H 'Content-Type: application/json'`;
                            navigator.clipboard.writeText(code);
                            dispatchNotify('API Snippet copied to clipboard!');
                        " class="absolute bottom-6 right-6 px-4 py-2 bg-white/10 backdrop-blur rounded-lg text-white text-xs font-mono opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer hover:bg-white/20 active:scale-95">
                            Copy Snippet
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 6: MARKETING & CTA -->
        <section id="marketing" class="py-24 bg-[#C8102E] text-white relative overflow-hidden">
             <div class="absolute top-0 left-0 w-full h-full opacity-10" style="background-image: url('{{ asset('assets/images/zellige_pattern.png') }}'); background-size: 300px;"></div>
             
             <div class="container mx-auto px-6 relative z-10 text-center">
                 <h2 class="text-4xl md:text-6xl font-playfair font-black mb-8">Ready to Partner?</h2>
                 <p class="text-xl text-white/80 max-w-2xl mx-auto mb-12">
                     Join hundreds of travel agencies, developers, and content creators promoting the Kingdom. Get full access to all resources today.
                 </p>
                 
                 <div class="flex flex-col md:flex-row items-center justify-center gap-6">
                     <a href="{{ route('contact') }}" class="w-full md:w-auto px-10 py-4 bg-white text-[#C8102E] rounded-full font-bold uppercase tracking-widest text-sm hover:bg-stone-100 hover:scale-105 transition-all shadow-xl">
                         Apply for Partnership
                     </a>
                 </div>
                 
                 <div class="mt-16 pt-16 border-t border-white/20 flex flex-wrap justify-center gap-12 opacity-60 grayscale hover:grayscale-0 transition-all duration-500">
                     <!-- Dummy Logos -->
                     <i class="fab fa-airbnb text-4xl"></i>
                     <i class="fab fa-google text-4xl"></i>
                     <i class="fab fa-apple text-4xl"></i>
                     <i class="fab fa-spotify text-4xl"></i>
                     <i class="fas fa-globe-africa text-4xl"></i>
                 </div>
             </div>
        </section>

    </div>

    <!-- GLOBAL TOAST NOTIFICATION -->
    <div x-data="{ show: false, message: '' }" 
         @notify.window="show = true; message = $event.detail; setTimeout(() => show = false, 3000)"
         class="fixed bottom-6 right-6 z-[100] transform transition-all duration-300 pointer-events-none"
         :class="show ? 'translate-y-0 opacity-100' : 'translate-y-4 opacity-0'">
        <div class="bg-stone-900 text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-4 border border-white/10">
            <div class="w-8 h-8 rounded-full bg-[#006233] flex items-center justify-center shrink-0">
                <i class="fas fa-check text-xs"></i>
            </div>
            <div>
                <h4 class="font-bold text-sm">Action Successful</h4>
                <p class="text-xs text-stone-400" x-text="message"></p>
            </div>
        </div>
    </div>

    <!-- Script to Dispatch Events -->
    <script>
        function dispatchNotify(message) {
            window.dispatchEvent(new CustomEvent('notify', { detail: message }));
        }
        
        // Scroll Animations
        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in-up');
                        entry.target.classList.remove('opacity-0', 'translate-y-4');
                    }
                });
            }, { threshold: 0.1 });
            
            document.querySelectorAll('section').forEach(section => {
                section.classList.add('opacity-0', 'translate-y-4', 'transition-all', 'duration-700');
                observer.observe(section);
            });
        });
    </script>

    <!-- Custom Animations -->
    <style>
        .animate-spin-slow {
            animation: spin 8s linear infinite;
        }
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
            transform: translateY(20px);
        }
        
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-float-slow {
            animation: float 6s ease-in-out infinite;
        }
        
        .animate-float-delayed {
            animation: float 7s ease-in-out infinite;
            animation-delay: 1s;
        }

        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(2deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }

        .animate-grain {
            animation: grain 8s steps(10) infinite;
        }

        @keyframes grain {
            0%, 100% { transform: translate(0, 0); }
            10% { transform: translate(-5%, -10%); }
            20% { transform: translate(-15%, 5%); }
            30% { transform: translate(7%, -25%); }
            40% { transform: translate(-5%, 25%); }
            50% { transform: translate(-15%, 10%); }
            60% { transform: translate(15%, 0%); }
            70% { transform: translate(0%, 15%); }
            80% { transform: translate(3%, 35%); }
            90% { transform: translate(-10%, 10%); }
        }
    </style>
@endsection

