@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    
    <div class="relative bg-gray-900 rounded-[3rem] overflow-hidden mb-16 shadow-2xl min-h-[500px] flex items-center">
        <div class="absolute inset-0 bg-gradient-to-r from-black via-transparent to-transparent z-10"></div>
        <div class="absolute inset-0 bg-cover bg-center opacity-60" style="background-image: url('https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&q=80');"></div>

        <div class="relative z-20 px-12 md:px-20 w-full md:w-2/3">
            <h1 class="text-white text-4xl md:text-6xl font-black leading-tight mb-6">
                Ready to <span class="text-orange-500">growth fast</span> with Meraki Coaching & Training
            </h1>
            <a href="#coach" class="inline-block bg-white text-gray-900 px-8 py-3 rounded-full font-bold uppercase tracking-wider hover:bg-orange-500 hover:text-white transition shadow-lg">
                Meet The Coach
            </a>
        </div>
    </div>

    <div class="bg-white rounded-[3rem] p-12 md:p-20 shadow-xl mb-16 border border-gray-100">
        <div class="max-w-3xl">
            <h2 class="text-3xl font-black text-blue-900 mb-8 flex items-center">
                <span class="w-10 h-1 bg-orange-500 mr-4"></span> Visi & Misi
            </h2>
            <p class="text-gray-600 text-xl leading-relaxed mb-6 italic border-l-4 border-orange-500 pl-6">
                "Meraki adalah kata Yunani yang berarti melakukan sesuatu dengan jiwa, kreativitas, dan cinta."
            </p>
            <p class="text-gray-500 leading-relaxed text-lg mb-8">
                Nama perusahaan kami adalah <strong>"Bersama Berbagi Berkat"</strong> dimana kami rindu membagikan nilai-nilai positif dan membangun pemimpin-pemimpin sukses melalui pendekatan yang personal dan aplikatif.
            </p>
            <button class="border-2 border-gray-200 text-gray-400 px-8 py-2 rounded-full font-bold uppercase text-sm tracking-widest hover:border-orange-500 hover:text-orange-500 transition">
                Testimonials
            </button>
        </div>
    </div>

    <div id="coach" class="flex flex-col-reverse md:flex-row gap-12 items-center mb-16">
        
        <div class="md:w-1/2 space-y-6">
            <h3 class="text-2xl font-bold text-blue-900 uppercase tracking-widest border-b-4 border-orange-500 inline-block pb-2">
                Maxwell Leadership
            </h3>
            <p class="text-gray-600 leading-relaxed text-lg">
                Berbasis di Amerika dengan jaringan global di 160 negara, didirikan oleh <strong>Dr. John C. Maxwell</strong>, penulis buku kepemimpinan best seller dunia.
            </p>
            
            <div class="space-y-4">
                <div class="flex items-center gap-4 text-gray-700 font-medium group">
                    <span class="w-3 h-3 bg-orange-500 rounded-full transition-transform group-hover:scale-150"></span>
                    <span>Personal Leadership & Corporate Leadership</span>
                </div>
                <div class="flex items-center gap-4 text-gray-700 font-medium group">
                    <span class="w-3 h-3 bg-orange-500 rounded-full transition-transform group-hover:scale-150"></span>
                    <span>Values-based Leadership (Karakter & Integritas)</span>
                </div>
                <div class="flex items-center gap-4 text-gray-700 font-medium group">
                    <span class="w-3 h-3 bg-orange-500 rounded-full transition-transform group-hover:scale-150"></span>
                    <span>Coaching, Training, and Mentoring Aplikatif</span>
                </div>
            </div>

            <div class="bg-gray-900 p-6 rounded-2xl text-white italic border-l-8 border-orange-500 shadow-xl">
                "Everything rises and falls on leadership"
            </div>
        </div>

        <div class="md:w-1/2 w-full">
            <div class="relative group">
                <div class="absolute -inset-1 bg-gradient-to-r from-blue-900 to-orange-500 rounded-3xl blur opacity-25 group-hover:opacity-50 transition duration-1000"></div>
                
                <div class="relative bg-gray-900 rounded-3xl overflow-hidden aspect-[4/5] flex items-end shadow-2xl">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent z-10 opacity-70"></div>
                    
                    <div class="absolute inset-0 bg-cover bg-center transition duration-700 group-hover:scale-110" 
                         style="background-image: url('{{ asset('photos/buhe.png') }}'); background-position: top center;">
                    </div>

                    <div class="p-8 relative z-20">
                        <p class="text-orange-500 font-bold tracking-widest uppercase text-sm mb-2">Meet The Professional</p>
                        <h3 class="text-white text-5xl font-black uppercase tracking-tighter leading-none">
                            COACH <br> <span class="text-orange-500">BUHE</span>
                        </h3>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection