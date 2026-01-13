@extends('layouts.app')

@section('content')
<!-- Hero: GoogleFlights / Clean SaaS Vibe -->
<section class="min-h-screen bg-slate-50 flex flex-col relative overflow-hidden">
    
    <!-- Background Decor -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-[-10%] left-[-5%] w-[40vw] h-[40vw] bg-blue-100 rounded-full mix-blend-multiply filter blur-[100px] opacity-60"></div>
        <div class="absolute bottom-[-10%] right-[-5%] w-[40vw] h-[40vw] bg-red-50 rounded-full mix-blend-multiply filter blur-[100px] opacity-60"></div>
    </div>

    <div class="container mx-auto px-6 md:px-12 pt-32 pb-20 relative z-10 flex flex-col items-center text-center">
        
        <!-- Partner Pill -->
        <div class="inline-flex items-center gap-2 bg-white border border-slate-200 shadow-sm rounded-full px-4 py-1.5 mb-8 animate-fade-in">
             <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/87/Royal_Air_Maroc_logo.svg/1200px-Royal_Air_Maroc_logo.svg.png" class="h-4 w-auto grayscale opacity-60">
             <span class="text-xs text-slate-400 font-medium tracking-wide">Official Insurance Partner</span>
        </div>

        <h1 class="text-5xl md:text-7xl font-bold text-slate-900 tracking-tight mb-6 max-w-4xl animate-fade-in delay-100">
            Fly confidently with <span class="text-[#d9222a]">comprehensive coverage.</span>
        </h1>
        
        <p class="text-xl text-slate-500 max-w-2xl mb-12 animate-fade-in delay-200 font-medium">
            Discover Morocco automatically insures your journey when you book direct. Verify your coverage eligibility instantly.
        </p>

        <!-- Verification Widget (Google Search Style) -->
        <div class="w-full max-w-3xl animate-fade-in delay-300">
            <div class="bg-white p-2 rounded-[2rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.1)] border border-slate-100">
                 @if(session('success'))
                    <div class="mb-4 mx-4 p-3 bg-green-50 text-green-700 rounded-xl flex items-center justify-center gap-2 text-sm font-bold">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif
                
                <form action="{{ route('offers.flight.verify') }}" method="POST" class="flex flex-col md:flex-row gap-2">
                    @csrf
                    
                    <!-- Input 1 -->
                    <div class="flex-1 relative group">
                        <div class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-[#d9222a] transition-colors">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                        <input type="text" name="ticket_number" required placeholder="E-Ticket Number (e.g. 147-...)"
                            class="w-full h-16 bg-slate-50 hover:bg-slate-100 focus:bg-white rounded-[1.5rem] pl-14 pr-6 text-slate-900 font-medium outline-none border-2 border-transparent focus:border-blue-100 transition-all placeholder-slate-400">
                    </div>

                    <!-- Input 2 -->
                    <div class="flex-1 relative group">
                        <div class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-[#d9222a] transition-colors">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <input type="date" name="flight_date" required
                            class="w-full h-16 bg-slate-50 hover:bg-slate-100 focus:bg-white rounded-[1.5rem] pl-14 pr-6 text-slate-900 font-medium outline-none border-2 border-transparent focus:border-blue-100 transition-all text-slate-400 focus:text-slate-900">
                    </div>

                    <!-- Button -->
                    <button type="submit" class="h-16 px-10 bg-[#1a73e8] hover:bg-[#1557b0] text-white font-bold rounded-[1.5rem] transition-colors shadow-lg shadow-blue-500/30 flex items-center justify-center gap-2">
                        Verify <i class="fas fa-arrow-right text-sm"></i>
                    </button>
                </form>
            </div>
            <p class="mt-4 text-xs text-slate-400 font-medium">
                <i class="fas fa-lock text-[10px] mr-1"></i> Data processing secured by RAM Connect
            </p>
        </div>
    </div>

    <!-- Cards Section -->
    <div class="container mx-auto px-6 md:px-12 pb-32 relative z-10">
        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest text-center mb-10">Included Benefits</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 text-2xl mb-6">
                    <i class="fas fa-hospital-alt"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Medical Expense</h3>
                <p class="text-slate-500 text-sm leading-relaxed">
                    Up to $150,000 coverage for sudden illness or injury, including hospital stays and emergency medication.
                </p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-16 h-16 bg-red-50 rounded-2xl flex items-center justify-center text-red-600 text-2xl mb-6">
                    <i class="fas fa-suitcase-rolling"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Lost Baggage</h3>
                <p class="text-slate-500 text-sm leading-relaxed">
                     Reimbursement of up to $3,000 for checked baggage lost, damaged, or delayed for more than 12 hours.
                </p>
            </div>

            <!-- Card 3 -->
            <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-16 h-16 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600 text-2xl mb-6">
                    <i class="fas fa-plane-departure"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Trip Interruption</h3>
                <p class="text-slate-500 text-sm leading-relaxed">
                    Coverage for non-refundable costs if you must cut your trip short due to covered reasons like family emergencies.
                </p>
            </div>
        </div>
    </div>

</section>

<style>
    .animate-fade-in { animation: fadeIn 0.8s ease-out forwards; opacity: 0; transform: translateY(10px); }
    @keyframes fadeIn { to { opacity: 1; transform: translateY(0); } }
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }
</style>
@endsection
